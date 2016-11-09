var upload_image_button=false;
    jQuery(document).ready(function() {

    jQuery('.upload_image_button').click(function() {
        upload_image_button =true;
        formfieldID=jQuery(this).prev().attr("id");
        formfieldID2=jQuery(this).next().attr("id");
     formfield = jQuery("#"+formfieldID).attr('name');
     formfield2 = jQuery("#"+formfieldID2).attr('name');
     tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        if(upload_image_button==true){

                var oldFunc = window.send_to_editor;
                window.send_to_editor = function(html) {

                imgurl = jQuery('img', html).attr('src');
				url = jQuery('img', html).attr('src');
				titleName = url.substring(url.lastIndexOf('/') + 1);
				var title_name = titleName.slice(0, -4);
				
                jQuery("#"+formfieldID).val(imgurl);
                jQuery("#"+formfieldID2).val(title_name);
                 tb_remove();
                window.send_to_editor = oldFunc;
                }
        }
        upload_image_button=false;
    });


    })
