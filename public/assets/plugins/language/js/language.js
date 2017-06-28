var BLanguage=BLanguage||{};BLanguage.formatState=function(e){return e.id?$('<span><img src="'+$("#language_flag_path").val()+e.element.value.toLowerCase()+'.png" class="img-flag" /> '+e.text+"</span>"):e.text},BLanguage.bindEventToElement=function(){jQuery().select2&&$(".select-search-language").select2({width:"100%",templateResult:BLanguage.formatState,templateSelection:BLanguage.formatState});var e=$(".table-language");$(document).on("change","#language_id",function(){var e=$(this).find("option:selected").data("language");"undefined"!=typeof e&&e.length>0&&($("#lang_name").val(e[2]),$("#lang_locale").val(e[0]),$("#lang_code").val(e[1]),$("#flag_list").val(e[4]).trigger("change"),$(".is_"+e[3]).prop("checked",!0),$("#btn-language-submit-edit").prop("id","btn-language-submit").text("Add new language"))}),$(document).on("click","#btn-language-submit",function(e){e.preventDefault();var a=$("#lang_name").val(),t=$("#lang_locale").val(),l=$("#lang_code").val(),n=$("#flag_list").val(),o=$("#lang_order").val(),g=$(".is_rtl").prop("checked")?1:0;BLanguage.createOrUpdateLanguage(0,a,t,l,n,o,g,0)}),$(document).on("click","#btn-language-submit-edit",function(e){e.preventDefault();var a=$("#lang_id").val(),t=$("#lang_name").val(),l=$("#lang_locale").val(),n=$("#lang_code").val(),o=$("#flag_list").val(),g=$("#lang_order").val(),r=$(".is_rtl").prop("checked")?1:0;BLanguage.createOrUpdateLanguage(a,t,l,n,o,g,r,1)}),e.on("click",".deleteDialog",function(e){e.preventDefault(),$("#delete-crud-entry").data("section",$(this).data("section")),$("#delete-crud-modal").modal("show")}),$("#delete-crud-entry").on("click",function(a){a.preventDefault(),$("#delete-crud-modal").modal("hide");var t=$(this).data("section");$.ajax({url:t,type:"GET",success:function(a){a.error?Botble.showNotice("error",a.message,Botble.languages.notices_msg.error):(a.data&&(e.find("i[data-id="+a.data+"]").unwrap(),$(".tooltip").remove()),e.find('a[data-section="'+t+'"]').closest("tr").remove(),Botble.showNotice("success",a.message,Botble.languages.notices_msg.success))},error:function(e){Botble.handleError(e)}})}),e.on("click",".set-language-default",function(a){a.preventDefault();var t=$(this);$.ajax({url:t.data("section"),type:"GET",success:function(a){if(a.error)Botble.showNotice("error",a.message,Botble.languages.notices_msg.error);else{var l=e.find("td > i");l.replaceWith('<a data-section="'+BLanguage.routes.set_default+"?id="+l.data("id")+'" class="set-language-default tip" data-original-title="Choose '+l.data("name")+' as default language">'+l.closest("td").html()+"</a>"),t.find("i").unwrap(),$(".tooltip").remove(),Botble.showNotice("success",a.message,Botble.languages.notices_msg.success)}},error:function(e){Botble.handleError(e)}})}),e.on("click",".edit-language-button",function(e){e.preventDefault();var a=$(this);$.ajax({url:BLanguage.routes.get_language+"?id="+a.data("id"),type:"GET",success:function(e){if(e.error)Botble.showNotice("error",e.message,Botble.languages.notices_msg.error);else{var a=e.data;$("#lang_id").val(a.id),$("#lang_name").val(a.name),$("#lang_locale").val(a.locale),$("#lang_code").val(a.code),$("#flag_list").val(a.flag).trigger("change"),a.rtl&&$(".is_rtl").prop("checked",!0),$("#lang_order").val(a.order),$("#btn-language-submit").prop("id","btn-language-submit-edit").text("Update")}},error:function(e){Botble.handleError(e)}})})},BLanguage.createOrUpdateLanguage=function(e,a,t,l,n,o,g,r){var s=BLanguage.routes.store;r&&(s=BLanguage.routes.edit+"?code="+l),$.ajax({url:s,type:"POST",data:{id:e,name:a,locale:t,code:l,flag:n,order:o,is_rtl:g},success:function(a){a.error?Botble.showNotice("error",a.message,Botble.languages.notices_msg.error):(r?$(".table-language").find("tr[data-id="+e+"]").replaceWith(a.data):$(".table-language").append(a.data),Botble.showNotice("success",a.message,Botble.languages.notices_msg.success)),$("#language_id").val("").trigger("change"),$("#lang_name").val(""),$("#lang_locale").val(""),$("#lang_code").val(""),$("#flag_list").val("").trigger("change"),$(".is_ltr").prop("checked",!0),$("#btn-language-submit-edit").prop("id","btn-language-submit").text("Add new language")},error:function(e){Botble.handleError(e)}})},$(document).ready(function(){BLanguage.bindEventToElement()});