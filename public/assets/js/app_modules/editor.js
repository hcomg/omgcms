function setImageValue(e){$(".mce-btn.mce-open").parent().find(".mce-textbox").val(e)}var BEditor={initEditor:function(e,t){if(e.length){if($(".editor-ckeditor").length>0){var i={filebrowserImageBrowseUrl:Botble.routes.media+"?media-action=select-files&method=ckeditor&type=image",filebrowserImageUploadUrl:Botble.routes.media_upload_from_editor+"?method=ckeditor&type=image&_token="+$('meta[name="csrf-token"]').attr("content"),filebrowserWindowWidth:"768",filebrowserWindowHeight:"500",height:356,allowedContent:!0},o={};$.extend(o,i,t),CKEDITOR.replace(e.prop("id"),o)}$(".editor-tinymce").length>0&&tinymce.init({menubar:!1,selector:"#"+e.prop("id"),skin:"voyager",min_height:600,resize:"vertical",plugins:"link, image, code, youtube, giphy, table, textcolor",extended_valid_elements:"input[id|name|value|type|class|style|required|placeholder|autocomplete|onclick]",file_browser_callback:function(e,t,i,o){"image"==i&&$("#upload_file").trigger("click")},toolbar:"styleselect bold italic underline | forecolor backcolor | alignleft aligncenter alignright | bullist numlist outdent indent | link image table youtube giphy | code",convert_urls:!1,image_caption:!0,image_title:!0})}}};$(document).ready(function(){$(".editor-ckeditor").length>0&&BEditor.initEditor($(".editor-ckeditor"),{}),$(".editor-tinymce").length>0&&BEditor.initEditor($(".editor-tinymce"),{})});