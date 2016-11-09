<?php 
/*
Template Name: Page Not Found
*/ 
?>
<?php 
	global $qode_options_proya;
?>

<?php get_header('archive'); ?>
			
			<div class="title_outer title_without_animation page-not-found" data-height="735">
				<div id="has_bg_image" class="background-fixed title title_size_large  position_center  has_background" style="padding-top:100px;height:635px; background:url('<?php echo get_stylesheet_directory_uri(). '/img/Error-404.jpg'; ?>') !important;background-attachment: fixed !important;background-size: cover !important;background-repeat: no-repeat !important;background-position: center 0 !important;">
					<div class="image not_responsive"><img src="<?php echo get_stylesheet_directory_uri(). '/img/Error-404.jpg'; ?>" alt="&nbsp;"></div>
					<div class="title_holder" style="padding-top:101px;height:629px;">
						<h1 class="archive-page-title  booking-page-title"><span class="breadcrumb_title"><?php echo "OOPS... Destination not found" ?></span></h1>
						<div class="container">
							<div class="container_inner clearfix">
								<div class="title_subtitle_holder">
									<div class="title_subtitle_holder_inner ">
										<p>The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps <br /> you can return back to our homepage and see if you can find what you are looking for.</P>
										
									</div>
									<p><a class="qbutton with-shadow" href="<?php echo home_url(); ?>/"><?php if($qode_options_proya['404_backlabel'] != ""): echo $qode_options_proya['404_backlabel']; else: ?> <?php _e('Back to homepage', 'qode'); ?> <?php endif;?></a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container" style="display: none;">
                <?php if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes') {?>
                    <div class="overlapping_content"><div class="overlapping_content_inner">
                <?php } ?>
				<div class="container_inner default_template_holder">
					<div class="page_not_found">
						<h2><?php if($qode_options_proya['404_subtitle'] != ""): echo $qode_options_proya['404_subtitle']; else: ?> <?php _e('The page you are looking for is not found', 'qode'); ?> <?php endif;?></h2>
                        <p><?php if($qode_options_proya['404_text'] != ""): echo $qode_options_proya['404_text']; else: ?> <?php _e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site’s homepage and see if you can find what you are looking for.', 'qode'); ?> <?php endif;?></p>
						<div class="separator  transparent center  " style="margin-top:35px;"></div>
						<p><a class="qbutton with-shadow" href="<?php echo home_url(); ?>/"><?php if($qode_options_proya['404_backlabel'] != ""): echo $qode_options_proya['404_backlabel']; else: ?> <?php _e('Back to homepage', 'qode'); ?> <?php endif;?></a></p>
						<div class="separator  transparent center  " style="margin-top:35px;"></div>
					</div>
				</div>
                <?php if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes') {?>
                    </div></div>
                <?php } ?>
			</div>
			<script>
				jQuery(document).ready(function($){
					var hg = $( window ).height();
					var h_hg = $( 'header' ).outerHeight();
					var bgHg = hg - h_hg;
					$('content').addClass('page-404');
					$('#has_bg_image').css('height',bgHg);
					$('.image img').css('height',bgHg);
				});
			</script>
<?php get_footer('single'); ?>
