
<?php
global $qode_options_proya;
$id = get_the_ID();

$chosen_sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);
$default_array = array('default', '');


if(!in_array($chosen_sidebar, $default_array)){
	$sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);
}else{
	$sidebar = $qode_options_proya['blog_single_sidebar'];
}

$blog_hide_comments = "";
if (isset($qode_options_proya['blog_hide_comments']))
	$blog_hide_comments = $qode_options_proya['blog_hide_comments'];

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$background_color = get_post_meta($id, "qode_page_background_color", true);
}else{
	$background_color = "";
}
?>
<?php get_header('archive'); ?>
  <?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	  <?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
			<script>
			var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
			</script>
	  <?php } ?>
				
	  <div class="title_outer title_without_animation" data-height="220">
		<div class="title title_size_small  position_left" style="height:253px;background-color:#F6F6F6; display:none;">
			<div class="image not_responsive"></div>
			<div class="title_holder" style="padding-top:134px;height:119px;">
				<div class="container">
					<div class="container_inner clearfix">
						<div class="title_subtitle_holder">
							<div class="title_subtitle_holder_inner">
								<h1><span><?php the_title(); ?></span></h1>
								<div id="page_load" class="breadcrumb"><div class="breadcrumbs"><div class="breadcrumbs_inner"><a href="<?php echo home_url(); ?>">Home</a><span class="delimiter">&nbsp;&gt;&nbsp;</span><span class="current"><?php echo the_title(); ?></span></div></div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	  
	<div class="container">
	<div class="title-row">
		<div class="container_inner default_template_holder clearfix page_container_inner">
			<div class="wpb_row section vc_row-fluid" style=" text-align:left;">
				<div class=" full_section_inner clearfix">
					<div class="vc_span12 wpb_column column_container ">
						<div class="wpb_wrapper">
							<div class="vc_col-sm-9 wpb_column vc_column_container">
								<div class="villa-info">
									<h1 class="capitalize light-weight"><?php the_title(); ?></h1>
									<?php  
										$home_url = "";
										$wording = get_post_meta(get_the_ID(), "wording", true);
										$price_from = get_post_meta(get_the_ID(), "price_from", true);
										$price_to = get_post_meta(get_the_ID(), "price_to", true);
										$rates = get_post_meta(get_the_ID(), "rates", true);
										$location = get_post_meta(get_the_ID(), "address", true);
										$latitude = get_post_meta(get_the_ID(), "latitude", true);
										$longitude = get_post_meta(get_the_ID(), "longitude", true);
										$overview = get_post_meta(get_the_ID(), "overview", true);
										$program_overview = get_post_meta(get_the_ID(), "program_overview", true);
										$program_bottom_overview = get_post_meta(get_the_ID(), "program_bottom_overview", true);
										$accommo_overview = get_post_meta(get_the_ID(), "accommo_overview", true);
										$video = get_post_meta(get_the_ID(), "video", true);
										$video_image = get_post_meta(get_the_ID(), "video_image", true);
										$video_title = get_post_meta(get_the_ID(), "video_title", true);
										
										if($wording != ""){
									?>
									<span class="villa-description"><?php echo $wording ." | ";  ?></span>
									<?php }
										if($location != ""){
									?>
									<span class="villa-description"><?php echo $location;  ?></span><br/>
									<?php }
									
										if($rates){ ?>
										
											<span class="villa-price"><?php echo $rates; ?></span><br/>
										
										<?php }
										
										if($price_from != ""){
									?>
									<span class="villa-price"><?php echo "from $" .$price_from . " Per Night"; ?></span><br/>
										<?php } ?>
								</div>
							
							</div>
							<div class="vc_col-sm-3 wpb_column vc_column_container">
								<div class="booknow">
									<form action="<?php echo $home_url ?>/retreat-booking-enquiry" method="POST">
										<input type="hidden" name="post_id" value="<?php echo get_the_ID (); ?>">
										<input type="submit" class="qbutton" value="Booking Enquiry">
									</form>
								</div>
				
							</div>
						</div>	
					</div>	
				</div>	
				
			</div>
		</div>
		</div>
		<div class="full_width" style="margin-top: 10px;">
			<div class="full_width_inner">
				<div class="vc_row wpb_row section vc_row-fluid" style=" text-align:left;">
					<div class=" full_section_inner clearfix">
						<div class="vc_col-sm-12 wpb_column vc_column_container ">
							<div class="wpb_wrapper">
							<?php if(($sidebar == "default")||($sidebar == "")) : ?>
							  <?php	
									$acc_class = "";
									$css_class = "";	
									$style_class = "";	
									$interval = "";
									$element = "";
									$title = "";
									$award_frame = "";
									$portfolio_text_follow = "";
									$package_view = "";
									$gallery = "";
									$output = "";
									$home_url = get_home_url();
									$first_slide_image = get_post_meta(get_the_ID(), "first_image", true);
									$second_slide_image = get_post_meta(get_the_ID(), "second_image", true);
									$third_slide_image = get_post_meta(get_the_ID(), "third_image", true);
									$fourth_slide_image = get_post_meta(get_the_ID(), "fourth_image", true);
									$fifth_slide_image = get_post_meta(get_the_ID(), "fifth_image", true);
									$sixth_slide_image = get_post_meta(get_the_ID(), "six_image", true);
									$seventh_slide_image = get_post_meta(get_the_ID(), "seven_image", true);
									$eighth_slide_image = get_post_meta(get_the_ID(), "eight_image", true);
									$first_slide_image_title = get_post_meta( get_the_ID(), 'first_image_title', true );
									$second_slide_image_title = get_post_meta( get_the_ID(), 'second_image_title', true );
									$third_slide_image_title = get_post_meta( get_the_ID(), 'third_image_title', true );
									$fourth_slide_image_title = get_post_meta( get_the_ID(), 'fourth_image_title', true );
									$fifth_slide_image_title = get_post_meta( get_the_ID(), 'fifth_image_title', true );
									$sixth_slide_image_title = get_post_meta( get_the_ID(), 'six_image_title', true );
									$seventh_slide_image_title = get_post_meta( get_the_ID(), 'seven_image_title', true );
									$eighth_slide_image_title = get_post_meta( get_the_ID(), 'eight_image_title', true );
									$first_thumb_title = get_post_meta(get_the_ID(), "first_thumb_title", true);
									$first_thumb_alt = get_post_meta(get_the_ID(), "first_image_thumb_alt", true);
									$second_thumb_title = get_post_meta(get_the_ID(), "second_thumb_title", true);
									$second_thumb_alt = get_post_meta(get_the_ID(), "second_image_thumb_alt", true);
									$third_thumb_title = get_post_meta(get_the_ID(), "third_thumb_title", true);
									$third_thumb_alt = get_post_meta(get_the_ID(), "third_image_thumb_alt", true);
									$fourth_thumb_title = get_post_meta(get_the_ID(), "fourth_thumb_title", true);
									$fourth_thumb_alt = get_post_meta(get_the_ID(), "fourth_image_thumb_alt", true);
									$fifth_thumb_title = get_post_meta(get_the_ID(), "fifth_thumb_title", true);
									$fifth_thumb_alt = get_post_meta(get_the_ID(), "fifth_image_thumb_alt", true);
									$sixth_thumb_title = get_post_meta(get_the_ID(), "six_thumb_title", true);
									$sixth_thumb_alt = get_post_meta(get_the_ID(), "six_image_thumb_alt", true);
									$seventh_thumb_title = get_post_meta(get_the_ID(), "seven_thumb_title", true);
									$seventh_thumb_alt = get_post_meta(get_the_ID(), "seven_image_thumb_alt", true);
									$eighth_thumb_title = get_post_meta(get_the_ID(), "eight_thumb_title", true);
									$eighth_thumb_alt = get_post_meta(get_the_ID(), "eight_image_thumb_alt", true);
									$ninth_thumb_title = get_post_meta(get_the_ID(), "nine_thumb_title", true);
									$nine_thumb_alt = get_post_meta(get_the_ID(), "nine_image_thumb_alt", true);
									$first_gallery_img = get_post_meta(get_the_ID(), "first_gallery_img", true);
									$second_gallery_img = get_post_meta(get_the_ID(), "second_gallery_img", true);
									$third_gallery_img = get_post_meta(get_the_ID(), "third_gallery_img", true);
									$fourth_gallery_img = get_post_meta(get_the_ID(), "fourth_gallery_img", true);
									$fifth_gallery_img = get_post_meta(get_the_ID(), "fifth_gallery_img", true);
									$six_gallery_imgs = get_post_meta(get_the_ID(), "six_gallery_img", true);
									$seven_gallery_img = get_post_meta(get_the_ID(), "seven_gallery_img", true);
									$eight_gallery_img = get_post_meta(get_the_ID(), "eight_gallery_img", true);
									$nine_gallery_img = get_post_meta(get_the_ID(), "nine_gallery_img", true);
									$gallery_link = get_post_meta(get_the_ID(), "gallery_link", true);
									
									include_once('image-title.php');
										
									$gallery .= '';
									$gallery .= '<div class="qode_image_gallery_no_space  highlight_active" style="opacity: 1;">';
									$gallery .= '<div style="height: 510px;" class="qode_image_gallery_holder">';
									
									$gallery .= '<ul style="background-color: rgb(255, 255, 255); width: 7683px;">';
									if($first_slide_image != ""){
										$gallery .= '<li alt="'. $slide_img_title_one .'" title="'. $slide_img_title_one .'" style="background:url('.$first_slide_image.'); background-size: cover; background-position: center center;"></li>';
									}
									if($second_slide_image != ""){
										$gallery .= '<li title="'. $slide_img_title_two .'" style="background:url('.$second_slide_image.'); background-size: cover; background-position: center center;"></li>';
									}
									if($third_slide_image != ""){
										$gallery .= '<li title="'. $slide_img_title_three .'" style="background:url('.$third_slide_image.'); background-size: cover; background-position: center center;"></li>';
									}
									if($fourth_slide_image != ""){
										$gallery .= '<li title="'. $slide_img_title_four .'" style="background:url('.$fourth_slide_image.'); background-size: cover; background-position: center center;"></li>';
									}
									if($fifth_slide_image != ""){
										$gallery .= '<li title="'. $slide_img_title_five .'" style="background:url('.$fifth_slide_image.'); background-size: cover; background-position: center center;"></li>';
									}
									if($sixth_slide_image != ""){
										$gallery .= '<li title="'. $slide_img_title_six .'" style="background:url('.$sixth_slide_image.'); background-size: cover; background-position: center center;"></li>';
									}
									if($seventh_slide_image != ""){
										$gallery .= '<li title="'. $slide_img_title_seven .'" style="background:url('.$seventh_slide_image.'); background-size: cover; background-position: center center;"></li>';
									}
									if($eighth_slide_image != ""){
										$gallery .= '<li title="'. $slide_img_title_eight .'" style="background:url('.$eighth_slide_image.'); background-size: cover; background-position: center center;"></li>';
									}
									$gallery .= '</ul>'; 
									
									$gallery .= '</div>';
									$gallery .= '<div class="controls">';
									$gallery .= '<a class="prev-slide" href="#">';
									$gallery .= '<span>';
									$gallery .= '<i class="fa fa-angle-left"></i>';
									$gallery .= '</span>';
									$gallery .= '</a>';
									$gallery .= '<a class="next-slide" href="#">';
									$gallery .= '<span>';
									$gallery .= '<i class="fa fa-angle-right"></i>';
									$gallery .= '</span>';
									$gallery .= '</a>';
									$gallery .= '</div>';
									$gallery .= '</div>';
									
									echo $gallery;
								?>
							</div>
							<?php if($gallery_link){ ?>
							<div class="view-gallery-btn">
									<?php $action_url = rtrim($gallery_link,"/"); 
										
									?>
									<form action="<?php echo $action_url ?>/" method="post">
										
										<input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
										<input type="submit" class="qbutton" value="VIEW GALLERY">
									</form>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container_inner default_template_holder">
			<?php 	
				
				if( $overview != "" ) {
					
					echo $overview;
				}
			?>
			<hr/>
			 			
			<div class="two_columns_75_25 clearfix portfolio_container">
				<div class="column1">
					<div class="column_inner">
						<div class="portfolio_single_text_holder">
						
						
						<?php	
						
						
							global $wpdb;
				
							$programs = $wpdb->get_results ( "SELECT * FROM wp_program Where post_id = " .$id );
							
							$accommodations = $wpdb->get_results ( "SELECT * FROM wp_accommodation Where post_id = " .$id );
							
							$awards = $wpdb->get_results ( "SELECT * FROM wp_award Where post_id = " .$id. " ORDER BY id DESC " );
							
							$count_awards = $wpdb->get_var ( "SELECT COUNT(*)  FROM wp_award WHERE post_id = " .$id );
						
							$output = $title = $interval = $el_class = $collapsible = $active_tab = $style = '';
								//
								   
								
								
								$vibe = get_post_meta(get_the_ID(), "vibe", true);
								if($vibe != ""){
									
									$output .= '<div class="villa-overview">';
									$output .= '<span class="detail-heading">The Vibe</span><br/>';
									$output .= get_post_meta(get_the_ID(), "vibe", true);
									
									$output .= '</div>';
								}
								if($first_gallery_img != ""){
								$first_gallery_img = get_post_meta(get_the_ID(), "first_gallery_img", true);
								$second_gallery_img = get_post_meta(get_the_ID(), "second_gallery_img", true);
								$third_gallery_img = get_post_meta(get_the_ID(), "third_gallery_img", true);
									$output .= '<div class="images-gallery">';
									$output .= '<div class="gallery_holder">';
									$output .= '<ul class="gallery_inner v3">';
								if($first_gallery_img != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "first_gallery_img", true) . '" class="prettyphoto" title="'.$first_thumb_title.'" style="background:url('.$first_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
								if($second_gallery_img != ""){
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "second_gallery_img", true) . '"  class="prettyphoto" title="'.$second_thumb_title.'" style="background:url('.$second_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									$output .= '</li>';
								}
								if($third_gallery_img != ""){
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "third_gallery_img", true) . '" class="prettyphoto" title="'.$third_thumb_title.'" style="background:url('.$third_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									$output .= '</li>';
								}
									$output .= '</ul>';
									$output .= '</div>';
									$output .= '</div>';
								}
								if($programs != ""){
								
								$output .= '<div class="retreat-programs">';
								$output .= '<h2 class="detail-heading">Retreat Programmes</h2><br>';
								if($program_overview != ""){
									$output .= '<div class="program-overview">'.$program_overview.'</div>';
								}
								
								foreach( $programs as $program ){
								$program_id = $program->id;
								$program_desc = $program->program_desc;
								$position = 130;
								$program_desc_half = substr($program_desc, 0, $position);
								$output .= '<div class="vc_col-sm-12 not-padding program-seprater" style="padding-top: 10px;">';
								$output .= '<div class="program-image program-detail" id="'.$program_id.'" style="cursor:pointer; background: url('.$program->program_image.')"><div class="program-title-image" id="'.$program_id.'_program-image" ><h5>'. $program->program_title .'</h5></div></div>';
								$output .= '<div id="package-detail" class="'.$program_id.'_readMore" style="display: none;">';
								$output .= '<div class="package-container">';
								$nights = $wpdb->get_results ( "SELECT * FROM wp_night Where post_id = " .$id ." and program_id = " .$program_id ." ORDER BY CAST(night_title AS UNSIGNED) ASC" );
								$count_night = $wpdb->get_var ( "SELECT COUNT(*)  FROM wp_night WHERE post_id = " .$id." and program_id = " .$program_id );
								if($count_night == 0){
									$package_view = 'package-view';
								}
								if($nights != ""){
									
									$output .= "\n\t".'<div class="'.$css_class.'" data-interval="'.$interval.'">';
									$output .= "\n\t\t".'<div class="q_tabs boxed ' . $style_class . '" style="visibility: visible;;">';
									$output .= wpb_widget_title(array('title' => $title, 'extraclass' => $element.'_heading'));
									
									$output .= "\n\t\t\t".'<ul class="tabs-nav">';
									$output .= '<li><a href="#program-overview">Overview</a></li>';
									foreach ( $nights as $night ){
									$night_title = $night->night_title;
									$night_with_dashes = str_replace(' ','-',$night_title);
									$output .= '<li><a href="#'. $night_with_dashes .'">'. $night_title .'</a></li>';
									}
									$output .= "\n\t\t\t".'</ul>';
									$output .= "<div class='tabs-container'>";
									$css_class =  "tab-content";
									$output .= "\n\t\t\t" . '<div id="program-overview" class="'.$css_class.' '.$package_view.'">';
									$output .= '<div class="program-desc">'.$program_desc.'</div>';
									$output .= '<div class="program-inclusion"><div class="subtitle-space">'.$program->program_inclusion.'</div></div>';
									if($program->rate != ""){
										$output .= '<div class="package-rates"><div class="program-rate-info">'.$program->rate.'</div></div>';
									}
									$output .= '<div class="night-condition"><div class="custom-btn">';
									$output .= '<div class="booknow">';
									$output .= '<form action="'.$home_url.'/retreat-booking-enquiry/" method="POST">';
									$output .= '<input type="hidden" name="post_id" value="'. get_the_ID () .'">';
									$output .= '<input type="hidden" name="title" value="'. $program->program_title .'">';
									$output .= '<input type="submit" class="qbutton program-booking-btn" value="Booking Enquiry">';
									$output .= '</form>';
									$output .= '</div>';
									$output .= '</div>';
									$output .= '</div>';
									$output .= '</div>';
									foreach ( $nights as $night ){
									$night_title = $night->night_title;
									$night_with_dashes = str_replace(' ','-',$night_title);
									$output .= "\n\t\t\t" . '<div id="'. $night_with_dashes .'" class="'.$css_class.' night-tab">'. $night->night_content .'<div class="night-condition">';
									$output .= '<div class="custom-btn">';
									$output .= '<div class="booknow">';
									$output .= '<form action="'.$home_url.'/retreat-booking-enquiry/" method="POST">';
									$output .= '<input type="hidden" name="post_id" value="'. get_the_ID () .'">';
									$output .= '<input type="hidden" name="title" value="'. $program->program_title .'">';
									$output .= '<input type="submit" class="qbutton program-booking-btn" value="Booking Enquiry">';
									$output .= '</form>';
									$output .= '</div>';
									$output .= '</div>';
									$output .= '</div></div>';
									}
									
									$output .= "</div>";
									if ( 'vc_tour' == null) {
										$output .= "\n\t\t\t" . '<div class="wpb_tour_next_prev_nav clearfix"> <span class="wpb_prev_slide"><a href="#prev" title="'.__('Previous slide', 'js_composer').'">'.__('Previous slide', 'js_composer').'</a></span> <span class="wpb_next_slide"><a href="#next" title="'.__('Next slide', 'js_composer').'">'.__('Next slide', 'js_composer').'</a></span></div>';
									}
									$output .= "\n\t\t".'</div> ';
									$output .= "\n\t".'</div> ';
									
								}
								
								$output .= "\n\t\t\t" . '</div></div></div>';
								}
								
								$output .= "\n\t".'</div>';
								$output .= '<hr class="hr-style">';
								}
								
								$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'q_accordion_holder clearfix wpb_content_element '. $acc_class ." " . $el_class.' not-column-inherit');
								
								
								$accommodation = get_post_meta(get_the_ID(), "accommodation", true);
								if($accommodation != ""){	
								$output .= '<div class="accommodation">';
								$output .= '<h3 class="detail-heading">Accommodation</h3><br>';
								$output .= get_post_meta(get_the_ID(), "accommodation", true);
								$output .= "\n\t".'</div>';
								}
								if($accommodations != ""){
									$output .= '<div class="accommodation-package">';
									foreach($accommodations as $accommo){
										$output .= '<div class="accommodation-info-box">';
										$output .= '<div class="accommodation-title" id="'. $accommo->id .'"><strong>'. $accommo->accommo_title .'</strong></div>';
										$output .= '<div class="accommodation-content '. $accommo->id .'_read-more " style="display:none">';
										$output .= '<div class="row accommo-pack"><div class="vc_col-sm-6">';
										$output .= '<div class="accommo-gallery"><div class="flexslider2 flexslider_'.$accommo->id.'_f"><ul class="slides">';
										if($accommo->accommo_image != ""){
											$output .= '<li><img src="'. $accommo->accommo_image .'"/></li>';
										}
										if($accommo->accommo_image_second != ""){
											$output .= '<li><img src="'. $accommo->accommo_image_second .'"/></li>';
										}	
										if($accommo->accommo_image_third != ""){
											$output .= '<li><img src="'. $accommo->accommo_image_third .'"/></li>';
										}
										if($accommo->accommo_image_fourth != ""){
											$output .= '<li><img src="'. $accommo->accommo_image_fourth .'"/></li>';
										}
										if($accommo->accommo_image_fifth != ""){
											$output .= '<li><img src="'. $accommo->accommo_image_fifth .'"/></li>';
										}
										$output .= '</ul></div></div></div>';
										$output .= '<div class="vc_col-sm-6">'. $accommo->accommo_desc .'</div></div>';
										$output .= '</div>';
										$output .= '</div>';
									}
									$output .= '</div>';
								}
								$output .='<hr>';
								$facilities = get_post_meta(get_the_ID(), "facilities", true);
								if($facilities != ""){
									$output .= '<div class="retreat-spa">';
									$output .= '<h3 class="detail-heading">Facilities</h3><br>';
									$output .= get_post_meta(get_the_ID(), "facilities", true);
									
									$output .= '</div>';
									
								}
								if($fourth_gallery_img != ""){	
								$output .= '<div class="images-gallery">';
								$output .= '<div class="gallery_holder">';
								$output .= '<ul class="gallery_inner v3">';
								if($fourth_gallery_img != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "fourth_gallery_img", true) . '" class="prettyphoto" title="'.$thumb_title_four.'" style="background:url('.$fourth_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
								if($fifth_gallery_img != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "fifth_gallery_img", true) . '" class="prettyphoto" title="'.$thumb_title_five.'" style="background:url('.$fifth_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
								if($six_gallery_imgs != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "six_gallery_img", true) . '" class="prettyphoto" title="'.$thumb_title_six.'" style="background:url('.$six_gallery_imgs.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
									$output .= '</ul>';
									$output .= '</div>';
									$output .= '</div>';
								}
								
								
								$spa = get_post_meta(get_the_ID(), "spa", true);
								if($spa != ""){
									$output .= '<div class="retreat-spa">';
									$output .= '<h3 class="detail-heading">Spa</h3><br>';
									$output .= get_post_meta(get_the_ID(), "spa", true);
									
									$output .= '</div>';
									$output .= '<hr/>';
								}
								
								$cuisine = get_post_meta(get_the_ID(), "cuisine", true);
								if($cuisine != ""){
									$output .= '<div class="retreat-cuisine">';
									$output .= '<h3 class="detail-heading">Cuisine</h3><br>';
									$output .= get_post_meta(get_the_ID(), "cuisine", true);
									
									$output .= '</div>';
									
								}
								if($seven_gallery_img != ""){
								$output .= '<div class="images-gallery">';
									$output .= '<div class="gallery_holder">';
									$output .= '<ul class="gallery_inner v3">';
								if($seven_gallery_img != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "seven_gallery_img", true) . '" class="prettyphoto" title="'.$thumb_title_seven.'" style="background:url('.$seven_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
								if($eight_gallery_img != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "eight_gallery_img", true) . '" class="prettyphoto" title="'.$thumb_title_eight.'" style="background:url('.$eight_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
								if($nine_gallery_img != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "nine_gallery_img", true) . '" class="prettyphoto" title="'.$thumb_title_nine.'" style="background:url('.$nine_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
									$output .= '</ul>';
									$output .= '</div>';
									$output .= '</div>';
								}
								$activities = get_post_meta(get_the_ID(), "activities", true);
								if($activities != ""){
									$output .= '<div class="retreat-activities">';
									$output .= '<h3 class="detail-heading">Activities</h3><br>';
									$output .= get_post_meta(get_the_ID(), "activities", true);
									
									$output .= '</div>';
									$output .= '<hr/>';
								}
								
								if($video != ""){
								$output .= '<div class="vc_col-sm-12 not-padding">';
								$output .= '<span class="detail-heading" onclick="videoPopUpShow()">Video & Awards</span><br>';
								$output .= '<div class="vc_col-sm-6 not-padding">';
								$output .= '<img height="350" src="'.$video_image.'" onclick="videoPopUpShow()" style="cursor:pointer" />';
								$output .= '<div class="video-title" style="cursor:pointer" onclick="videoPopUpShow()">'.$video_title.'</div>';
								$output .= '</div>';
								$output .= '<div class="vc_col-sm-6">';
								if($count_awards>=3){ $award_frame = 'award-frame'; }
								$output .= '<div class="all-awards '.$award_frame.'">';
								foreach ($awards as $award){
									$output .= '<div class="awards">';
									$output .= '<div class="awards-content"><span class="vc_col-sm-1"><i class="fa fa-star review-star"></i></span><div class="award-text vc_col-sm-10">'.$award->award_title.'</div><div class="award-content vc_col-sm-10">'.$award->award_content.'</div></div>';
									$output .= '</div>';
								}
								$output .= '</div>';
								$output .= '</div>';
								$output .= '</div>';
								}
								$output .= '<hr/>';
								$quick_facts = get_post_meta(get_the_ID(), "quick_facts", true);
								if($quick_facts != ""){
									$output .= '<div class="retreat-quick-facts">';
									$output .= '<h3 class="detail-heading">Quick Facts</h3><br>';
									$output .= get_post_meta(get_the_ID(), "quick_facts", true);
									
									$output .= '</div>';
									$output .= '<hr/>';
								}
								$location_description = get_post_meta(get_the_ID(), "location_description", true);
								if($location_description != ""){
									$output .= '<div class="map-location">';
									$output .= '<h3 class="detail-heading">Location</h3><br/>';
									$output .= get_post_meta(get_the_ID(), "location_description", true);
									$output .= '</div><br/>';
								}
								$_address = get_post_meta(get_the_ID(), "address", true);
								if($_address != ""){
									$output .= '<div class="map-location">';
									
									$output .= "\n\t\t\t" . '<div id="map_retreat" style="width: 100%; height: 320px;"></div>';
									
									$output .= '</div>';
								}
								
								echo $output;
							?>
							
						</div>
						<!-- REVIEWS SECTION-->
							<?php include_once('reviews.php'); ?>
						<!-- /REVIEWS SECTION-->
					</div>
				</div>
				
				<div class="column2">
					<div class="column_inner">
						<div id="sidebar-custom" class="portfolio_detail <?php echo $portfolio_text_follow; ?>">
							<?php
							$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
							if ($portfolios){
								usort($portfolios, "comparePortfolioOptions");
								foreach($portfolios as $portfolio){
								  ?>
									<div class="info portfolio_custom_field">
										<?php if($portfolio['optionLabel'] != ""): ?>
											<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
										<?php endif; ?>
										<p>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</p>
									</div>
								  <?php
								}
							}
							?>
							<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
								<div class="info portfolio_custom_date">
									<h6><?php _e('Date','qode'); ?></h6>
									<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>
								</div>
							<?php endif; ?>
							<?php
							$terms = wp_get_post_terms(get_the_ID(),'retreat_category');
							$counter = 0;
							$all = count($terms);
							if($all > 0){
								?>
								<div class="info portfolio_categories">
									<h6><?php _e('Category ','qode'); ?></h6>
										<span class="category">
										 
										</span>
								</div>
								
									  <?php 
									}
									$ret_categories = get_the_term_list( get_the_ID(), 'retreat_category');
									if($ret_categories){ ?>
									<div class="categories">
									<?php
										echo $ret_categories; ?>
										</div>
									<?php
									}
								?>
								
							<?php
							$portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

							if(is_array($portfolio_tags) && count($portfolio_tags)) {
								foreach ($portfolio_tags as $portfolio_tag) {
									$portfolio_tags_array[] = $portfolio_tag->name;
								}
								?>
								<div class="info portfolio_tags">
									<h6><?php _e('Tags', 'qode') ?></h6>
									<span class="category">
										
									</span>
								</div>

							  <?php 
							} ?>
							
							<div class="pricing-sidebar">
								<h6>Rates</h6>
								<table style="width:100%; margin-top: 10px;">
									<?php if($rates != ""){ ?>
										<tr>
											<td class="highlight-g"><span><?php echo $rates; ?></span></td>
										</tr>
									<?php } ?>
									<tr>
										<?php 
											$low_season = get_post_meta(get_the_ID(), "low_season", true);
											$high_season = get_post_meta(get_the_ID(), "high_season", true);
											$peak_season = get_post_meta(get_the_ID(), "peak_season", true);

										?>
									<?php if($low_season != "") { ?>
										<td class="highlight-g">Low Season</td>
										<td>US$ <?php echo get_post_meta(get_the_ID(), "low_season", true); ?></td>
									<?php } ?>
									</tr>
									<tr>
									<?php if($low_season != "") { ?>
										<td class="highlight-g">High Season</td>
										<td>US$ <?php echo get_post_meta(get_the_ID(), "high_season", true); ?></td>
									<?php } ?>
									</tr>
									<tr>
									<?php if($low_season != "") { ?>
										<td class="highlight-g">Peak Season</td>
										<td>US$ <?php echo get_post_meta(get_the_ID(), "peak_season", true) ?></td>
									<?php } ?>
									</tr>
								</table>
							</div>
							
							<div class="review-sidebar">
								<h6>Reviews</h6>
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
									</span><span class="review-btn"><p id="reviews"> ( <?php echo $counts; ?> Reviews )</p></span>
								</div>
							</div>
							<?php
								$availability_link = get_post_meta(get_the_ID(), "availability", true);
								if($availability_link != ""){
									$calendar .= '<div class="avalablity-calendar">';
									
									$calendar .= '<button class="calendar-sidebar qbutton" onclick="showIframe2()">Availability Calendar</button>';
									$calendar .= '<iframe id="iframe2" width="100%" height="300" style="display:none;" src='."$availability_link".'></iframe>';
									
									$calendar .= '</div>'; 
									
									echo $calendar;
								}
							?>
							
							<div class="booknow-sidebar">
									<form action="<?php echo $home_url ?>/retreat-booking-enquiry" method="POST">
										<input type="hidden" name="post_id" value="<?php echo get_the_id(); ?>">
										<input type="submit" class="qbutton" value="Booking Enquiry">
									</form>
									
							</div>
							
							<div class="inquire-sidebar">
									<form action="<?php echo $home_url ?>/contact/" method="POST">
										
										<input type="submit" class="qbutton" value="Ask a Question">
									</form>
							</div>
							
							<div class="call-sidebar"><!--<span>Speak to a Specialist: +555 786 67 987</span>--></div>
							<div class="portfolio_social_holder">
								
								<img src="<?php echo $home_url ?>/wp-content/themes/bridge-child/img/el_prod_share.gif" alt="" />
								<a href="http://www.facebook.com/share.php?u=<?php echo get_permalink(); ?>&title=<?php echo get_the_title(); ?>" onclick="window.open() title="Share this" target=" _blank"><span class="social"><i class="fa fa-facebook"></i></span></a>
								<a href="http://twitter.com/home?status=<?php echo get_the_title(); ?>+<?php echo get_permalink(); ?>" title="Tweet this" target=" _blank"><span class="social"><i class="fa fa-twitter"></i></span></a>
								<a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" title="Share this" target=" _blank"><span class="social"><i class="fa fa-google-plus"></i></span></a>
								<a href="http://pinterest.com/pin/create/bookmarklet/?media=&url=<?php echo get_permalink(); ?>&is_video=false&description=<?php echo get_the_title(); ?>" title="Pin this" target=" _blank"><span class="social"><i class="fa fa-pinterest"></i></span></a>
								
							</div>
							
						</div>
					</div>
				</div>
				
				
			</div>
			
			<?php include_once('related-retreats.php'); ?>
			<div class="portfolio_navigation">
				<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?></div>
				<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
					<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
				<?php } ?>
				<div class="portfolio_next"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>'); ?></div>
			</div>
			  <?php elseif($sidebar == "1" || $sidebar == "2"): ?>
			    <?php if($sidebar == "1") : ?>	
				<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
					<div class="column1">
					  <?php elseif($sidebar == "2") : ?>	
						<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
							<div class="column1">
								  <?php endif; ?>
							
									<div class="column_inner">
										<div class="blog_holder blog_single">	
											<?php 
												get_template_part('templates/blog_single', 'loop');
											?>
										</div>
										
										<?php
											if($blog_hide_comments != "yes"){
												comments_template('', true); 
											}else{
												echo "<br/><br/>";
											}
										?> 
									</div>
								</div>	
							<div class="column2"> 
								<?php get_sidebar(); ?>
							</div>
						</div>
						<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
							<?php if($sidebar == "3") : ?>	
						<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
							<div class="column1"> 
								<?php get_sidebar(); ?>
							</div>
							<div class="column2">
									<?php elseif($sidebar == "4") : ?>	
										<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
											<div class="column1"> 
												<?php get_sidebar(); ?>
											</div>
											<div class="column2">
									<?php endif; ?>
									
												<div class="column_inner">
													<div class="blog_holder blog_single">	
														<?php 
															get_template_part('templates/blog_single', 'loop');
															
														?>
													</div>
													<?php

														if($blog_hide_comments != "yes"){
															comments_template('', true); 
														}else{
															echo "<br/><br/>";
														}
														
														
													?> 
												</div>
											</div>	
											
										</div>
										
										
										
								<?php endif; ?>
								
								<div id="videoPop" style="border:1px solid #e2e2e2; display:none;">
											<div class="video-popup-content">
											<iframe id="videoframe" width="100%" height="600" src="<?php echo $video ?>" frameborder="0" allowfullscreen="true" allowscriptaccess="always"></iframe>
											<span onclick="videoPopUpHide()" class="close_popup">&times;</span>
											</div>
										</div>
								
								<script type="text/javascript"> 
								
								
								jQuery(function(){
								
									 retreatMapInitialize();
									 jQuery('header').removeClass('archive-page-header single-magazine-page-header');
									//jQuery('.tblrates tr:odd').addClass('odd');

									// for even

									//jQuery('.tblrates tr:even').addClass('even');
								 
									jQuery('table.tblrates').each(function(){
									   //alert($(this).children('tbody').children(':odd').length)
									   $rowCount = jQuery(this).find('tr').length;
										if($rowCount %2 != 0){
											jQuery(this).children('tbody').children(':even').addClass('alt');
										}else{
											jQuery(this).children('tbody').children(':odd').addClass('alt');
										}
									});
								 
									jQuery('.package-container table:first-of-type').addClass('stuff-table');
									
									jQuery("#reviews").click(function() {
										jQuery('html, body').animate({
											scrollTop: jQuery("#review-section").offset().top
										}, 200);
									});
									jQuery('.close_popup').click(function(){
										
										var video = jQuery("#videoframe").attr("src");
										jQuery("#videoframe").attr("src","");
										jQuery("#videoframe").attr("src",video);
										
										
									});
								});
								jQuery(".program-detail").click(function () {
									
									
									
									program_id = jQuery(this).attr("id");
									jQuery("."+program_id+"_readMore").toggle();
									if( jQuery("."+program_id+"_readMore").is(':visible')){
										jQuery("#"+program_id+"_program-image").addClass('program-active');
									}else{
										jQuery("#"+program_id+"_program-image").removeClass('program-active');
									}
								});
								jQuery(".accommodation-title").click(function () {
									jQuery('a.flex-next').parent('li').addClass('float-right');
									accommo_id = jQuery(this).attr("id");
									jQuery("."+accommo_id+"_read-more").toggle();
									
									jQuery('.flexslider_'+accommo_id+"_f").flexslider({
									animation: "slide",
									controlNav: "thumbnails"
								  });
									
								});
								
								jQuery(document).ajaxSuccess(function() {
								  retreatMapInitialize();
								});
							window.onload = retreatMapInitialize();
							function retreatMapInitialize() {
							var map;
							var address = '<?php echo $_address; ?>';
							var post_image = '<?php  the_post_thumbnail(); ?>';
							var price = '<?php echo " from US $". $price_from . " per night"; ?>';
							var bounds = new google.maps.LatLngBounds();
							var mapOptions = {
								scrollwheel: false,
								mapTypeId: 'roadmap'
							};
											
							// Display a map on the page
							map = new google.maps.Map(document.getElementById("map_retreat"), mapOptions);
							map.setTilt(45);
								
							// Multiple Markers
							var markers = [
									['<?php the_title(); ?>',<?php echo $latitude ?>, <?php echo $longitude ?>, 'http://www.hinolincolnshire.co.uk/wp-content/uploads/2015/07/pin_large.png'],<?php echo $locations; ?>  
								];
								
								 
												
							// Info Window Content
							var infoWindowContent = [
								['<div class="info_content"><div class="map-thumb" style="width:125px; height: 80px; overflow: hidden;">' + post_image +
								'</div><p><b><?php the_title(); ?></b></p>' +
								'<p>' + address + '</p><p><strong>' +  price + '</strong></p></div>'],
								<?php echo $infos; ?>
							];
								
							// Display multiple markers on a map
							var infoWindow = new google.maps.InfoWindow(), marker, i;
							
							// Loop through our array of markers & place each one on the map  
							for( i = 0; i < markers.length; i++ ) {
								var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
								bounds.extend(position);
								marker = new google.maps.Marker({
									position: position,
									map: map,
									icon:  markers[i][3],	
									title: markers[i][0]
								});
								
								// Allow each marker to have an info window    
								google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
									return function() {
										infoWindow.setContent(infoWindowContent[i][0]);
										infoWindow.open(map, marker);
									}
								})(marker, i));

								// Automatically center the map fitting all markers on the screen
								map.fitBounds(bounds);
							}

							// Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
							var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
								this.setZoom(10);
								google.maps.event.removeListener(boundsListener);
							});
							
						}

						google.maps.event.addDomListener(window, 'load', retreatMapInitialize);


							function showIframe(){
								var iframe = document.getElementById("iframe1");  
								iframe.style.display = (iframe.style.display == "none") ? "block" : "none"; 
							}
							function showIframe2(){
								
								var calendar = document.getElementById("calendar"); 
									
								calendar.style.display = (calendar.style.display == "none") ? "block" : "none"; 
								
							}
							
							jQuery('#btnCalendar').live('click', function(event) {        
									jQuery('.show-hide').toggle('hide');
								});
							
							
							
							jQuery('.show-all').click(function() {
								jQuery('.retreat-programs .accordion .ui-accordion-header:not(.ui-state-active)').next().slideToggle();
								jQuery(this).text(jQuery(this).text() == 'Expand all' ? 'Collapse all' : 'Expand all');
								
								jQuery(this).toggleClass('collapse');
								return false;
							});
							
							
							//Function To Display Popup
							function videoPopUpShow() {
							
								document.getElementById('videoPop').style.display = "block";

							} 
							function videoPopUpHide(){
								document.getElementById('videoPop').style.display = "none";
							}
							
						</script>
						
						
							</div>
						</div>

						
					</div>
					
				</div>
		</div>	



	

<?php endwhile; ?>
<?php endif; ?>	

<?php get_footer('single'); ?>	
