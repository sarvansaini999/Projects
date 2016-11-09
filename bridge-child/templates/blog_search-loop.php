<?php 
global $qode_options_proya;
$blog_hide_comments = "";
if (isset($qode_options_proya['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_proya['blog_hide_comments'];
}

$blog_hide_author = "";
if (isset($qode_options_proya['blog_hide_author'])) {
    $blog_hide_author = $qode_options_proya['blog_hide_author'];
}

$qode_like = "on";
if (isset($qode_options_proya['qode_like'])) {
	$qode_like = $qode_options_proya['qode_like'];
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post_content_holder">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post_image">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail('full'); ?>
				</a>
			</div>
		<?php } ?>
		<div class="post_text">
			<div class="post_text_inner">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="post_info">
				
					<?php 
					$villas_categories = get_the_term_list( get_the_ID(), 'villa_category', ' ', ',  ');
					$retreats_categories = get_the_term_list( get_the_ID(), 'retreat_category', ' ', ',  ');
					$yachts_categories = get_the_term_list( get_the_ID(), 'yacht_category', ' ', ',  ');
					$magazine_categories = get_the_term_list( get_the_ID(), 'magazine_category', ' ', ',  ');
					if($magazine_categories){
						echo $magazine_categories;
					}/*elseif($villas_categories){
						echo $villas_categories;
					}elseif($retreats_categories){
						echo $retreats_categories;
					}elseif($yachts_categories){
						echo $yachts_categories;
					}*/
					
					?>
					
				</div>
				<?php
					$my_excerpt = get_the_excerpt();
					if ($my_excerpt != '') {
						echo $my_excerpt;
					}
				?>
				<div class="post_more">
					<a href="<?php the_permalink(); ?>" class="qbutton small"><?php _e('Read More','qode'); ?></a>
				</div>
			</div>
		</div>
	</div>
</article>