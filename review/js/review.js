jQuery(document).ready(function(){
	
		var post_id = jQuery("#show_post_id").val();
	
		jQuery('#newReview').live('click', function(event) {        
			jQuery('#reviewForm').toggle('hide');
		});
		
		window.onload = showReview;
		
	
	jQuery("#review").click(function(){
		var review_post_id = jQuery("#post_id").val();
		var author_name = jQuery("#review_author_name1").val();
		var review_title = jQuery("#review_title").val();
		var review_author_email = jQuery("#review_author_email_address1").val();
		var review_rating = jQuery("#review_rating1").val();
		var custom_review = jQuery("#custom_review1").val();
		var country = jQuery("#country").val();
		var publish_date = jQuery("#publish_date").val();
		
		
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"action": "post_word_count", "post_id":review_post_id, "review_author_name1":author_name,"review_title":review_title,"country":country,"review_date":publish_date,"review_author_email_address1":review_author_email,"review_rating1":review_rating,"custom_review1":custom_review},
			success: function(data){
				
				jQuery("#review_author_name1").val('');
				jQuery("#review_title").val('');
				jQuery("#review_author_email_address1").val('');
				jQuery("#review_rating1").val('');
				jQuery("#custom_review1").val('');
				jQuery("#reviewForm").hide();
				showReview();
				
			}
		});
	});
	jQuery("#showReview").click(function(){
	

		showReview();
	});
		var post_id = jQuery("#show_post_id").val();
		function showReview(){
	  jQuery.ajax({
		type: 'POST',
		url: ReviewAjax.ajaxurl,
		data:{"action":"get_custom_review","post_id":post_id},
		success:function(data){
			 jQuery("#reviewContent").html(data);
		}
	  });
	  }
	
	
	jQuery(document).on("click", ".btnapprove", function() {
		
		var active = jQuery(this).attr("id");
		
	  jQuery.ajax({
		type: 'POST',
		url: ReviewAjax.ajaxurl,
		data:{"is_ajax":1,"active":active},
		success:function(data){
			 jQuery(this).attr("id").val('Unapprove');
		}
	  });
	 
	});
	
	
	jQuery(document).on("click", ".delete", function() {
		
		var delete_id = jQuery(this).attr("id");
		
	  jQuery.ajax({
		type: 'POST',
		url: ReviewAjax.ajaxurl,
		data:{"is_ajax":1,"delete_id":delete_id},
		success:function(data){
			 showReview();
		}
	  });
	 
	});
	
	
	jQuery(document).on("click", ".edit", function() {
		
		var edit_id = jQuery(this).attr("id");
		
	  jQuery.ajax({
		type: 'POST',
		url: ReviewAjax.ajaxurl,
		data:{"is_ajax":"edit_actionVillas","edit_id":edit_id},
		success:function(result){
			jQuery("#reviewEditForm").html(result);
			 showReview();
		}
	  });
	 
	});
	
	jQuery(document).on("click", "#updateReview", function() {
		
		var id = jQuery("#id").val();
		var review_post_id = jQuery("#post_id").val();
		var author_name = jQuery("#review_author_name").val();
		var review_title1 = jQuery("#review_title1").val();
		var country1 = jQuery("#country1").val();
		var review_author_email = jQuery("#retreat_author_email_address").val();
		var review_rating = jQuery("#review_rating").val();
		var custom_review = jQuery("#custom_review").val();
		var review_date1 = jQuery("#review_date1").val();
		
		jQuery.ajax({
			type: 'POST',
			url: ReviewAjax.ajaxurl,
			data: {"is_ajax": "updatecustomReviews", "id":id, "post_id":review_post_id, "review_author_name":author_name,"review_title1":review_title1,"country1":country1,"retreat_author_email_address":review_author_email,"review_rating":review_rating,"custom_review":custom_review},
			success: function(data){
				jQuery("#updateReviewForm").hide();
				showReview();
				
			}
		});
	});
	
});