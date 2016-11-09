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
	  
	<div class="container"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
	<div class="title-row">
		<div class="container_inner default_template_holder">
			<div class="wpb_row section vc_row-fluid" style=" text-align:left;">
				<div class=" full_section_inner clearfix">
					<div class="vc_span12 wpb_column column_container ">
						<div class="wpb_wrapper">
							<div class="vc_col-sm-9 wpb_column vc_column_container">
								<div class="villa-info">
									<h1 class="capitalize light-weight"><?php the_title(); ?></h1>
									<?php  
										$css_class = "";	
										$style_class = "";	
										$interval = "";
										$element = "";
										$title = "";
										$award_frame = "";
										$portfolio_text_follow = "";
										$home_url = get_home_url();
										$price_from = get_post_meta(get_the_ID(), "price_from", true);
										$price_to = get_post_meta(get_the_ID(), "price_to", true);
										$rates = get_post_meta(get_the_ID(), "rates", true);
										$location = get_post_meta(get_the_ID(), "address", true);
										$bedroom = get_post_meta(get_the_ID(), "bedrooms", true);
										$bathroom = get_post_meta(get_the_ID(), "bathrooms", true);
										$private_pool = get_post_meta(get_the_ID(), "private_pool_villa", true);
										$short_desc = get_post_meta(get_the_ID(), "short_text", true);
										$beachfront = get_post_meta(get_the_ID(), "beachfront", true);
										$gallery_link = get_post_meta(get_the_ID(), "gallery", true);
										$overview = get_post_meta(get_the_ID(), "overview", true);
										$latitude = get_post_meta(get_the_ID(), "latitude", true);
										$longitude = get_post_meta(get_the_ID(), "longitude", true);
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
										$nine_thumb_title = get_post_meta(get_the_ID(), "nine_thumb_title", true);
										$nine_thumb_alt = get_post_meta(get_the_ID(), "nine_image_thumb_alt", true);
										$video = get_post_meta(get_the_ID(), "video", true);
										$video_image = get_post_meta(get_the_ID(), "video_image", true);
										$video_title = get_post_meta(get_the_ID(), "video_title", true);
										$package_overview = get_post_meta(get_the_ID(), "package_overview", true);
										$wording = get_post_meta(get_the_ID(), "wording", true);
									?>
									<span class="villa-description"><?php echo $bedroom; ?>
									<?php if( $beachfront != ""){ echo     " | " . $beachfront;} 
									if($wording != ""){
									?>
									<span class="villa-description"><?php echo $wording ." | ";  ?></span>
									<?php }
									
									if( $location != ""){ echo      $location;} ?></span><br/>
									<?php
									if($rates){ ?>
										
											<span class="villa-price"><?php echo $rates; ?></span><br/>
										
										<?php } ?>
									
									<?php if($price_from != ""){ ?>
									<span class="villa-price"><?php echo "from $" .$price_from . " per night"; ?></span><br/>
									<?php } ?>
								</div>
							
							</div>
							<div class="vc_col-sm-3 wpb_column vc_column_container">
								<div class="booknow">
									<form action="<?php echo $home_url ?>/yacht-booking-enquiry" method="POST">
										<input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
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
					$six_slide_image_title = get_post_meta( get_the_ID(), 'six_image_title', true );
					$seven_slide_image_title = get_post_meta( get_the_ID(), 'seven_image_title', true );
					$eight_slide_image_title = get_post_meta( get_the_ID(), 'eight_image_title', true );
					
					$gallery = '';
					$gallery .= '<div class="qode_image_gallery_no_space  highlight_active" style="opacity: 1;">';
					$gallery .= '<div style="height: 510px;" class="qode_image_gallery_holder">';
					
					$gallery .= '<ul style="background-color: rgb(255, 255, 255); width: 7683px;">';
					if($first_slide_image != ""){
						$gallery .= '<li title="'. $first_slide_image_title .'" style="background:url('.$first_slide_image.'); background-size: cover; background-position: center center;"></li>';
					}
					if($second_slide_image != ""){
						$gallery .= '<li title="'. $second_slide_image_title .'" style="background:url('.$second_slide_image.'); background-size: cover; background-position: center center;"></li>';
					}
					if($third_slide_image != ""){
						$gallery .= '<li title="'. $third_slide_image_title .'" style="background:url('.$third_slide_image.'); background-size: cover; background-position: center center;"></li>';
					}
					if($fourth_slide_image != ""){
						$gallery .= '<li title="'. $fourth_slide_image_title .'" style="background:url('.$fourth_slide_image.'); background-size: cover; background-position: center center;"></li>';
					}
					if($fifth_slide_image != ""){
						$gallery .= '<li title="'. $fifth_slide_image_title .'" style="background:url('.$fifth_slide_image.'); background-size: cover; background-position: center center;"></li>';
					}
					if($sixth_slide_image != ""){
						$gallery .= '<li title="'. $six_slide_image_title .'" style="background:url('.$sixth_slide_image.'); background-size: cover; background-position: center center;"></li>';
					}
					if($seventh_slide_image != ""){
						$gallery .= '<li title="'. $seven_slide_image_title .'" style="background:url('.$seventh_slide_image.'); background-size: cover; background-position: center center;"></li>';
					}
					if($eighth_slide_image != ""){
						$gallery .= '<li title="'. $eight_slide_image_title .'" style="background:url('.$eighth_slide_image.'); background-size: cover; background-position: center center;"></li>';
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
							$count_programs = $wpdb->get_var ( "SELECT * FROM wp_program Where post_id = " .$id );
							
							$awards = $wpdb->get_results ( "SELECT * FROM wp_award Where post_id = " .$id. " ORDER BY id DESC " );
							
							$count_awards = $wpdb->get_var ( "SELECT COUNT(*)  FROM wp_award WHERE post_id = " .$id );
							$cabins = $wpdb->get_results ( "SELECT * FROM wp_cabin Where post_id = " .$id );
								$output = '';
								
								$vibe = get_post_meta(get_the_ID(), "vibe", true);
								if($vibe != ""){
									
									$output .= '<div class="villa-overview">';
									$output .= '<span class="detail-heading">On Board</span><br/>';
									$output .= get_post_meta(get_the_ID(), "vibe", true);
									
									$output .= '</div>';
								}
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
								
								/*
								*   Overview Section
								*/
								$layout = get_post_meta(get_the_ID(), "layout", true);
								if($layout != ""){
									$output .= '<div class="villa-layout">';
									$output .= '<span class="detail-heading">The Layout</span><br/>';
									$output .= get_post_meta(get_the_ID(), "layout", true);
									
									$output .= '</div>';
								}
								
								if($count_programs > 0){
								/* $output .= '<hr class="program-hr">'; */
								$output .= '<div class="retreat-programs">';
								$output .= '<h2 class="detail-heading">Cruise Packages</h2><br>';
								if($package_overview != ""){
									$output .= '<div class="program-overview">'.$package_overview.'</div>';
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
								$zero = 0;
								if($count_night == $zero){
									$package_view = 'package-view';
								}else{
									$package_view = '';
								}
								if($nights != ""){
									
									$output .= "\n\t".'<div data="'.$count_night.'" class="'.$css_class.'" data-interval="'.$interval.'">';
									$output .= "\n\t\t".'<div class="q_tabs boxed ' . $style_class . '" style="visibility: visible;;">';
									$output .= wpb_widget_title(array('title' => $title, 'extraclass' => $element.'_heading'));
									
									$output .= "\n\t\t\t".'<ul class="tabs-nav">';
									$output .= '<li><a href="#program-overview">Overview</a></li>';
									foreach ( $nights as $night ){
									$night_title = "";
									$night_title = $night->night_title;
									$and = "";
									$and = '&';
									if (strpos($night_title, $and) !== false) {
										$night_tab = str_replace("&","and",$night_title);
									}else{
										$night_tab = $night_title;
									}
									$night_with_dashes = str_replace(' ','-',$night_tab);
									$output .= '<li><a href="#'. $night_with_dashes .'">'. $night_title .'</a></li>';
									
									}
									
									$output .= "\n\t\t\t".'</ul>';
									$output .= "<div class='tabs-container'>";
									$css_class =  "tab-content";
									$output .= "\n\t\t\t" . '<div id="program-overview" class="'.$css_class.' '.$package_view.'">';
									$output .= '<div class="program-desc package-desc">'.$program_desc.'</div>';
									$output .= '<div class="program-inclusion"><div class="subtitle-space">'.$program->program_inclusion.'</div></div>';
									if($program->rate != ""){
										$output .= '<div class="package-rates"><div class="program-rate-info">'.$program->rate.'</div></div>';
									}
									$output .= '<div class="night-condition"><div class="custom-btn">';
									$output .= '<div class="booknow">';
									$output .= '<form action="'.$home_url.'/yacht-booking-enquiry/" method="POST">';
									$output .= '<input type="hidden" name="post_id" value="'. get_the_ID () .'">';
									$output .= '<input type="hidden" name="title" value="'. $program->program_title .'">';
									$output .= '<input type="submit" class="qbutton program-booking-btn" value="Booking Enquiry">';
									$output .= '</form>';
									$output .= '</div>';
									$output .= '</div>';
									$output .= '</div>';
									$output .= '</div>';
									foreach ( $nights as $night ){
									$night_title = "";
									$night_title = $night->night_title;
									$and = "";
									$and = '&';
									if (strpos($night_title, $and) !== false) {
										$night_tab = str_replace("&","and",$night_title);
									}else{
										$night_tab = $night_title;
									}
									$night_with_dashes = str_replace(' ','-',$night_tab);
									$output .= "\n\t\t\t" . '<div id="'. $night_with_dashes .'" class="'.$css_class.'">'. $night->night_content .'<div class="night-condition">';
									$output .= '<div class="custom-btn">';
									$output .= '<div class="booknow">';
									$output .= '<form action="'.$home_url.'/yacht-booking-enquiry/" method="POST">';
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
								/* $output .= '<hr class="hr-style">'; */
								}
								
								$cabin_overview = get_post_meta(get_the_ID(), "cabin_overview", true);
								if($cabin_overview != ""){	
								$output .= '<div class="cabin">';
								$output .= '<h3 class="detail-heading">Cabins</h3><br>';
								$output .= get_post_meta(get_the_ID(), "cabin_overview", true);
								$output .= "\n\t".'</div>';
								}
								if($cabins != ""){
									$output .= '<div class="cabin-package">';
									foreach($cabins as $cabin){
										$output .= '<div class="cabin-info-box">';
										$output .= '<div class="cabin-title" id="'. $cabin->id .'"><strong>'. $cabin->cabin_title .'</strong></div>';
										$output .= '<div class="cabin-content '. $cabin->id .'_read-more " style="display:none">';
										$output .= '<div class="row cabin-pack"><div class="vc_col-sm-6">';
										$output .= '<div class="cabin-gallery"><div class="flexslider2 flexslider_'.$cabin->id.'_f"><ul class="slides">';
										if($cabin->cabin_image_first != ""){
											$output .= '<li><img src="'. $cabin->cabin_image_first .'"/></li>';
										}
										if($cabin->cabin_image_second != ""){
											$output .= '<li><img src="'. $cabin->cabin_image_second .'"/></li>';
										}	
										if($cabin->cabin_image_third != ""){
											$output .= '<li><img src="'. $cabin->cabin_image_third .'"/></li>';
										}
										if($cabin->cabin_image_fourth != ""){
											$output .= '<li><img src="'. $cabin->cabin_image_fourth .'"/></li>';
										}
										if($cabin->cabin_image_fifth != ""){
											$output .= '<li><img src="'. $cabin->cabin_image_fifth .'"/></li>';
										}
										$output .= '</ul></div></div></div>';
										$output .= '<div class="vc_col-sm-6">'. $cabin->cabin_desc .'</div></div>';
										$output .= '</div>';
										$output .= '</div>';
									}
									$output .= '</div>';
								}
								
								/*$on_board = get_post_meta(get_the_ID(), "on_board", true);
								if($on_board != ""){
									
									$output .= '<div class="villa-overview">';
									$output .= '<span class="detail-heading">On Board</span><br/>';
									$output .= get_post_meta(get_the_ID(), "on_board", true);
									
									$output .= '</div>';
								}*/
							
								$fourth_gallery_img = get_post_meta(get_the_ID(), "fourth_gallery_img", true);
								$fifth_gallery_img = get_post_meta(get_the_ID(), "fifth_gallery_img", true);
								$six_gallery_imgs = get_post_meta(get_the_ID(), "six_gallery_img", true);
								if($fourth_gallery_img != ""){
									$output .= '<div class="images-gallery">';
									$output .= '<div class="gallery_holder">';
									$output .= '<ul class="gallery_inner v3">';
								if($fourth_gallery_img != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "fourth_gallery_img", true) . '" class="prettyphoto" title="'.$fourth_thumb_title.'" style="background:url('.$fourth_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
								if($fifth_gallery_img != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "fifth_gallery_img", true) . '" class="prettyphoto" title="'.$fifth_thumb_title.'" style="background:url('.$fifth_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
								if($six_gallery_imgs != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "six_gallery_img", true) . '" class="prettyphoto" title="'.$sixth_thumb_title.'" style="background:url('.$six_gallery_imgs.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
									$output .= '</ul>';
									$output .= '</div>';
									$output .= '</div>';
								}else{
									$output .= '<hr class="top-facelities">';
								}
								
								$extra= get_post_meta(get_the_ID(), "extra", true);
								if($extra != ""){
									$output .= '<div class="vc_col-sm-4 wpb_column vc_column_container">';
									$output .= '<span class="sub-title loff"><strong>Extras:</strong></span>';
									$output .= get_post_meta(get_the_ID(), "extra", true);
									$output .= '</div>';
									
								}
								$need_to_know= get_post_meta(get_the_ID(), "need_to_know", true);
								if($need_to_know != ""){
									$output .= '<div class="vc_col-sm-4 wpb_column vc_column_container">';
									$output .= '<span class="sub-title loff"><strong>Policies:</strong></span>';
									$output .= get_post_meta(get_the_ID(), "need_to_know", true);
									$output .= '</div>';
									$output .= '</div>';
									
								}
								
								$facilities = get_post_meta(get_the_ID(), "facilities", true);
								if($facilities != ""){
									$output .= '<div class="yacht-facilities">';
									$output .= '<h3 class="detail-heading quick-facts">Facilities & Services</h3>';
									$output .= get_post_meta(get_the_ID(), "facilities", true);
									
									$output .= '</div>';
									/* $output .= '<hr/>'; */
								}
								
								$seven_gallery_img = get_post_meta(get_the_ID(), "seven_gallery_img", true);
								$eight_gallery_img = get_post_meta(get_the_ID(), "eight_gallery_img", true);
								$nine_gallery_img = get_post_meta(get_the_ID(), "nine_gallery_img", true);
								if($seven_gallery_img != ""){
									$output .= '<div class="images-gallery">';
									$output .= '<div class="gallery_holder">';
									$output .= '<ul class="gallery_inner v3">';
								if($seven_gallery_img != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "seven_gallery_img", true) . '" class="prettyphoto" title="'.$seventh_thumb_title.'" style="background:url('.$seven_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
								if($eight_gallery_img != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "eight_gallery_img", true) . '" class="prettyphoto" title="'.$eighth_thumb_title.'" style="background:url('.$eight_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
								if($nine_gallery_img != ""){	
									$output .= '<li class="grayscale thumb-img">';
									$output .= '<a data-rel="prettyPhoto[pretty_photo_gallery]" href="'. get_post_meta(get_the_ID(), "nine_gallery_img", true) . '" class="prettyphoto" title="'.$nine_thumb_title.'" style="background:url('.$nine_gallery_img.'); background-size: cover; background-position: center center;"></a>';
									
									$output .= '</li>';
								}
									$output .= '</ul>';
									$output .= '</div>';
									$output .= '</div>';
								}
								
								$specification = get_post_meta(get_the_ID(), "specification", true);
								if($specification != ""){
									$output .= '<div class="yacht-equipment">';
									$output .= '<h3 class="detail-heading quick-facts">Specifications & Equipment</h3>';
									$output .= get_post_meta(get_the_ID(), "specification", true);
									
									$output .= '</div>';
									$output .= '<hr class="top-video">';
								}
								if($video != ""){
								$output .= '<div class="vc_col-sm-12 not-padding">';
								$output .= '<span class="detail-heading" onclick="videoPopUpShowY()">Video & Awards</span><br>';
								$output .= '<div class="vc_col-sm-6 not-padding">';
								$output .= '<img height="350" src="'.$video_image.'" onclick="videoPopUpShowY()" style="cursor:pointer" />';
								$output .= '<div class="video-title" style="cursor:pointer" onclick="videoPopUpShowY()">'.$video_title.'</div>';
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
								
								/*
								*   Facilities Section
								*/
								$quick_fact = get_post_meta(get_the_ID(), "quick_fact", true);
								if($quick_fact != ""){
									$output .= '<hr/>';
									$output .= '<div class="villa-facilities">';
									$output .= '<h3 class="detail-heading quick-facts">Quick Facts</h3>';
									$output .= get_post_meta(get_the_ID(), "quick_fact", true);
									
									$output .= '</div>';
									
								}
								/*
								*   Location Google Map Section
								*/
								$location_description = get_post_meta(get_the_ID(), "location_desc", true);
								if($location_description != ""){
									$output .= '<hr/>';
									$output .= '<div class="map-location">';
									$output .= '<h3 class="detail-heading">Location</h3><br/>';
									$output .= get_post_meta(get_the_ID(), "location_desc", true);
									$output .= '</div><br/>';
								}
								$blank = "";
								$_address = get_post_meta(get_the_ID(), "address", true);
								if($_address != "" && $latitude != "" && $longitude != ""){
									$output .= '<div class="map-location yacth-map">';
									$output .= "\n\t\t\t" . '<div id="map" style="width: 100%; height: 320px;"></div>';
									$output .= '</div>';
								}
								
								echo $output;
								
							?>
							
						<!-- REVIEWS SECTION-->
							<?php include_once('reviews.php'); ?>
						<!-- /REVIEWS SECTION-->
							
						</div>
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
							$terms = wp_get_post_terms(get_the_ID(),'yacht_category');
							$counter = 0;
							$all = count($terms);
							if($all > 0){
								?>
								<div class="info portfolio_categories">
									<h6><?php _e('Category ','qode'); ?></h6>
										<span class="category">
										 <p class="vinfo"><?php echo $bedroom ; ?>
										<?php if( $bathroom != ""){ echo     " | " . $bathroom;}
										if($private_pool != ""){ echo " | " .$private_pool; } ?>
										
										</p>
										</span>
								</div>
							  <?php 
							} 
							$yacht_categories = get_the_term_list( get_the_ID(), 'yacht_category');
							if($yacht_categories){ ?>
								<div class="categories">
								<?php
								echo $yacht_categories; ?>
								</div>
							<?php }
							
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
										<p class="vinfo"><?php echo $bedroom ." | ". $bathroom ." | ".$private_pool; ?></p>
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
									$calendar = "";
									$calendar .= '<div class="avalablity-calendar">';
									
									$calendar .= '<button class="calendar-sidebar qbutton" onclick="showIframe2()">Availability Calendar</button>';
									$calendar .= '<iframe id="iframe2" width="100%" height="300" style="display:none;" src='."$availability_link".'></iframe>';
									
									$calendar .= '</div>'; 
									
									/*  echo $calendar; */
								}
							?>
							
							<div class="booknow-sidebar">
									<form action="<?php echo $home_url ?>/yacht-booking-enquiry" method="POST">
										<input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
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
			
			<?php include_once('related-yachts.php'); ?>
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
		</div>
	</div>
	<div id="videoPop" style="border:1px solid #e2e2e2; display:none;">
		<div class="video-popup-content">
		<iframe id="videoframe" width="100%" height="600" src="<?php echo $video ?>" frameborder="0" allowfullscreen="true" allowscriptaccess="always"></iframe>
		<span onclick="videoPopUpHideY()" class="close_popup">&times;</span>
		</div>
	</div>
								
	<script type="text/javascript"> 
	
	jQuery(function(){
	jQuery('header').removeClass('archive-page-header single-magazine-page-header');
	
	jQuery('table.tblrates').each(function(){
	   //alert($(this).children('tbody').children(':odd').length)
	   $rowCount = jQuery(this).find('tr').length;
		if($rowCount %2 != 0){
			jQuery(this).children('tbody').children(':even').addClass('alt');
		}else{
			jQuery(this).children('tbody').children(':odd').addClass('alt');
		}
	});

	jQuery('.close_popup').click(function(){
										
		var video = jQuery("#videoframe").attr("src");
		jQuery("#videoframe").attr("src","");
		jQuery("#videoframe").attr("src",video);
		
		
	});
 
});
jQuery("#reviews").click(function() {
    jQuery('html, body').animate({
        scrollTop: jQuery("#review-section").offset().top
    }, 200);
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
	jQuery(".cabin-title").click(function () {
		jQuery('a.flex-next').parent('li').addClass('float-right');
		cabin_id = jQuery(this).attr("id");
		jQuery("."+cabin_id+"_read-more").toggle();
		
		jQuery('.flexslider_'+cabin_id+"_f").flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
		
	});
	jQuery(document).ajaxSuccess(function() {
	  mapinitialize()
	});

	function mapinitialize() {
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
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    map.setTilt(45);
        
    // Multiple Markers
    var markers = [
			['<?php the_title(); ?>',<?php echo $latitude ?>, <?php echo $longitude ?>, 'http://www.hinolincolnshire.co.uk/wp-content/uploads/2015/07/pin_large.png'],<?php echo $locations; ?>  
		];
		
		 
                        
    // Info Window Content
    var infoWindowContent = [
        ['<div class="info_content"><div class="map-thumb" style="width:125px; height: 80px; overflow: hidden;">' + post_image +
        '</div><p><?php the_title(); ?></p>' +
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
        this.setZoom(12);
        google.maps.event.removeListener(boundsListener);
    });
    
}

google.maps.event.addDomListener(window, 'load', mapinitialize);


	function showIframe(){
		var iframe = document.getElementById("iframe1");  
		iframe.style.display = (iframe.style.display == "none") ? "block" : "none"; 
    }
	function showIframe2(){
		var iframe = document.getElementById("iframe2");  
		iframe.style.display = (iframe.style.display == "none") ? "block" : "none"; 
    }
	
	//Function To Display Popup
	function videoPopUpShowY() {
	
		document.getElementById('videoPop').style.display = "block";

	} 
	function videoPopUpHideY(){
		document.getElementById('videoPop').style.display = "none";
	}
	
</script>

	
</div>
</div>
</div>	





<?php endwhile; ?>
<?php endif; ?>	

<?php get_footer('single'); ?>	
