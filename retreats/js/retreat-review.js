jQuery(document).ready(function(){
	
		var post_id = jQuery("#show_retreat_id").val();
		
		/*
		 * Review Form Toggle
		 */
		
		jQuery('#retreatReview').live('click', function(event) {        
			jQuery('#retreatReviewForm').toggle('hide');
		});
		/*
		 * Program Form Toggle
		 */		
		jQuery('#retreatProgram').live('click', function(event) {  
			
			jQuery('#retreatProgramForm').toggle('hide');
			jQuery('#retreatProgramForm iframe').addClass('auto-height').css('height','auto');
			
		});
		
		jQuery('#cRetreatProgramBtn').live('click', function(event) { 
		
			jQuery('#retreatProgramForm').toggle('hide');
		});
		
		jQuery('#programNight').live('click', function(event) {        
			jQuery('#retreatProgramNightForm').toggle('hide');
			jQuery('#retreatProgramNightForm iframe').addClass('auto-height').css('height','auto');
		});
		
		/*
		 * Accommodation Form Toggle
		 */		
		jQuery('#retreatAccommodation').live('click', function(event) {        
			jQuery('#retreatAccommoForm').toggle('hide');
			jQuery('#retreatAccommoForm iframe').addClass('auto-height').css('height','auto');
		});
		/*
		 * Program Edit Form Toggle
		 */		
		jQuery('.editProgram').live('click', function(event) {  
			var tid = jQuery(this).attr("id");
			
			jQuery('#editProgramForm_'+tid).toggle('hide');
			jQuery('.editProgramForm iframe').addClass('auto-height').css('height','auto');
		});
		/*
		 * Acoommodation Edit Form Toggle
		 */		
		jQuery('.editAccommo').live('click', function(event) {  
			var tid = jQuery(this).attr("id");
			
			jQuery('#editAccommoForm_'+tid).toggle('hide');
			jQuery('.editProgramForm iframe').addClass('auto-height').css('height','auto');
			
		});
		
		jQuery('.editNight').live('click', function(event) {  
			var nid = jQuery(this).attr("id");
			
			jQuery('#editNightForm_'+nid).toggle('hide');
			jQuery('.program-night iframe').addClass('auto-height').css('height','auto');
		});
		
		
		jQuery('.editAward').live('click', function(event) {  
			var aid = jQuery(this).attr("id");
			
			jQuery('#editAwardForm_'+aid).toggle('hide');
			jQuery('.award-form iframe').addClass('auto-height').css('height','auto');
		});
		
		window.onload = showRetreatReview;
		
		/*
		 * Call Review Function on click Button
		 */	
	jQuery("#retreatReviewBtn").click(function(){
		var review_post_id = jQuery("#retreat_id").val();
		var author_name = jQuery("#review_author_retreat").val();
		var review_title = jQuery("#review_title").val();
		var review_author_email = jQuery("#review_author_email_address").val();
		var review_rating = jQuery("#review_rating_retreat").val();
		var retreat_review = jQuery("#retreat_review").val();
		var country = jQuery("#country").val();
		var publish_date = jQuery("#publish_date").val();
		
		/*
		 * Ajax for adding New Review
		 */		
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"action": "retreat_review_save", "retreat_id":review_post_id, "review_author_retreat":author_name,"review_title":review_title,"country":country,"review_date":publish_date,"review_author_email_address":review_author_email,"review_rating_retreat":review_rating,"retreat_review":retreat_review},
			success: function(data){
				
				jQuery("#review_author_retreat").val('');
				jQuery("#review_title").val('');
				jQuery("#review_author_email_address").val('');
				jQuery("#review_rating_retreat").val('');
				jQuery("#retreat_review").val('');
				
				location.reload();
		
			}
		});
	});
	jQuery("#showRetreatReview").click(function(){
	

		showRetreatReview();
	});
		var post_id = jQuery("#show_retreat_id").val();
		function showRetreatReview(){
	  jQuery.ajax({
		type: 'POST',
		url: ReviewAjax.ajaxurl,
		data:{"action":"get_retreat_review","show_retreat_id":post_id},
		success:function(data){
		
			 jQuery("#retreatReviewsContent").html(data);
			 
		}
	  });
	  }

		/*
		 *  call js function on click Button
		 */	  
	
	jQuery(document).on("click", ".btnapproveRetreat", function() {
		
		var active = jQuery(this).attr("id");
		/*
		 * Ajax for Review Approved and Unapproved
		 */		
	  jQuery.ajax({
		type: 'POST',
		url: ReviewAjax.ajaxurl,
		data:{"is_ajax":1,"active":active},
		success:function(data){
			 
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
	
	/*
	 * Delete Review on click js function
	 */	
	 
	 jQuery(document).on("click", ".delete_retreat", function() {
	 
		var deleteR_id = jQuery(this).attr("id");
		
		document.getElementById('confirmation-box-reviewR').style.display = "block";
		document.getElementById('confirmationRetreatR_id').value = deleteR_id;
	});
	 
	jQuery(document).on("click", "#no_deleteRetreat", function() {
		document.getElementById('confirmation-box-reviewR').style.display = "none";
	});
	
	jQuery(document).on("click", ".close-btnR", function() {
		document.getElementById('confirmation-box-reviewR').style.display = "none";
	});
	
	jQuery(document).on("click", "#deleteRetreat", function() {
		
		var delete_id = jQuery('#confirmationRetreatR_id').val();
		
		/*
		 * Ajax for delete Review
		 */
		
	  jQuery.ajax({
		type: 'POST',
		url: ReviewAjax.ajaxurl,
		data:{"is_ajax":"deleteRetreat","delete_id":delete_id},
		success:function(data){
			location.reload();
		}
	  });
	 
	});
	

	/*
	* Edit Review on click js function
	*/	
	
	jQuery(document).on("click", ".editRetreat", function() {
		
		var edit_id = jQuery(this).attr("id");
	/*
	 * Ajax for edit Review
	 */		
	  jQuery.ajax({
		type: 'POST',
		url: ReviewAjax.ajaxurl,
		data:{"is_ajax":"edit_actionRetreat","edit_id":edit_id},
		success:function(result){
			jQuery("#retreatReviewEditForm").html(result);
			 
		}
	  });
	 
	});
	
	
	/*
	* Update Review on click js function
	*/
	
	jQuery(document).on("click", "#updateRetreatReview", function() {
		
		var id = jQuery("#id").val();
		var review_post_id = jQuery("#post_id").val();
		var author_name = jQuery("#review_author_name").val();
		var review_title1 = jQuery("#review_title1").val();
		var country1 = jQuery("#country1").val();
		var review_author_email = jQuery("#retreat_author_email_address").val();
		var review_rating = jQuery("#review_rating").val();
		var retreat_review1 = jQuery("#retreat_review1").val();
		var review_date1 = jQuery("#review_date1").val();
		
		/*
		 * Ajax for update Review
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "updateReviews", "id":id, "post_id":review_post_id, "review_author_name":author_name,"review_title1":review_title1,"country1":country1,"review_date1":review_date1,"author_email_address":review_author_email,"review_rating":review_rating,"retreat_review":retreat_review1},
			success: function(data){
				
				jQuery("#updateReviewForm").hide();
				location.reload();
				
			}
		});
	});
	
	/*
	* Retreat Program on click js function
	*/
	
	jQuery(document).on("click", "#retreatProgramBtn", function() {
		var this_retreat_id = jQuery("#this_retreat_id").val();
		var program_title = jQuery("#program_title").val();
		var program_night = jQuery("#program_night").val();
		var program_address = jQuery("#program_address").val();
		var program_price = jQuery("#program_price").val();
		var program_discription = tinymce.get('program_discription_name').getContent();
		var program_inclusion = tinymce.get('program_inclusion_name').getContent();
		var program_rate = tinymce.get('program_rate').getContent();
		var program_date = jQuery("#program_date").val();
		var program_image = jQuery("#program_image").val();
		
		/*
		 * Ajax for adding new Retreat Program
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "programSave","this_retreat_id":this_retreat_id,"program_title":program_title,"program_discription_name":program_discription,"program_inclusion_name":program_inclusion,"program_rate":program_rate,"program_date":program_date,"program_image":program_image,"program_night":program_night,"program_address":program_address,"program_price":program_price},
			success: function(data){
				jQuery("#retreatProgramForm").hide();
				location.reload();
			}
		});
	});
	
	/*
	* call update js function on click button
	*/
	 jQuery(document).on("click", ".retreatProgramBtn", function() {
		var pid = jQuery(this).attr("id");
		var this_retreat_id = jQuery("#this_retreat_id").val();
		var programs_title = jQuery("#programs_title_"+pid).val();
		var programs_night = jQuery("#programs_night_"+pid).val();
		var programs_address = jQuery("#programs_address_"+pid).val();
		var programs_price = jQuery("#programs_price_"+pid).val();
		var programs_image = jQuery("#programs_image_"+pid).val();
		var programs_discription = tinymce.get('programs_discription_name_'+pid).getContent();
		var programs_inclusion = tinymce.get('programs_inclusion_name_'+pid).getContent();
		var programs_rate = tinymce.get('programs_rate_'+pid).getContent();
			
		var programs_date = jQuery("#programs_date_"+pid).val();
		/*
		 * Ajax for updating Retreat Program
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "programUpdate","this_program_id":pid,"this_retreat_id":this_retreat_id,"programs_title":programs_title,"programs_discription_name":programs_discription,"programs_inclusion_name":programs_inclusion,"programs_rate":programs_rate,"programs_date":programs_date,"programs_image":programs_image,"programs_night":programs_night,"programs_address":programs_address,"programs_price":programs_price},
			success: function(data){
				location.reload();
				jQuery('html,body').animate({
					scrollTop: jQuery("#retreatProgram").offset().top},
					'slow');
				
				
			}
		});
	});
	  
	  
	jQuery(document).on("click", ".deleteProgram", function() {
		var program_id = jQuery(this).attr("id");
		document.getElementById('confirmation-box-program').style.display = "block";
		document.getElementById('confirmationP_id').value = program_id;
	});
	
	
	jQuery(document).on("click", ".no_delete_program", function() {
		
		document.getElementById('confirmation-box-program').style.display = "none";
		
	});
	
	  
	 /*
	* call delete js function on click button
	*/ 
	jQuery(document).on("click", "#yes_delete_program", function() {
		
		var pid = jQuery('#confirmationP_id').val();
		
		/*
		 * Ajax for delete Retreat Program
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "deleteProgram","this_program_id":pid},
			success: function(data){
				document.getElementById('confirmation-box-program').style.display = "none";
				location.reload();
			}
		});
	});
	  
	  jQuery(document).on("click", "#retreatAccommoBtn", function() {
		var this_retreat_id = jQuery("#this_retreat_id").val();
		var accommo_title = jQuery("#accommo_title").val();
		var accommo_image_first = jQuery("#accommo_image_first").val();
		var accommo_image_second = jQuery("#accommo_image_second").val();
		var accommo_image_third = jQuery("#accommo_image_third").val();
		var accommo_image_fourth = jQuery("#accommo_image_fourth").val();
		var accommo_image_fifth = jQuery("#accommo_image_fifth").val();
		var accommodation_discription = tinymce.get('accommodation_discription_name').getContent();
		
		
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "accommodationSave","this_retreat_id":this_retreat_id,"accommo_title":accommo_title,"accommo_image_first":accommo_image_first,"accommo_image_second":accommo_image_second,"accommo_image_third":accommo_image_third,"accommo_image_fourth":accommo_image_fourth,"accommo_image_fifth":accommo_image_fifth,"accommodation_discription_name":accommodation_discription},
			success: function(data){
				location.reload();	
			}
		});
	});
	
	/*
	* call update js function on click button
	*/
	jQuery(document).on("click", ".editAccommoBtn", function() {
		var aid = jQuery(this).attr("id");
		
		var this_retreat_id = jQuery("#accommoRet_id").val();
		var accommos_title = jQuery("#accommos_title_"+aid).val();
		
		var accommos_image = jQuery("#accommos_image_"+aid).val();
		var accommos_image_second = jQuery("#accommos_image_second_"+aid).val();
		var accommos_image_third = jQuery("#accommos_image_third_"+aid).val();
		var accommos_image_fourth = jQuery("#accommos_image_fourth_"+aid).val();
		var accommos_image_fifth = jQuery("#accommos_image_fifth_"+aid).val();
		var accommodations_discription = tinymce.get('accommo_discription_name_'+aid).getContent();
		
		
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "accommodationUpdate","this_accommo_id":aid,"this_retreat_id":this_retreat_id,"accommos_title":accommos_title,"accommos_image":accommos_image,"accommos_image_second":accommos_image_second,"accommos_image_third":accommos_image_third,"accommos_image_fourth":accommos_image_fourth,"accommos_image_fifth":accommos_image_fifth,"accommodations_discription_name":accommodations_discription},
			success: function(data){
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", "#nightProgramBtn", function() {
		
		var this_retreat_id = jQuery("#this_retreat_id").val();
		var night_title = jQuery("#night_title").val();
		var night_content = tinymce.get('night_content').getContent();
		var night_condition = tinymce.get('night_condition').getContent();
		var id_program = jQuery("#id_program").val();
		
		/*
		 * Ajax for adding new  Program Night
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "programNightSave","this_retreat_id":this_retreat_id,"night_title":night_title,"night_content":night_content,"night_condition":night_condition,"id_program":id_program},
			success: function(data){
				jQuery("#retreatProgramNightForm").hide();
				jQuery("#this_retreat_id").val('');
				jQuery("#night_title").val('');
				tinymce.get('night_content').getContent('');
				tinymce.get('night_condition').getContent('');
				jQuery("#id_program").val('');
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", ".updateNightBtn", function() {
		var night_id = jQuery(this).attr("id");
		
		var this_retreat_id = jQuery("#this_retreat_id").val();
		var nights_title = jQuery("#nights_title_"+night_id).val();
		var programs_id = jQuery("#id_programs_"+night_id).val();
		var nights_content = tinymce.get('nights_content_'+night_id).getContent();
		var nights_condition = tinymce.get('nights_condition_'+night_id).getContent();
		
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "nightUpdate","this_retreat_id":this_retreat_id,"this_night_id":night_id,"programs_id":programs_id,"nights_title":nights_title,"nights_content":nights_content,"nights_condition":nights_condition},
			success: function(data){
				location.reload();
				jQuery('html,body').animate({
					scrollTop: jQuery("#retreatProgram").offset().top},
					'slow');
			}
		});
	});
	
	jQuery(document).on("click", "#awardBtn", function() {
		
		var this_retreat_id = jQuery("#this_retreat_id").val();
		var award_title = jQuery("#award_title").val();
		var award_content = jQuery("#award_detail").val();
		
		/*
		 * Ajax for adding new  Retreat award
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "programAwardSave","this_retreat_id":this_retreat_id,"award_title":award_title,"award_content":award_content},
			success: function(data){
				
				jQuery("#this_retreat_id").val('');
				jQuery("#award_title").val('');
				jQuery("#award_content").val('');
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", ".deleteNight", function() {
		var night_id = jQuery(this).attr("id");
		document.getElementById('confirmation-box-night').style.display = "block";
		document.getElementById('confirmation_id').value = night_id;
	});
	
	jQuery(document).on("click", ".deleteAccommo", function() {
		var accommos_id = jQuery(this).attr("id");
		document.getElementById('confirmation-box-accommo').style.display = "block";
		document.getElementById('confirmation_accommo').value = accommos_id;
	});
	
	jQuery(document).on("click", ".no_delete", function() {
		
		document.getElementById('confirmation-box-night').style.display = "none";
		
	});
	jQuery(document).on("click", ".no_delete_accommo", function() {
		
		document.getElementById('confirmation-box-accommo').style.display = "none";
		
	});
	
	jQuery(document).on("click", "#yes_delete", function() {
		var confirm_id = jQuery("#confirmation_id").val();
		
		/*
		 * Ajax for delete Retreat Program
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "deleteNight","this_night_id":confirm_id},
			success: function(data){
				document.getElementById('confirmation-box-night').style.display = "none";
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", ".deleteAward", function() {
		
		var award_id = jQuery(this).attr("id");
		
		/*
		 * Ajax for delete Retreat Program
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "deleteAward","this_award_id":award_id},
			success: function(data){
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", "#yes_delete_accommo", function() {
		
		var confirmation_accommo = jQuery('#confirmation_accommo').val();
		
		/*
		 * Ajax for delete Retreat Program
		 */
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "deleteAccommo","delete_accommo":confirmation_accommo},
			success: function(data){
				document.getElementById('confirmation-box-accommo').style.display = "none";
				location.reload();
			}
		});
	});
	
	jQuery(document).on("click", ".awardUpdateBtn", function() {
		var award_id = jQuery(this).attr("id");
		
		var this_retreat_id = jQuery("#this_retreat_id").val();
		var awards_title = jQuery("#awards_title_"+award_id).val();
		var awards_content = jQuery("#awards_detail_"+award_id).val();
		
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "awardUpdate","this_retreat_id":this_retreat_id,"this_award_id":award_id,"awards_title":awards_title,"awards_content":awards_content},
			success: function(data){
			
				location.reload();
			}
		});
	});
	
});