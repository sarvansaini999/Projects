jQuery(document).ready(function(){
	
		var post_id = jQuery("#show_post_id").val();
	
		jQuery('#newReview').live('click', function(event) {        
			jQuery('#reviewForm').toggle('hide');
		});
		
		/*
		 * Package Form Toggle
		 */		
		jQuery('#yachtPackage').live('click', function(event) {  
			jQuery('#yachtPackageForm').toggle('hide');
			jQuery('#yachtPackageForm iframe').addClass('auto-height').css('height','auto');
			
		});
		
		jQuery('.editPackage').live('click', function(event) {  
			var tid = jQuery(this).attr("id");
			
			jQuery('#editPackageForm_'+tid).toggle('hide');
			jQuery('.editPackageForm iframe').addClass('auto-height').css('height','auto');
		});
		
		jQuery('#packageNight').live('click', function(event) {        
			jQuery('#retreatPackageNightForm').toggle('hide');
			jQuery('#retreatPackageNightForm iframe').addClass('auto-height').css('height','auto');
		});
		
		window.onload = showYachtReview();
		
		jQuery(document).on("click", ".deleteNightPackage", function() {
			var nightP_id = jQuery(this).attr("id");
			document.getElementById('package-cbox-night').style.display = "block";
			document.getElementById('confirmationN_id').value = nightP_id;
		});
		jQuery(document).on("click", ".no_delete_night", function() {
			
			document.getElementById('package-cbox-night').style.display = "none";
			
		});
	
	jQuery("#add_yacht_review").click(function(){

		var review_post_id = jQuery("#post_id").val();
		
		var author_name = jQuery("#review_author_name").val();
		var review_title = jQuery("#review_title").val();
		var review_author_email = jQuery("#review_author_email_address").val();
		var review_rating = jQuery("#review_rating").val();
		var yacht_review = jQuery("#yacht_review").val();
		var country = jQuery("#country").val();
		var publish_date = jQuery("#publish_date").val();
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "save_yacht_review", "post_id":review_post_id, "review_author_name":author_name,"review_title":review_title,"country":country,"review_date":publish_date,"review_author_email_address":review_author_email,"review_rating":review_rating,"yacht_review":yacht_review},
			success: function(data){
				
				jQuery("#review_author_name").val('');
				jQuery("#review_title").val('');
				jQuery("#review_author_email_address").val('');
				jQuery("#review_rating").val('');
				jQuery("#yacht_review").val('');
				jQuery("#country").val('');
				location.reload();
				
			}
		});
	});
	jQuery("#showReview").click(function(){
	
		showYachtReview();
		
	});
		var post_id = jQuery("#post_id").val();
		function showYachtReview(){
		  jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data:{"is_ajax":"get_yacht_review","post_id":post_id},
			success:function(data){
				jQuery("#reviewYachtContent").html(data);
			}
		  });
		}
	
	
	jQuery(document).on("click", ".btnApprove", function() {
		
		var active = jQuery(this).attr("id");
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data:{"is_ajax":"approve_Yreview","active":active},
			success:function(data){
				jQuery(this).attr("id").val('Unapprove');
			}
		});
	 
	});
	
	jQuery(document).on("click", ".tripAdvisor_icon", function() {
		
		var icon = jQuery(this).attr("id");
		
	  jQuery.ajax({
		type: 'POST',
		url: ReviewAjax.ajaxurl,
		data:{"is_ajax":"tripAdvisor_icon","icon":icon},
		success:function(data){
			 
		}
	  });
	 
	});
	
	jQuery(document).on("click", ".delete_yacht", function() {
		var deleteR_id = jQuery(this).attr("id");
		document.getElementById('confirmation-box-review').style.display = "block";
		document.getElementById('confirmationR_id').value = deleteR_id;
	});
	
	
	jQuery(document).on("click", "#no_delete_review", function() {
		
		document.getElementById('confirmation-box-review').style.display = "none";
		
	});
	
	jQuery(document).on("click", ".close-btnR", function() {
		
		document.getElementById('confirmation-box-review').style.display = "none";
	});
	
	jQuery(document).on("click", "#delete_yacht_review", function() {
		
		var delete_id = jQuery('#confirmationR_id').val();
		
	  jQuery.ajax({
		type: 'POST',
		url: ReviewAjax.ajaxurl,
		data:{"is_ajax":"delete_yacht_review","delete_id":delete_id},
		success:function(data){
			document.getElementById('confirmation-box-review').style.display = "none";
			location.reload();
			 showYachtReview();
		}
	  });
	 
	});
	
	
	jQuery(document).on("click", ".editYachtReview", function() {
		
		var edit_id = jQuery(this).attr("id");
		
	  jQuery.ajax({
		type: 'POST',
		url: ReviewAjax.ajaxurl,
		data:{"is_ajax":"edit_actionYacht","edit_id":edit_id},
		success:function(result){
			jQuery("#yachtReviewEditForm").html(result);
			 
		}
	  });
	 
	});
	
	jQuery(document).on("click", "#updateYachtReview", function() {
		var id = jQuery("#id").val();
		
		var review_post_id = jQuery("#post_id").val();
		var author_name1 = jQuery("#review_author_name1").val();
		var review_title1 = jQuery("#review_title1").val();
		var country1 = jQuery("#country1").val();
		var review_author_email1 = jQuery("#yacht_author_email_address1").val();
		var review_rating1 = jQuery("#review_rating1").val();
		var yacht_review1 = jQuery("#yacht_review1").val();
		var publish_date1 = jQuery("#publish_date1").val();
		
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "updateyachtReviews", "id":id, "post_id":review_post_id, "review_author_name":author_name1,"review_title1":review_title1,"country1":country1,"yacht_author_email_address":review_author_email1,"publish_date1":publish_date1,"review_rating":review_rating1,"yacht_review":yacht_review1},
			success: function(data){
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", "#yachtPackageBtn", function() {
		var this_yacht_id = jQuery("#this_yacht_id").val();
		var package_title = jQuery("#package_title").val();
		var package_address = jQuery("#package_address").val();
		var package_price = jQuery("#package_price").val();
		var package_discription = tinymce.get('package_discription_name').getContent();
		var package_inclusion = tinymce.get('package_inclusion_name').getContent();
		var package_rate = tinymce.get('package_rate').getContent();
		var package_date = jQuery("#package_date").val();
		var package_image = jQuery("#package_image").val();
		
		/*
		 * Ajax for adding new Retreat Program
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "packageSave","this_yacht_id":this_yacht_id,"package_title":package_title,"package_discription_name":package_discription,"package_inclusion_name":package_inclusion,"package_rate":package_rate,"package_date":package_date,"package_image":package_image,"package_address":package_address,"package_price":package_price},
			success: function(data){
				jQuery('html,body').animate({
					scrollTop: jQuery("#yachtPackage").offset().top},
				'slow');
				jQuery("#yachtPackageForm").hide();
				location.reload();
			}
		});
	});
	
	/*
	* call update js function on click button
	*/
	 jQuery(document).on("click", ".yachtPackageBtn", function() {
		var pid = jQuery(this).attr("id");
		var this_yacht_id = jQuery("#this_yacht_id").val();
		var packages_title = jQuery("#packages_title_"+pid).val();
		var packages_address = jQuery("#packages_address_"+pid).val();
		var packages_price = jQuery("#packages_price_"+pid).val();
		var packages_image = jQuery("#packages_image_"+pid).val();
		var packages_discription = tinymce.get('packages_discription_name_'+pid).getContent();
		var packages_inclusion = tinymce.get('packages_inclusion_name_'+pid).getContent();
		var packages_rate = tinymce.get('packages_rate_'+pid).getContent();
			
		var packages_date = jQuery("#packages_date_"+pid).val();
		/*
		 * Ajax for updating Retreat Package
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "packageUpdate","this_package_id":pid,"this_yacht_id":this_yacht_id,"packages_title":packages_title,"packages_discription_name":packages_discription,"packages_inclusion_name":packages_inclusion,"packages_rate":packages_rate,"packages_date":packages_date,"packages_image":packages_image,"packages_address":packages_address,"packages_price":packages_price},
			success: function(data){
				jQuery('html,body').animate({
					scrollTop: jQuery("#yachtPackage").offset().top},
				'slow');
				jQuery('#editPackageForm_'+pid).toggle('hide');
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", ".deletePackage", function() {
		var delete_package_id = jQuery(this).attr("id");
		document.getElementById('yacht-cbox-package').style.display = "block";
		document.getElementById('confirmationPackage_id').value = delete_package_id;
	});
	
	jQuery(document).on("click", ".no_delete_package", function() {
		
		document.getElementById('yacht-cbox-package').style.display = "none";
		
	});
	
	jQuery(document).on("click", "#yes_delete_package", function() {
		
		var this_package = jQuery('#confirmationPackage_id').val();
		
		/*
		 * Ajax for delete Retreat Program
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "yachtDeletepackage","this_package_id":this_package},
			success: function(data){
				document.getElementById('yacht-cbox-package').style.display = "none";
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", "#yachtAwardBtn", function() {
		
		var this_yacht_id = jQuery("#this_yacht_id").val();
		var award_title = jQuery("#award_title").val();
		var award_content = jQuery("#award_detail").val();
		
		/*
		 * Ajax for adding new  Yacht award
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "yachtAwardSave","this_yacht_id":this_yacht_id,"award_title":award_title,"award_content":award_content},
			success: function(data){
				
				jQuery("#this_yacht_id").val('');
				jQuery("#award_title").val('');
				jQuery("#award_content").val('');
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", ".yachtAwardUpdateBtn", function() {
		var award_id = jQuery(this).attr("id");
		var this_yacht_id = jQuery("#this_yacht_id").val();
		var awards_title = jQuery("#awards_title_"+award_id).val();
		var awards_content = jQuery("#awards_detail_"+award_id).val();
		
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "yachtAwardUpdate","this_yacht_id":this_yacht_id,"this_award_id":award_id,"awards_title":awards_title,"awards_content":awards_content},
			success: function(data){
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", ".yachtDeleteAward", function() {
		var deleteA_id = jQuery(this).attr("id");
		document.getElementById('yacht-cbox-award').style.display = "block";
		document.getElementById('confirmationA_id').value = deleteA_id;
	});
	
	
	jQuery(document).on("click", "#yes_delete_award", function() {
		
		var award_id = jQuery('#confirmationA_id').val();
		
		/*
		 * Ajax for delete Retreat Program
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "yachtDeleteAward","this_award_id":award_id},
			success: function(data){
				document.getElementById('yacht-cbox-award').style.display = "none";
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", "#nightPackageBtn", function() {
		
		var this_yacht_id = jQuery("#this_yacht_id").val();
		var night_title = jQuery("#night_title").val();
		var night_content = tinymce.get('night_content').getContent();
		
		var id_package = jQuery("#id_package").val();
		
		/*
		 * Ajax for adding new  Package Night
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "packageNightSave","this_yacht_id":this_yacht_id,"night_title":night_title,"night_content":night_content,"id_package":id_package},
			success: function(data){
				jQuery("#yachtPackageNightForm").hide();
				jQuery("#this_yacht_id").val('');
				jQuery("#night_title").val('');
				tinymce.get('night_content').getContent('');
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", ".updatePackageNightBtn", function() {
		var night_id = jQuery(this).attr("id");
		
		var this_yacht_id = jQuery("#this_yacht_id").val();
		var nights_title = jQuery("#nights_title_"+night_id).val();
		var packages_id = jQuery("#id_packages_"+night_id).val();
		var nights_content = tinymce.get('nights_content_'+night_id).getContent();
		
		
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "packageNightUpdate","this_yacht_id":this_yacht_id,"this_night_id":night_id,"packages_id":packages_id,"nights_title":nights_title,"nights_content":nights_content},
			success: function(data){
				location.reload();
				jQuery('html,body').animate({
					scrollTop: jQuery("#yachtPackage").offset().top},
					'slow');
			}
		});
	});
	
	jQuery(document).on("click", "#yes_delete_night", function() {
		
		var package_night_id = jQuery('#confirmationN_id').val();
		
		/*
		 * Ajax for delete Retreat Program
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "yachtDeleteNight","this_night_id":package_night_id},
			success: function(data){
				document.getElementById('package-cbox-night').style.display = "none";
				location.reload();
			}
		});
	});
	
	
	/*
	 * Cabin Form Toggle
	 */		
	jQuery('#yachtCabin').live('click', function(event) {        
		jQuery('#yachtCabinForm').toggle('hide');
		jQuery('#yachtCabinForm iframe').addClass('auto-height').css('height','auto');
	});
	
	jQuery('.editCabin').live('click', function(event) {  
		var tid = jQuery(this).attr("id");
		
		jQuery('#editCabinForm_'+tid).toggle('hide');
		jQuery('.editProgramForm iframe').addClass('auto-height').css('height','auto');
		
	});
		
		
	jQuery(document).on("click", "#yachtCabinBtn", function() {
		
		var this_yacht_id = jQuery("#this_yacht_id").val();
		var cabin_title = jQuery("#cabin_title").val();
		var cabin_image_first = jQuery("#cabin_image_first").val();
		var cabin_image_second = jQuery("#cabin_image_second").val();
		var cabin_image_third = jQuery("#cabin_image_third").val();
		var cabin_image_fourth = jQuery("#cabin_image_fourth").val();
		var cabin_image_fifth = jQuery("#cabin_image_fifth").val();
		var cabin_discription = tinymce.get('cabin_discription_name').getContent();
		
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "cabinSave","this_yacht_id":this_yacht_id,"cabin_title":cabin_title,"cabin_image_first":cabin_image_first,"cabin_image_second":cabin_image_second,"cabin_image_third":cabin_image_third,"cabin_image_fourth":cabin_image_fourth,"cabin_image_fifth":cabin_image_fifth,"cabin_discription_name":cabin_discription},
			success: function(data){
				location.reload();
			}
		});
	});
	
	/*
	* call update js function on click button
	*/
	jQuery(document).on("click", ".editCabinBtn", function() {
		var aid = jQuery(this).attr("id");
		
		var this_yacht_id = jQuery("#cabinRet_id").val();
		var cabins_title = jQuery("#cabins_title_"+aid).val();
		
		var cabins_image = jQuery("#cabins_image_"+aid).val();
		var cabins_image_second = jQuery("#cabins_image_second_"+aid).val();
		var cabins_image_third = jQuery("#cabins_image_third_"+aid).val();
		var cabins_image_fourth = jQuery("#cabins_image_fourth_"+aid).val();
		var cabins_image_fifth = jQuery("#cabins_image_fifth_"+aid).val();
		var cabins_discription = tinymce.get('cabin_discription_name_'+aid).getContent();
		
		
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "cabinUpdate","this_cabin_id":aid,"this_yacht_id":this_yacht_id,"cabins_title":cabins_title,"cabins_image":cabins_image,"cabins_image_second":cabins_image_second,"cabins_image_third":cabins_image_third,"cabins_image_fourth":cabins_image_fourth,"cabins_image_fifth":cabins_image_fifth,"cabins_discription_name":cabins_discription},
			success: function(data){
				location.reload();
			}
		});
	});
	
	
	jQuery(document).on("click", ".deleteCabin", function() {
		var cabins_id = jQuery(this).attr("id");
		document.getElementById('confirmation-box-cabin').style.display = "block";
		document.getElementById('confirmation_cabin').value = cabins_id;
	});
	
	jQuery(document).on("click", ".no_delete", function() {
		
		document.getElementById('confirmation-box-night').style.display = "none";
		
	});
	jQuery(document).on("click", ".no_delete_cabin", function() {
		
		document.getElementById('confirmation-box-cabin').style.display = "none";
		
	});
	
	
	jQuery(document).on("click", "#yes_delete_cabin", function() {
		
		var confirmation_cabin = jQuery('#confirmation_cabin').val();
		
		/*
		 * Ajax for delete yacht Cabin
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "deleteCabin","delete_cabin":confirmation_cabin},
			success: function(data){
				document.getElementById('confirmation-box-cabin').style.display = "none";
				location.reload();
			}
		});
	});
	
});