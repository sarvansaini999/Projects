<?php get_header('archive'); ?>
<?php
global $wp_query;
$id = $wp_query->get_queried_object_id();
$slug = get_query_var( 'term' );
 $term = get_term_by('slug', $slug, 'magazine_category'); 
   $name = $term->name; 
    $id = $term->term_id;
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

$sidebar = $qode_options_proya['category_blog_sidebar'];

$blog_hide_comments = "";
if (isset($qode_options_proya['blog_hide_comments']))
	$blog_hide_comments = $qode_options_proya['blog_hide_comments'];

if(isset($qode_options_proya['blog_page_range']) && $qode_options_proya['blog_page_range'] != ""){
	$blog_page_range = $qode_options_proya['blog_page_range'];
} else{
	$blog_page_range = $wp_query->max_num_pages;
}

?>

	<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
		<script>
		var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
		</script>
	<?php } ?>

		<div class="title_outer title_without_animation" data-height="735">
			<div class="title title_size_small  position_left " style="height:355px;">
				<div class="image not_responsive"></div>
				<div class="title_holder" style="padding-top:100px;height:255px; background:url('<?php echo get_stylesheet_directory_uri(). '/img/Bali-Lifestyle-Magazine.jpg'; ?>') !important;background-attachment: fixed !important;background-size: 100% !important;background-repeat: no-repeat !important;">
					<h1 class="archive-page-title  booking-page-title"><span class="breadcrumb_title"><?php if($name != ""){ echo $name; }elseif (is_tag()) {echo $title = single_term_title("", false);} ?></span></h1>
					<div class="container">
						<div class="container_inner clearfix">
							<div class="title_subtitle_holder">
								<div class="title_subtitle_holder_inner">


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container category-tags-page" >
            <?php if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes') {?>
                <div class="overlapping_content"><div class="overlapping_content_inner">
            <?php } ?>
			<div class="container_inner default_template_holder clearfix">
				<?php if(($sidebar == "default")||($sidebar == "")) : ?>
					<div class="<?php if($sidebar == "default"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
						<div class="column1">
							<div class="column_inner">
								<?php 
									get_template_part('templates/blog', 'structure');
								?>
							</div>
						</div>
						<div class="column2">
							<?php get_sidebar('archive'); ?>	
						</div>
					</div>
				<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
					<div class="<?php if($sidebar == "1"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
						<div class="column1">
							<div class="column_inner">
								<?php 
									get_template_part('templates/blog', 'structure');
								?>
							</div>
						</div>
						<div class="column2">
							<?php get_sidebar(); ?>	
						</div>
					</div>
			<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
					<div class="<?php if($sidebar == "3"):?>two_columns_33_66<?php elseif($sidebar == "4") : ?>two_columns_25_75<?php endif; ?> background_color_sidebar grid2 clearfix">
						<div class="column1">
						<?php get_sidebar(); ?>	
						</div>
						<div class="column2">
							<div class="column_inner">
								<?php 
									get_template_part('templates/blog', 'structure');
								?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
            <?php if(isset($qode_options_proya['overlapping_content']) && $qode_options_proya['overlapping_content'] == 'yes') {?>
                </div></div>
            <?php } ?>
		</div>
		<script>
			jQuery(document).ready(function($){
				$('header').addClass('archive-page-header').removeClass('single-magazine-page-header');
				if ($('.blog_holder').hasClass('blog_large_image')){
					$('.blog_holder').removeClass('blog_large_image').addClass('blog_large_image_with_dividers');
				}
			});
		</script>
<?php get_footer(); ?>