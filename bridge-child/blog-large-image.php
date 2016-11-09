<?php 
/*
Template Name: Blog Large Images
*/ 
?>
<?php get_header(); ?>
<?php 
global $wp_query;
global $qode_template_name;
$id = $wp_query->get_queried_object_id();
$qode_template_name = get_page_template_slug($id);
$category = get_post_meta($id, "qode_choose-blog-category", true);
$post_number = get_post_meta($id, "qode_show-posts-per-page", true);
$page_object = get_post( $id );
$content = $page_object->post_content;
$content = apply_filters( 'the_content', $content );
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

$sidebar = get_post_meta($id, "qode_show-sidebar", true); 


if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$background_color = get_post_meta($id, "qode_page_background_color", true);
}else{
	$background_color = "";
}

if($qode_options_proya['number_of_chars_large_image'] != "") {
	qode_set_blog_word_count($qode_options_proya['number_of_chars_large_image']);
}

$blog_content_position = "content_above_blog_list";
if(isset($qode_options_proya['blog_content_position'])){
	$blog_content_position = $qode_options_proya['blog_content_position'];
}

?>
	<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
			<script>
			var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
			</script>
		<?php } ?>
		
	<?php
		$revslider = get_post_meta($id, "qode_revolution-slider", true);
		if (!empty($revslider)){ ?>
			<div class="q_slider"><div class="q_slider_inner">
			<?php echo do_shortcode($revslider); ?>
			</div></div>
		<?php
		}
		?>
		
		
		<?php $args = array(
			'numberposts' => 10,
			'offset' => 0,
			'category' => 0,
			'orderby' => 'post_date',
			'order' => 'DESC',
			'post_type' => 'post',
			'post_status' => 'draft, publish, future, pending, private',
			'suppress_filters' => true );
			query_posts($args);
			
		?>
		
		<div class="qode_image_gallery_no_space  highlight_active blog-thumb-slider" style="opacity: 1;">
		<div style="height: 510px;" class="qode_image_gallery_holder">

		<ul style="background-color: rgb(255, 255, 255); width: 7683px;">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			<li>
			<div class="blog-post-slider">
				<div class="recent-post-info">
					<div class="post_text_holder">
						<div class="blog_column1">
							<div class="date">
								<span class="date_day"><?php the_time('d'); ?></span>
								<span class="date_month"><?php the_time('M'); ?></span>
							</div>
						</div>
						<div class="blog_column2">
							<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
						</div>
					</div>
				</div>
			</div>
			
			
			
			<?php echo get_the_post_thumbnail(get_the_ID(), $thumb_size); ?></li>
			<?php endwhile;
			
			endif; ?>
		</ul> 

	</div>
	<div class="controls">
		<a class="prev-slide" href="#">
			<span>
				<i class="fa fa-angle-left"></i>
			</span>
		</a>
		<a class="next-slide" href="#">
			<span>
				<i class="fa fa-angle-right"></i>
			</span>
		</a>
	</div>
</div>

		
	<?php 
		query_posts('post_type=post&paged='. $paged . '&cat=' . $category .'&posts_per_page=' . $post_number );
		
	?>
	
	<div class="container"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
		<div class="container_inner default_template_holder">
				<?php if(($sidebar == "default")||($sidebar == "")) : ?>

						<?php //echo $content; ?>

						<?php 
							get_template_part('templates/blog', 'structure');
						?>			
				<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
					<?php
						if($blog_content_position != "content_above_blog_list"){
							//echo $content;
						}
					?>
					<div class="vc_row wpb_row section vc_row-fluid" style=" padding-top:0px; padding-bottom:50px; text-align:left;">
					<div class=" full_section_inner clearfix">
	<div class="vc_col-sm-12 wpb_column vc_column_container ">
		<div class="wpb_wrapper">
			
	<div class="wpb_text_column wpb_content_element ">
		<div class="wpb_wrapper">
			<h2 class="latest-posts" style="text-align: center;">Latest Posts</h2>

		</div> 
	</div> <div class="separator  transparent center  " style="margin-top: 24px;margin-bottom: 0px;"></div>

	<div class="wpb_text_column wpb_content_element  vc_custom_1431438684988">
		<div class="wpb_wrapper">
			<h4 class="latest-posts" style="text-align: center;">Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</h4>

		</div> 
	</div> 
		</div> 
	</div> 
</div>
</div>
					<div class="ub-blog-posts <?php if($sidebar == "1"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
						<div class="column1">
							<div class="column_inner">

								<?php
									if($blog_content_position == "content_above_blog_list"){
										//echo $content;
									}
								?>

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
						<?php
							if($blog_content_position != "content_above_blog_list"){
								echo $content;
							}
						?>
						<div class="<?php if($sidebar == "3"):?>two_columns_33_66<?php elseif($sidebar == "4") : ?>two_columns_25_75<?php endif; ?> background_color_sidebar grid2 clearfix">
							<div class="column1">
								<?php get_sidebar(); ?>	
							</div>
							<div class="column2">
								<div class="column_inner">

									<?php
										if($blog_content_position == "content_above_blog_list"){
											echo $content;
										}
									?>

									<?php 
										get_template_part('templates/blog', 'structure');
									?>			
								</div>
							</div>
							
						</div>
				<?php endif; ?>
	</div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>