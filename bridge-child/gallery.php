<?php 
/*
Template Name: Gallery
*/ 
?>
<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$sidebar = get_post_meta($id, "qode_show-sidebar", true);  

$enable_page_comments = false;
if(get_post_meta($id, "qode_enable-page-comments", true) == 'yes') {
	$enable_page_comments = true;
}

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

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

?>
	<?php get_header('archive'); ?>
		<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
			<script>
			var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
			</script>
		<?php } ?>
			<?php 
					
					//session_start();
					
					if(isset($_POST['post_id'])){ 
						$post_id = $_POST['post_id'];
						//$_SESSION['post_id'] = $_POST['post_id'];
						
					}else{
						$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						$post_url = str_replace("gallery/", "", $actual_link);
						$post_id = url_to_postid( $post_url );
						
					}
					$venue_title = "";
					$venue_permalink = "";
					$venue_title = get_the_title($post_id);
					$venue_permalink = get_permalink($post_id);
					
			?>
			<input type="hidden" value="<?php echo $i ?>"/>
<div class="title_outer title_without_animation" data-height="253">
		<div class="title title_size_small  position_left" style="height:253px;background-color:#F6F6F6;">
			<div class="image not_responsive"></div>
			
			<div class="title_holder" style="padding-top:101px;height:152px;">
				<div class="container">
					<div class="container_inner clearfix">
						<div class="title_subtitle_holder">
							<div class="title_subtitle_holder_inner">
								<h1><span><?php the_title(); ?></span></h1>
								<div id="page_load" class="breadcrumb"><div class="breadcrumbs"><div class="breadcrumbs_inner"><a href="<?php echo home_url(); ?>">Home</a><span class="delimiter">&nbsp;&gt;&nbsp;</span><a href="<?php echo $venue_permalink; ?>"><?php echo $venue_title; ?></a><span class="delimiter">&nbsp;&gt;&nbsp;</span><span class="current"><?php echo "Gallery"; ?></span></div></div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
		$revslider = get_post_meta($id, "qode_revolution-slider", true);
		if (!empty($revslider)){ ?>
			<div class="q_slider"><div class="q_slider_inner">
			<?php echo do_shortcode($revslider); ?>
			</div></div>
		<?php
		}
		?>
	<div class="full_width"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
	<div class="full_width_inner" <?php qode_inline_style($content_style_spacing); ?>>
		<?php if(($sidebar == "default")||($sidebar == "")) : ?>
			<?php if (have_posts()) : 
					while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<?php 
 $args_pages = array(
  'before'           => '<p class="single_links_pages">',
  'after'            => '</p>',
  'pagelink'         => '<span>%</span>'
 );

 wp_link_pages($args_pages); ?>
					<?php
					if($enable_page_comments){
					?>
					<div class="container">
						<div class="container_inner">
					<?php
						comments_template('', true); 
					?>
						</div>
					</div>	
					<?php
					}
					?> 
					<?php endwhile; ?>
				<?php endif; ?>
		<?php elseif($sidebar == "1" || $sidebar == "2"): ?>		
			
			<?php if($sidebar == "1") : ?>	
				<div class="two_columns_66_33 clearfix grid2">
					<div class="column1">
			<?php elseif($sidebar == "2") : ?>	
				<div class="two_columns_75_25 clearfix grid2">
					<div class="column1">
			<?php endif; ?>
					<?php if (have_posts()) : 
						while (have_posts()) : the_post(); ?>
						<div class="column_inner">
						
						<?php the_content(); ?>	
						<?php 
 $args_pages = array(
  'before'           => '<p class="single_links_pages">',
  'after'            => '</p>',
  'pagelink'         => '<span>%</span>'
 );

 wp_link_pages($args_pages); ?>
							<?php
							if($enable_page_comments){
							?>
							<div class="container">
								<div class="container_inner">
							<?php
								comments_template('', true); 
							?>
								</div>
							</div>	
							<?php
							}
							?> 
						</div>
				<?php endwhile; ?>
				<?php endif; ?>
			
							
					</div>
					<div class="column2"><?php get_sidebar();?></div>
				</div>
			<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
				<?php if($sidebar == "3") : ?>	
					<div class="two_columns_33_66 clearfix grid2">
						<div class="column1"><?php get_sidebar();?></div>
						<div class="column2">
				<?php elseif($sidebar == "4") : ?>	
					<div class="two_columns_25_75 clearfix grid2">
						<div class="column1"><?php get_sidebar();?></div>
						<div class="column2">
				<?php endif; ?>
						<?php if (have_posts()) : 
							while (have_posts()) : the_post(); ?>
							<div class="column_inner">
							<?php the_content(); ?>		
							<?php 
 $args_pages = array(
  'before'           => '<p class="single_links_pages">',
  'after'            => '</p>',
  'pagelink'         => '<span>%</span>'
 );

 wp_link_pages($args_pages); ?>
							<?php
							if($enable_page_comments){
							?>
							<div class="container">
								<div class="container_inner">
							<?php
								comments_template('', true); 
							?>
								</div>
							</div>	
							<?php
							}
							?> 
							</div>
					<?php endwhile; ?>
					<?php endif; ?>
				
								
						</div>
						
					</div>
			<?php endif; ?>
	</div>
	</div>	
	<script>
		jQuery(document).ready(function($){
			$('header').removeClass('archive-page-header');
		});
	</script>
	<?php get_footer(); ?>