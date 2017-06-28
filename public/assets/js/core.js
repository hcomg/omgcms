var OMGCMS = OMGCMS || {};
OMGCMS.getViewPort = function () {
  var e = window, n = "inner";
  return "innerWidth" in window || (n = "client", e = document.documentElement || document.body), {
    width: e[n + "Width"],
    height: e[n + "Height"]
  }
}, OMGCMS.getResponsiveBreakpoint = function (e) {
  var n = {xs: 480, sm: 768, md: 992, lg: 1200};
  return n[e] ? n[e] : 0
};
var handleSidebarAndContentHeight = function () {
  var e, n = $(".page-content"), t = $(".sidebar"), o = ($("body"), $(".navbar.navbar-inverse").outerHeight()),
    i = $(".page-footer").outerHeight();
  e = OMGCMS.getViewPort().width < OMGCMS.getResponsiveBreakpoint("md") ? OMGCMS.getViewPort().height - o - i : t.height() + 20, e + o + i <= OMGCMS.getViewPort().height && (e = OMGCMS.getViewPort().height - o - i), n.css("min-height", e)
};
$(document).ready(function () {
  handleSidebarAndContentHeight()
});
var OMGCMS = OMGCMS || {};
OMGCMS.blockUI = function (e) {
  e = $.extend(!0, {}, e);
  var n = "";
  if (n = e.animate ? '<div class="loading-message ' + (e.boxed ? "loading-message-boxed" : "") + '"><div class="block-spinner-bar"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>' : e.iconOnly ? '<div class="loading-message ' + (e.boxed ? "loading-message-boxed" : "") + '"><img src="/vendor/core/images/loading-spinner-blue.gif" align=""></div>' : e.textOnly ? '<div class="loading-message ' + (e.boxed ? "loading-message-boxed" : "") + '"><span>&nbsp;&nbsp;' + (e.message ? e.message : "LOADING...") + "</span></div>" : '<div class="loading-message ' + (e.boxed ? "loading-message-boxed" : "") + '"><img src="/vendor/core/images/loading-spinner-blue.gif" align=""><span>&nbsp;&nbsp;' + (e.message ? e.message : "LOADING...") + "</span></div>", e.target) {
    var t = $(e.target);
    t.height() <= $(window).height() && (e.cenrerY = !0), t.block({
      message: n,
      baseZ: e.zIndex ? e.zIndex : 1e3,
      centerY: void 0 !== e.cenrerY && e.cenrerY,
      css: {top: "10%", border: "0", padding: "0", backgroundColor: "none"},
      overlayCSS: {
        backgroundColor: e.overlayColor ? e.overlayColor : "#555",
        opacity: e.boxed ? .05 : .1,
        cursor: "wait"
      }
    })
  } else $.blockUI({
    message: n,
    baseZ: e.zIndex ? e.zIndex : 1e3,
    css: {border: "0", padding: "0", backgroundColor: "none"},
    overlayCSS: {backgroundColor: e.overlayColor ? e.overlayColor : "#555", opacity: e.boxed ? .05 : .1, cursor: "wait"}
  })
}, OMGCMS.unblockUI = function (e) {
  e ? $(e).unblock({
    onUnblock: function () {
      $(e).css("position", ""), $(e).css("zoom", "")
    }
  }) : $.unblockUI()
}, OMGCMS.showNotice = function (e, n, t) {
  toastr.clear(), toastr.options = {
    closeButton: !0,
    positionClass: "toast-bottom-right",
    onclick: null,
    showDuration: 1e3,
    hideDuration: 1e3,
    timeOut: 1e4,
    extendedTimeOut: 1e3,
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
  }, toastr[e](n, t)
}, OMGCMS.handleError = function (e) {
  "undefined" != typeof e.responseJSON ? "undefined" != typeof e.responseJSON.message ? OMGCMS.showNotice("error", e.responseJSON.message, OMGCMS.languages.notices_msg.error) : $.each(e.responseJSON, function (e, n) {
    $.each(n, function (e, n) {
      OMGCMS.showNotice("error", n, OMGCMS.languages.notices_msg.error)
    })
  }) : OMGCMS.showNotice("error", e.statusText, OMGCMS.languages.notices_msg.error)
}, OMGCMS.countCharacter = function () {
  $.fn.charCounter = function (e, n) {
    function t(t, l) {
      t = $(t), t.val().length > e && (t.val(t.val().substring(0, e)), n.pulse && !i && o(l, !0)), n.delay > 0 ? (a && window.clearTimeout(a), a = window.setTimeout(function () {
        l.html(n.format.replace(/%1/, e - t.val().length))
      }, n.delay)) : l.html(n.format.replace(/%1/, e - t.val().length))
    }

    function o(e, n) {
      i && (window.clearTimeout(i), i = null), e.animate({opacity: .1}, 100, function () {
        $(this).animate({opacity: 1}, 100)
      }), n && (i = window.setTimeout(function () {
        o(e)
      }, 200))
    }

    e = e || 100, n = $.extend({
      container: "<span></span>",
      classname: "charcounter",
      format: "(%1 " + OMGCMS.languages.system.character_remain + ")",
      pulse: !0,
      delay: 0
    }, n);
    var i, a;
    return this.each(function () {
      var e;
      n.container.match(/^<.+>$/) ? ($(this).next("." + n.classname).remove(), e = $(n.container).insertAfter(this).addClass(n.classname)) : e = $(n.container), $(this).unbind(".charCounter").bind("keydown.charCounter", function () {
        t(this, e)
      }).bind("keypress.charCounter", function () {
        t(this, e)
      }).bind("keyup.charCounter", function () {
        t(this, e)
      }).bind("focus.charCounter", function () {
        t(this, e)
      }).bind("mouseover.charCounter", function () {
        t(this, e)
      }).bind("mouseout.charCounter", function () {
        t(this, e)
      }).bind("paste.charCounter", function () {
        var n = this;
        setTimeout(function () {
          t(n, e)
        }, 10)
      }), this.addEventListener && this.addEventListener("input", function () {
        t(this, e)
      }, !1), t(this, e)
    })
  }, $(document).on("click", "input[data-counter], textarea[data-counter]", function () {
    $(this).charCounter($(this).data("counter"), {container: "<small></small>"})
  })
}, OMGCMS.manageSidebar = function () {
  var e = $("body"), n = $(".navigation"), t = $(".sidebar-content");
  n.find("li.active").parents("li").addClass("active"), n.find("li").not(".active").has("ul").children("ul").addClass("hidden-ul"), n.find("li").has("ul").children("a").parent("li").addClass("has-ul"), $(document).on("click", ".sidebar-toggle", function (o) {
    o.preventDefault(), e.toggleClass("sidebar-narrow"), e.hasClass("sidebar-narrow") ? (n.children("li").children("ul").css("display", ""), t.hide().delay().queue(function () {
      $(this).show().addClass("animated fadeIn").clearQueue()
    })) : (n.children("li").children("ul").css("display", "none"), n.children("li.active").children("ul").css("display", "block"), t.hide().delay().queue(function () {
      $(this).show().addClass("animated fadeIn").clearQueue()
    }))
  }), n.find("li").has("ul").children("a").on("click", function (n) {
    n.preventDefault(), e.hasClass("sidebar-narrow") ? ($(this).parent("li > ul li").not(".disabled").toggleClass("active").children("ul").slideToggle(250), $(this).parent("li > ul li").not(".disabled").siblings().removeClass("active").children("ul").slideUp(250)) : ($(this).parent("li").not(".disabled").toggleClass("active").children("ul").slideToggle(250), $(this).parent("li").not(".disabled").siblings().removeClass("active").children("ul").slideUp(250))
  }), $(document).on("click", ".offcanvas", function () {
    $("body").toggleClass("offcanvas-active").toggleClass("sidebar-narrow")
  })
}, OMGCMS.initDatepicker = function (e) {
  jQuery().bootstrapDP && $(document).find(e).bootstrapDP({
    maxDate: 0,
    changeMonth: !0,
    changeYear: !0,
    dateFormat: "dd-mm-yy",
    autoclose: !0
  })
}, OMGCMS.initResources = function () {
  jQuery().select2 && ($(document).find(".select-multiple").select2({
    width: "100%",
    allowClear: !0,
    placeholder: $(this).data("placeholder")
  }), $(document).find(".select-search-full").select2({width: "100%"}), $(document).find(".select-full").select2({
    width: "100%",
    minimumResultsForSearch: -1
  })), jQuery().timepicker && $(".time-picker").timepicker({}), jQuery().colorpicker && $(".color-picker").colorpicker({}), this.initDatepicker(".datepicker"), jQuery().fancybox && ($(".iframe-btn").fancybox({
    width: "900px",
    height: "700px",
    type: "iframe",
    autoScale: !1,
    openEffect: "none",
    closeEffect: "none",
    overlayShow: !0,
    overlayOpacity: .7
  }), $(".fancybox").fancybox({
    openEffect: "none",
    closeEffect: "none",
    overlayShow: !0,
    overlayOpacity: .7,
    helpers: {media: {}}
  })), $(".styled").uniform(), $(".tip").tooltip({placement: "top"}), jQuery().areYouSure && $("form").areYouSure(), OMGCMS.callScroll($(".list-item-checkbox"))
}, OMGCMS.callScroll = function (e) {
  e.mCustomScrollbar({
    axis: "yx",
    theme: "minimal-dark",
    scrollButtons: {enable: !0},
    callbacks: {
      whileScrolling: function () {
        e.find(".tableFloatingHeaderOriginal").css({top: -this.mcs.top + "px"})
      }
    }
  }), e.stickyTableHeaders({scrollableArea: e, fixedOffset: 2})
}, OMGCMS.handleWaypoint = function () {
  $("#waypoint").length > 0 && new Waypoint({
    element: document.getElementById("waypoint"), handler: function (e) {
      "down" == e ? $(".form-actions-fixed-top").removeClass("hidden") : $(".form-actions-fixed-top").addClass("hidden")
    }
  })
}, OMGCMS.handleCounterup = function () {
  $().counterUp && $('[data-counter="counterup"]').counterUp({delay: 10, time: 1e3})
}, jQuery().datepicker.noConflict && ($.fn.bootstrapDP = $.fn.datepicker.noConflict()), $(document).ready(function () {
  OMGCMS.countCharacter(), OMGCMS.manageSidebar(), OMGCMS.initResources(), OMGCMS.handleWaypoint(), OMGCMS.handleCounterup()
}), $.ajaxSetup({headers: {"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")}});