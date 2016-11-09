<?php
$msg='';
$atts="";
if (!empty($_POST)) {
	$name='';
	$email='';
	$ratingStar='';
	$captcha = '';
	$error=false;
	
	
	if(isset($_POST['villa_id']) && $_POST['villa_id'] !=''){
		$villa_id=$_POST['villa_id'];
	}else{
		$error=true;
	}
	
	if(isset($_POST['villa_name']) && $_POST['villa_name'] !=''){
		$villa_name=$_POST['villa_name'];
	}else{
		$error=true;
	}
	
	if(isset($_POST['name']) && $_POST['name'] !=''){
		$name=$_POST['name'];
	}else{
		$error=true;
	}


	if(isset($_POST['country']) && $_POST['country'] !=''){
		$country=$_POST['country'];
	}else{
		$error=true;
	}

	if(isset($_POST['email']) && $_POST['email'] !=''){
		$email=$_POST['email'];
	}else{
		$error=true;
	}

	if(isset($_POST['ratingStar']) && $_POST['ratingStar'] !=''){
		$rating=$_POST['ratingStar'];
	}else{
		$error=true;
	}

	if(isset($_POST['message']) && $_POST['message'] !=''){
		$message=$_POST['message'];
	}else{
		$error=true;
	}
	if(isset($_POST['date_stayed']) && $_POST['date_stayed'] !=''){
		$review_date = $_POST['date_stayed'];
		$old_date_timestamp = strtotime($review_date);
		$date  = date('Y-m-d', $old_date_timestamp);
	}else{
		$date = date('y-m-d');
	}
	
	if(isset($_POST['captcha']) && $_POST['captcha'] !=''){
		$captcha = $_POST['captcha']; 
	}
	
	if($error ==false){
		$body='<table width="600px">';
			$body .='<tr>';
				$body .='<td colspan="2">Review form filled on hinolincolnshire.co.uk website. Please find details below.</td>';
			$body .='</tr>';

			$body .='<tr>';
				$body .='<td colspan="2">&nbsp;</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Villa Name</td>';
				$body .='<td>' . $villa_name .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Name</td>';
				$body .='<td>' . $name .'</td>';
			$body .='</tr>';

			$body .='<tr>';
				$body .='<td>Country</td>';
				$body .='<td>' . $country .'</td>';
			$body .='</tr>';
			
			if($email !=''){
				$body .='<tr>';
					$body .='<td>Email</td>';
					$body .='<td>' . $email .'</td>';
				$body .='</tr>';
			}
			
			$body .='<tr>';
				$body .='<td>Rating</td>';
				$body .='<td>' . $rating .' Out of 5 '.'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Review</td>';
				$body .='<td>' . $message .'</td>';
			$body .='</tr>';
			
		$body .='</table>';
		
		

		/**
		* send email
		*/
		$to='rammigill@hotmail.com';
		$subject='Review form filled at Ultimate Bali website';


		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'To: Rammi Gill <' . $to.'>' . "\r\n";
		$headers .= 'From: rammigill@hotmail.com <rammigill@hotmail.com>' . "\r\n";
		$headers .= 'Cc: ' . "\r\n";
		
		mail($to, $subject, $body, $headers);	
		
	}
	
	
	if($error==false){
		$msg='<p class="thankyou-msg">Thank-You!</p>';
	}else{
		$msg='Please fill in all fields.';
	}	
	
	
	if($captcha == ""){
		global $wpdb;
			$wpdb->insert( 
			'wp_reviews', 
			array( 
				'post_id' => $villa_id,
				'author_name' => $name,
				'country' => $country,
				'author_email' => $email,
				'review_rating' => $rating,
				'review' => $message,
				'review_date' => $date,
			), 
			array( 
				'%d',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s'
			) 
		);
	}							
}
?>

			<?php 
				global $wpdb;
				
				$result = $wpdb->get_results ( "SELECT * FROM wp_reviews Where post_id = " .$id ." and review_approved = 1 ORDER BY review_date DESC " );
				
				$counts = $wpdb->get_var ( "SELECT COUNT(*)  FROM wp_reviews WHERE review_approved = 1 and post_id = " .$id );
				
			?>
			
			<?php
					
			
				$output = $title = $interval = $el_class = $style =  $reviews = '';
				extract(shortcode_atts(array(
					'title' => '',
					'interval' => 0,
					'el_class' => '',
					'style' => 'horizontal'
				), $atts));

				wp_enqueue_script('jquery-ui-tabs');
				$element = 'wpb_tabs';
				switch($style) {
					case 'boxed':
						$tab_style_class = 'boxed';
						break;
					case 'vertical_left':
						$tab_style_class = 'vertical left';
						break;
					case 'vertical_right':
						$tab_style_class = 'vertical right';
						break;
					case 'horizontal':
						$tab_style_class = 'horizontal center';
						break;
					case 'horizontal_left':
						$tab_style_class = 'horizontal left';
						break;
					case 'horizontal_right':
						$tab_style_class = 'horizontal right';
						break;
				}
			?>
<div class="review-section" id="review-section">								
<div class="<?php echo $css_class; ?>" data-interval="<?php echo $interval; ?>">
	<div class="q_tabs boxed <?php echo $tab_style_class; ?>">

		<ul class="tabs-nav">
			<li><a href="#tab-reviews"><h3 class="detail-heading">Reviews</h3></a></li>
			<li><a href="#tab-new-review"><span class="detail-heading">Add a Review</span></a></li>

		</ul>
		<div class='tabs-container'>
		<?php $css_class =  "tab-content"; ?>
			<div id="tab-reviews" class="<?php echo $css_class;  if($counts>=3){ echo ' frame'; } ?>" >
				<div class="review-display">
					<?php if(isset($msg) && $msg !=''){ echo $msg;} ?>
					<?php if(!empty($result)) { ?>
						<?php foreach ( $result as $row )   { ?>
							<ol class="review-comments">
								<li class="" id="">
									<div id="" class="">

										<div class="comment-text">
											<?php if($row->review_title != ""){ ?>
												<p class="review-title"><?php echo  stripslashes($row->review_title);  ?></p>
											<?php } ?>
											<div itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating" class="star-rating" title="Rated 5 out of 5">
												<span>
													<?php  $nb_stars = $row->review_rating; ?>
													<?php
													for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
														if ( $star_counter <= $nb_stars ) { 
															?>
															<i class="fa fa-star review-star"></i>
														<?php } else { ?>
															<i class="fa fa-star-o"></i>
														<?php }
													} ?>
												</span>
											</div>

											<div class="review-desc">
												<?php  echo  stripslashes($row->review); ?>
												<?php  $icon = $row->review_icon; ?>
											</div>
											<?php $publish_date = $row->review_date; ?>
											<?php
												if($publish_date == "0000-00-00"){
													$new_date = "";
												}else{
													
													$new_date = date('F Y',strtotime( $row->review_date ) );
												}
											?>
											<p class="author-info">
												<strong itemprop="author"><?php  echo   stripslashes($row->author_name); if($row->country != "" ){ echo " | ".  stripslashes($row->country); } ?><?php if($publish_date != "0000-00-00" && $publish_date != ""){ ?> | <?php } ?><time itemprop="datePublished" datetime="2014-01-10T12:14:48+00:00"><?php  echo  $new_date; ?> </time></strong><?php if($icon == "1"){ echo "<strong> | </strong>	" ?><img title="Tripadvisor Reviewed" src="<?php echo get_stylesheet_directory_uri(). '/img/tripadvisor-icon.jpg'; ?>" class="tripadviser-icon"/> <?php } ?>
											</p>
											
										</div>
									</div>
								</li><!-- #comment-## -->
							</ol>
						<?php }
					}else{
						echo "No reviews found";
					}
					?>
				</div>

			</div>
			<div id="tab-new-review" class="<?php echo $css_class; ?>">
				<div class="review-form">
					
					<div class="contact_form contact_form_review">
						<form id="" method="POST" action="">
							<input type="hidden" class="requiredField placeholder" name="villa_id" id="villa_id" value="<?php echo get_the_ID(); ?>" placeholder="">
							<input type="hidden" class="requiredField placeholder" name="villa_name" id="villa_name" value="<?php the_title(); ?>" placeholder="">
							<input type="text" class="requiredField placeholder" name="name" id="name" value="" placeholder="Name *">
							<input type="text" class="requiredField placeholder" name="country" id="country" value="" placeholder="Country *">
							<input type="text" class="requiredField placeholder" name="date_stayed" id="date_stayed" value="" placeholder="Date Stayed">
							<input type="text" class="requiredField email placeholder" name="email" id="email" value="" placeholder="Email *">
							<span class="comment-form-rating">
								<label for="rating">Your Rating</label>
								<ul class="stars" id="stars2">

									<li id="1"><a value="1" class="star-1 off" href="#">1</a></li>
									<li id="2"><a value="2" class="star-2" href="#">2</a></li>
									<li id="3"><a value="3" class="star-3" href="#">3</a></li>
									<li id="4"><a value="4" class="star-4" href="#">4</a></li>
									<li id="5"><a value="5	" class="star-5" href="#">5</a></li>

								</ul>
								<select name="rating" id="rating" style="display: none;">
									<option value="">Rate…</option>
									<option value="5">Perfect</option>
									<option value="4">Good</option>
									<option value="3">Average</option>
									<option value="2">Not that bad</option>
									<option value="1">Very Poor</option>
								</select>
							</span>
							<input name="ratingStar" value="" type="hidden" id="selectStar"/>
							<input type="text" id="selectStar" name="captcha" value="" class="review-captcha"/>
							<textarea name="message" id="message" rows="5" placeholder="Your Review" class="placeholder"></textarea>
							<span id="msg" style="color:red;"><?php if(isset($msg) && $msg !=''){ echo $msg;} ?></span>															
							<span class="submit_button_contact">
								<input class="qbutton White" value="Submit" id="submit" name="submit" type="submit">
							</span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div> 
</div> 
</div>							
			
			
			
			
			
			<script>
			jQuery(document).ready(function($){
				$( ".review-section .tabs-nav li:nth-child(2)" ).addClass('second-li');
				$(".stars  li").click(function(){
				  $(".stars  li").removeClass('active');//to make sure there will be only one with the class 'active'
				  $(this).addClass('active');
				 var selectStar = $("#stars2 li.active").attr('id')
				
				 $("#selectStar").val(selectStar);
				});
			
				$(document).on("click", "#submit", function() {
					var name, email, rating, message;
					var emailPattern = /\S+@\S+\.\S+/;
					villa_id = $("#villa_id").val();
					villa_name = $("#villa_name").val();
					name = $("#name").val();
					email = $("#email").val();
					rating = $("#selectStar").val();
					message = $("#message").val();
					country = $("#country").val();
					if(name=='' ){
					$("#msg").show().html('Please enter your name.');
						return false;
					}else if(country==''){
						$("#msg").show().html('Please enter your country');
						return false;
					}else if(email == '' ){
						$("#msg").show().html('Please enter your email address.');
						return false;
					}else if(!email.match(emailPattern)){
						$("#msg").show().html('Please enter a valid email.');
						return false;
					}else if(rating == ""){
						$("#msg").show().html('Please select your rating');
						return false;
					}else if(message == ""){
						$("#msg").show().html('Please enter your review');
						return false;
					}
					
				});
			});
		</script>
		