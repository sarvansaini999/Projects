<?php 
global $qode_options_proya;
$blog_hide_comments = "";
if (isset($qode_options_proya['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_proya['blog_hide_comments'];
}
$blog_author_info="no";
if (isset($qode_options_proya['blog_author_info'])) {
	$blog_author_info = $qode_options_proya['blog_author_info'];
}
$qode_like = "on";
if (isset($qode_options_proya['qode_like'])) {
	$qode_like = $qode_options_proya['qode_like'];
}
?>
<?php
$_post_format = get_post_format();
?>
<?php
	switch ($_post_format) {
		case "video":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				
				<div class="post_text">
					<div class="post_text_inner">
						<h2><span class="date"><?php the_time('d M'); ?></span> <?php the_title(); ?></h2>
						<div class="post_info">
							 <?php the_category(', '); ?>
							
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
						<?php the_content(); ?>
					</div>
				</div>
			</div>
<?php
		break;
		case "audio":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				
				<div class="post_text">
					<div class="post_text_inner">
						<h2><span class="date"><?php the_time('d M'); ?></span> <?php the_title(); ?></h2>
						<div class="post_info">
							 <?php the_category(', '); ?>
							
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
						<?php the_content(); ?>
					</div>
				</div>
			</div>
	
<?php
		break;
		case "link":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				<div class="post_text">
					<div class="post_text_inner">
						<div class="post_info">
							<?php the_category(', '); ?>
							
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
						<i class="link_mark fa fa-link pull-left"></i>
						 <?php $title_link = get_post_meta(get_the_ID(), "title_link", true) != '' ? get_post_meta(get_the_ID(), "title_link", true) : 'javascript: void(0)'; ?>
						<div class="post_title">
							<p><a href="<?php echo $title_link; ?>"><?php the_title(); ?></a></p>
						</div>
					</div>
				</div>
				<?php the_content(); ?>
			</div>
<?php
		break;
		case "gallery":
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				
				<div class="post_text">
					<div class="post_text_inner">
						<h2><span class="date"><?php the_time('d M'); ?></span> <?php the_title(); ?></h2>
						<div class="post_info">
							<?php the_category(', '); ?>
							
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
						<?php echo do_shortcode($filtered_content); ?>	
					</div>
				</div>

			</div>
		
<?php
		break;
		case "quote":
?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post_content_holder">
					<div class="post_text">
						<div class="post_text_inner">
							<div class="post_info">
								<?php the_category(', '); ?>
								
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
							<i class="qoute_mark fa fa-quote-right pull-left"></i>
							<div class="post_title">
								<p><?php echo get_post_meta(get_the_ID(), "quote_format", true); ?></p>
								<span class="quote_author">&mdash; <?php the_title(); ?></span>
							</div>
						</div>
					</div>
					<?php the_content(); ?>
				</div>
<?php
		break;
		default:
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="post_content_holder">
				
				<div class="post_text blog_holder blog_large_image_with_dividers">
					<div class="post_text_inner">
					<?php the_content(); ?>
					</div>
				</div>
			</div>
		
<?php
}
?>
	<?php if( has_tag()) { ?>
		<div class="single_tags clearfix">
            <div class="tags_text">
				<h5><?php _e('Tags:','qode'); ?></h5>
				<?php 
				$tag_ids = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				if ((isset($qode_options_proya['tags_border_style']) && $qode_options_proya['tags_border_style'] !== '') || (isset($qode_options_proya['tags_background_color']) && $qode_options_proya['tags_background_color'] !== '')){
					//the_tags('', ' ', '');
					wp_tag_cloud(array('include'  => $tag_ids,'order=ASC','wp_rel_nofollow'));
				}
				else{
					//the_tags('', ', ', '');
					wp_tag_cloud(array('include'  => $tag_ids,'order=ASC','wp_rel_nofollow'));
				}
				?>
			</div>
		</div>
	<?php } ?>				
	<?php 
		$args_pages = array(
			'before'           => '<p class="single_links_pages">',
			'after'            => '</p>',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
			'pagelink'         => '%'
		);

		wp_link_pages($args_pages);
	?>
<?php if($blog_author_info == "yes") { ?>
	<div class="author_description">
		<div class="author_description_inner">
			<div class="image">
				<?php echo get_avatar(get_the_author_meta( 'ID' ), 75); ?>
			</div>
			<div class="author_text_holder">
				<h5 class="author_name">
				<?php  
					if(get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "") {
						echo get_the_author_meta('first_name') . " " . get_the_author_meta('last_name');
					} else {
						echo get_the_author_meta('display_name');
					}
				?>
				</h5>
				<span class="author_email"><?php echo get_the_author_meta('email'); ?></span>
				<?php if(get_the_author_meta('description') != "") { ?>
					<div class="author_text">
						<p><?php echo get_the_author_meta('description') ?></p>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
</article>
