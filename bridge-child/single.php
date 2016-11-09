<?php

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

$content_style_spacing = "";
if(get_post_meta($id, "qode_margin_after_title", true) != ""){
	if(get_post_meta($id, "qode_margin_after_title_mobile", true) == 'yes'){
		$content_style_spacing = "padding-top:".esc_attr(get_post_meta($id, "qode_margin_after_title", true))."px !important";
	}else{
		$content_style_spacing = "padding-top:".esc_attr(get_post_meta($id, "qode_margin_after_title", true))."px";
	}
}

?>
<?php get_header('magazine_single'); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
				<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
					<script>
					var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
					</script>
				<?php } ?>
					<?php //get_template_part( 'title' ); ?>
				<?php
				$revslider = get_post_meta($id, "qode_revolution-slider", true);
				if (!empty($revslider)){ ?>
					<div class="q_slider"><div class="q_slider_inner">
					<?php echo do_shortcode($revslider); ?>
					</div></div>
				<?php
				}
				?>
				<div class="container"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
					
				<?php	$_post_format = get_post_format();
				?>
				<?php
					switch ($_post_format) {
						case "video": ?>
							<div class="post_image post_featured_image">
					<?php $_video_type = get_post_meta(get_the_ID(), "video_format_choose", true);?>
					<?php if($_video_type == "youtube") { ?>
						<iframe src="//www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
					<?php } elseif ($_video_type == "vimeo"){ ?>
						<iframe src="//player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
					<?php } elseif ($_video_type == "self"){ ?> 
						<div class="video"> 
						<div class="mobile-video-image" style="background-image: url(<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>);"></div> 
						<div class="video-wrap"  > 
							<video class="video" poster="<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>" preload="auto"> 
								<?php if(get_post_meta(get_the_ID(), "video_format_webm", true) != "") { ?> <source type="video/webm" src="<?php echo get_post_meta(get_the_ID(), "video_format_webm", true);  ?>"> <?php } ?> 
								<?php if(get_post_meta(get_the_ID(), "video_format_mp4", true) != "") { ?> <source type="video/mp4" src="<?php echo get_post_meta(get_the_ID(), "video_format_mp4", true);  ?>"> <?php } ?> 
								<?php if(get_post_meta(get_the_ID(), "video_format_ogv", true) != "") { ?> <source type="video/ogg" src="<?php echo get_post_meta(get_the_ID(), "video_format_ogv", true);  ?>"> <?php } ?> 
								<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf"> 
									<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" /> 
									<param name="flashvars" value="controls=true&file=<?php echo get_post_meta(get_the_ID(), "video_format_mp4", true);  ?>" /> 
									<img src="<?php echo get_post_meta(get_the_ID(), "video_format_image", true);  ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" /> 
								</object> 
							</video>   
						</div></div> 
					<?php } ?>
				</div>
					<?php
							break;
							case "audio": ?>
							
								<div class="post_image post_featured_image">
									<audio class="blog_audio" src="<?php echo get_post_meta(get_the_ID(), "audio_link", true) ?>" controls="controls">
										<?php _e("Your browser don't support audio player","qode"); ?>
									</audio>
								</div>
									
					
					<?php
							break;
							case "gallery": ?>
								<div class="post_image post_featured_image">
					<div class="flexslider">
						<ul class="slides">
							<?php
								$post_content = get_the_content();
								preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
								$array_id = explode(",", $ids[1]);
								
								$content =  str_replace($ids[0], "", $post_content);
								$filtered_content = apply_filters( 'the_content', $content);
								
								foreach($array_id as $img_id){ ?>
									<li><?php echo wp_get_attachment_image( $img_id, 'full' ); ?></li>
								<?php } ?>
						</ul>
					</div>
				</div>
					
					
					<?php
							break;
							default:
							 if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
							if ( has_post_thumbnail() ) { ?>
								<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
									$url = $thumb['0']; ?>
								<section class="post_image post_featured_image in_top" style="background: url(<?php echo $url = $thumb['0']; ?>)">
									<?php the_post_thumbnail('full'); ?>
									<!---<h1><span><?php //the_title(); ?></span></h1>---->
								</section>
								
						<?php } } }?>
					
					
                    <?php if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes') {?>
                        <div class="overlapping_content"><div class="overlapping_content_inner">
                    <?php } ?>
					<div class="container_inner default_template_holder" <?php qode_inline_style($content_style_spacing); ?>>
						
						
						<div class="blog_holder blog_large_image_with_dividers ub-blog-info">
							<div class="post_text_inner">
								<div class="post_text_holder post_text_holder_magazine">
									<div class="blog_column1 post-date-style">
											<div class="date">
												<span class="date_day"><?php the_time('d'); ?></span>
												<span class="date_month"><?php the_time('M'); ?></span>
											</div>
									</div>
									<div class="blog_column2" style="display: inline-block;">
										<h1 class="magazine-post-title"><?php the_title(); ?></h1>
										<div class="post_info">
							<?php $magazine_categories = get_the_term_list( get_the_ID(), 'magazine_category', ' ', ',  ');
								if($magazine_categories){
									echo $magazine_categories;
								} ?>
							
							<?php if($blog_hide_comments != "yes"){ ?>
								<span class="dots"><i class="fa fa-square"></i></span><a class="post_comments" href="<?php comments_link(); ?>" target="_self"><?php comments_number('0 ' . __('Comments','qode'), '1 '.__('Comment','qode'), '% '.__('Comments','qode') ); ?></a>
							<?php } ?>
							<?php if( $qode_like == "on" ) { ?>
									<span class="dots"><i class="fa fa-square"></i></span><div class="blog_like">
									<?php if( function_exists('qode_like') ) qode_like(); ?>
								</div>
							<?php } ?>
							<?php if(isset($qode_options_proya['enable_social_share'])  && $qode_options_proya['enable_social_share'] == "yes") { ?>
								<span class="dots"><i class="fa fa-square"></i></span><?php echo do_shortcode('[social_share]'); ?>	
							<?php } ?>
						</div>
									</div>
									
								</div>
							</div>
							<!---<h2 class="post_excerpt">// echo get_the_excerpt();</h2>--->
									<hr>
						</div>
						<script>
				
				jQuery(document).ready(function($) {
					jQuery('header').removeClass('archive-page-header single-page-header').addClass('single-magazine-page-header');
					$('.tags_text a').attr('rel', 'nofollow');
					var imageBg = $("section");
					$(window).scroll(function() {    
						var scroll = $(window).scrollTop();
					
						if (scroll >= 250) {
							imageBg.addClass("parallaxBg");
						} else {
							imageBg.removeClass("parallaxBg");
						}
					});
				});
			</script>
					<?php if(($sidebar == "default")||($sidebar == "")) : ?>
						<div class="blog_holder blog_single">
						<?php 
							get_template_part('templates/blog_single', 'loop');
						?>
						<?php
							if($blog_hide_comments != "yes"){
								comments_template('', true); 
							}else{
								echo "<br/><br/>";
							}
						?> 
						
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
                <?php if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes') {?>
                    </div></div>
                <?php } ?>
				<div class="container">

					<?php $nextPost = get_previous_post(); ?>
					<div class="post_image in-footer post_featured_image image_holder">
					<?php  $nextthumbnail = wp_get_attachment_image_src( get_post_thumbnail_id ( $nextPost->ID ),'thumbnail-size', true); ?>
						<div class="image" title="<?php echo $nextPost->post_title; ?>" style="height: 100%;background-repeat: no-repeat; background-position: center; background-size: 100%; background-image:url(<?php echo $nextthumbnail[0]; ?>)">
							
							
						</div>
						<div class="next-post-info">
							<h3><span><?php previous_post_link('%link', 'Next Post'); ?></span></h3>
							<h1><span><?php echo $nextPost->post_title; ?></span></h1>
						</div>
						 
					</div>
					
					
				</div>
				<div class="container_inner default_template_holder">
					<?php include_once('related-post.php'); ?>
				</div>
			</div>			
	
			
			
			
			
<?php endwhile; ?>
<?php endif; ?>	
			

<?php get_footer(); ?>	