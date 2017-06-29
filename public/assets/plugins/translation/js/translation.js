!function(e,t){e.rails!==t&&e.error("jquery-ujs has already been loaded!");var a,n=e(document);e.rails=a={linkClickSelector:"a[data-confirm], a[data-method], a[data-remote], a[data-disable-with]",buttonClickSelector:"button[data-remote], button[data-confirm]",inputChangeSelector:"select[data-remote], input[data-remote], textarea[data-remote]",formSubmitSelector:"form",formInputClickSelector:"form input[type=submit], form input[type=image], form button[type=submit], form button:not([type])",disableSelector:"input[data-disable-with], button[data-disable-with], textarea[data-disable-with]",enableSelector:"input[data-disable-with]:disabled, button[data-disable-with]:disabled, textarea[data-disable-with]:disabled",requiredInputSelector:"input[name][required]:not([disabled]),textarea[name][required]:not([disabled])",fileInputSelector:"input[type=file]",linkDisableSelector:"a[data-disable-with]",buttonDisableSelector:"button[data-remote][data-disable-with]",CSRFProtection:function(t){var a=e('meta[name="csrf-token"]').attr("content");a&&t.setRequestHeader("X-CSRF-Token",a)},refreshCSRFTokens:function(){var t=e("meta[name=csrf-token]").attr("content"),a=e("meta[name=csrf-param]").attr("content");e('form input[name="'+a+'"]').val(t)},fire:function(t,a,n){var i=e.Event(a);return t.trigger(i,n),i.result!==!1},confirm:function(e){return confirm(e)},ajax:function(t){return e.ajax(t)},href:function(e){return e.attr("href")},handleRemote:function(n){var i,r,o,l,s,u,c,d;if(a.fire(n,"ajax:before")){if(l=n.data("cross-domain"),s=l===t?null:l,u=n.data("with-credentials")||null,c=n.data("type")||e.ajaxSettings&&e.ajaxSettings.dataType,n.is("form")){i=n.attr("method"),r=n.attr("action"),o=n.serializeArray();var m=n.data("ujs:submit-button");m&&(o.push(m),n.data("ujs:submit-button",null))}else n.is(a.inputChangeSelector)?(i=n.data("method"),r=n.data("url"),o=n.serialize(),n.data("params")&&(o=o+"&"+n.data("params"))):n.is(a.buttonClickSelector)?(i=n.data("method")||"get",r=n.data("url"),o=n.serialize(),n.data("params")&&(o=o+"&"+n.data("params"))):(i=n.data("method"),r=a.href(n),o=n.data("params")||null);return d={type:i||"GET",data:o,dataType:c,beforeSend:function(e,i){return i.dataType===t&&e.setRequestHeader("accept","*/*;q=0.5, "+i.accepts.script),!!a.fire(n,"ajax:beforeSend",[e,i])&&void n.trigger("ajax:send",e)},success:function(e,t,a){n.trigger("ajax:success",[e,t,a])},complete:function(e,t){n.trigger("ajax:complete",[e,t])},error:function(e,t,a){n.trigger("ajax:error",[e,t,a])},crossDomain:s},u&&(d.xhrFields={withCredentials:u}),r&&(d.url=r),a.ajax(d)}return!1},handleMethod:function(n){var i=a.href(n),r=n.data("method"),o=n.attr("target"),l=e("meta[name=csrf-token]").attr("content"),s=e("meta[name=csrf-param]").attr("content"),u=e('<form method="post" action="'+i+'"></form>'),c='<input name="_method" value="'+r+'" type="hidden" />';s!==t&&l!==t&&(c+='<input name="'+s+'" value="'+l+'" type="hidden" />'),o&&u.attr("target",o),u.hide().append(c).appendTo("body"),u.submit()},formElements:function(t,a){return t.is("form")?e(t[0].elements).filter(a):t.find(a)},disableFormElements:function(t){a.formElements(t,a.disableSelector).each(function(){a.disableFormElement(e(this))})},disableFormElement:function(e){var t=e.is("button")?"html":"val";e.data("ujs:enable-with",e[t]()),e[t](e.data("disable-with")),e.prop("disabled",!0)},enableFormElements:function(t){a.formElements(t,a.enableSelector).each(function(){a.enableFormElement(e(this))})},enableFormElement:function(e){var t=e.is("button")?"html":"val";e.data("ujs:enable-with")&&e[t](e.data("ujs:enable-with")),e.prop("disabled",!1)},allowAction:function(e){var t,n=e.data("confirm"),i=!1;return!n||(a.fire(e,"confirm")&&(i=a.confirm(n),t=a.fire(e,"confirm:complete",[i])),i&&t)},blankInputs:function(t,a,n){var i,r,o=e(),l=a||"input,textarea",s=t.find(l);return s.each(function(){if(i=e(this),r=i.is("input[type=checkbox],input[type=radio]")?i.is(":checked"):i.val(),!r==!n){if(i.is("input[type=radio]")&&s.filter('input[type=radio]:checked[name="'+i.attr("name")+'"]').length)return!0;o=o.add(i)}}),!!o.length&&o},nonBlankInputs:function(e,t){return a.blankInputs(e,t,!0)},stopEverything:function(t){return e(t.target).trigger("ujs:everythingStopped"),t.stopImmediatePropagation(),!1},disableElement:function(e){e.data("ujs:enable-with",e.html()),e.html(e.data("disable-with")),e.bind("click.railsDisable",function(e){return a.stopEverything(e)})},enableElement:function(e){e.data("ujs:enable-with")!==t&&(e.html(e.data("ujs:enable-with")),e.removeData("ujs:enable-with")),e.unbind("click.railsDisable")}},a.fire(n,"rails:attachBindings")&&(e.ajaxPrefilter(function(e,t,n){e.crossDomain||a.CSRFProtection(n)}),n.delegate(a.linkDisableSelector,"ajax:complete",function(){a.enableElement(e(this))}),n.delegate(a.buttonDisableSelector,"ajax:complete",function(){a.enableFormElement(e(this))}),n.delegate(a.linkClickSelector,"click.rails",function(n){var i=e(this),r=i.data("method"),o=i.data("params"),l=n.metaKey||n.ctrlKey;if(!a.allowAction(i))return a.stopEverything(n);if(!l&&i.is(a.linkDisableSelector)&&a.disableElement(i),i.data("remote")!==t){if(l&&(!r||"GET"===r)&&!o)return!0;var s=a.handleRemote(i);return s===!1?a.enableElement(i):s.error(function(){a.enableElement(i)}),!1}return i.data("method")?(a.handleMethod(i),!1):void 0}),n.delegate(a.buttonClickSelector,"click.rails",function(t){var n=e(this);if(!a.allowAction(n))return a.stopEverything(t);n.is(a.buttonDisableSelector)&&a.disableFormElement(n);var i=a.handleRemote(n);return i===!1?a.enableFormElement(n):i.error(function(){a.enableFormElement(n)}),!1}),n.delegate(a.inputChangeSelector,"change.rails",function(t){var n=e(this);return a.allowAction(n)?(a.handleRemote(n),!1):a.stopEverything(t)}),n.delegate(a.formSubmitSelector,"submit.rails",function(n){var i,r,o=e(this),l=o.data("remote")!==t;if(!a.allowAction(o))return a.stopEverything(n);if(o.attr("novalidate")==t&&(i=a.blankInputs(o,a.requiredInputSelector),i&&a.fire(o,"ajax:aborted:required",[i])))return a.stopEverything(n);if(l){if(r=a.nonBlankInputs(o,a.fileInputSelector)){setTimeout(function(){a.disableFormElements(o)},13);var s=a.fire(o,"ajax:aborted:file",[r]);return s||setTimeout(function(){a.enableFormElements(o)},13),s}return a.handleRemote(o),!1}setTimeout(function(){a.disableFormElements(o)},13)}),n.delegate(a.formInputClickSelector,"click.rails",function(t){var n=e(this);if(!a.allowAction(n))return a.stopEverything(t);var i=n.attr("name"),r=i?{name:i,value:n.val()}:null;n.closest("form").data("ujs:submit-button",r)}),n.delegate(a.formSubmitSelector,"ajax:send.rails",function(t){this==t.target&&a.disableFormElements(e(this))}),n.delegate(a.formSubmitSelector,"ajax:complete.rails",function(t){this==t.target&&a.enableFormElements(e(this))}),e(function(){a.refreshCSRFTokens()}))}(jQuery),jQuery(document).ready(function(e){e(".editable").editable().on("hidden",function(t,a){var n=e(this).data("locale");if("save"===a&&e(this).removeClass("status-0").addClass("status-1"),"save"===a||"nochange"===a){var i=e(this).closest("tr").next().find(".editable.locale-"+n);setTimeout(function(){i.editable("show")},300)}}),e(".group-select").on("change",function(){var t=e(this).val();t?window.location.href=BTranslation.routes.group_view+"?file="+e(this).val():window.location.href=BTranslation.routes.list}),e("a.delete-key").click(function(t){t.preventDefault();var a=e(this).closest("tr"),n=e(this).attr("href"),i=a.attr("id");e.post(n,{id:i},function(){a.remove()})}),e(".form-import").on("ajax:success",function(t,a){e("div.success-import strong.counter").text(a.counter),e("div.success-import").slideDown()}),e(".form-find").on("ajax:success",function(t,a){e("div.success-find strong.counter").text(a.counter),e("div.success-find").slideDown()}),e(".form-publish").on("ajax:success",function(t,a){e("div.success-publish").slideDown()})});