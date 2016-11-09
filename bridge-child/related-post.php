<?php 

$orig_post = $post;

global $post;

$categories = get_the_category();

	if ($categories) {
		$args = array(
			'category' => $categories, 
			'post_type' => 'post',
			'orderby' => 'rand',
			'order' => 'DESC',
			'posts_per_page' => 3,
			'cache_results' => false,
			'paged' => $paged,
			'post__not_in' => array( $post->ID )
		);
		
		$my_query = new wp_query( $args ); 
		
		?>
		
			<div class="related-villas single-magazine-post" style="border-top:1px solid rgb(222,222,222); margin-bottom: 20px;">
		<?php if( $my_query->have_posts() ) { 

			?>
			
				<span class="detail-heading" style="margin: 40px 0; width:100%; text-align: center;">You May Also Like</span>
				<div class="projects_holder  clearfix v3 portfolio_full_image">
				<?php	while( $my_query->have_posts() ) {
					$my_query->the_post(); 
					$terms = wp_get_post_terms(get_the_ID(), 'category');
					$terms = wp_get_post_terms(get_the_ID(), 'category');
					$bedrooms = get_post_meta(get_the_ID(), "bedrooms", true);
					$guests = get_post_meta(get_the_ID(), "guest", true);
					$address = get_post_meta(get_the_ID(), "address", true);
					
					$private_pool_villa = get_post_meta(get_the_ID(), "private_pool_villa", true);
					$beachfront = get_post_meta(get_the_ID(), "beachfront", true);
					$short_desc = get_post_meta(get_the_ID(), "short_text", true);
					$lowPrices = get_post_meta(get_the_ID(), "price_from", true);
					$highPrices = get_post_meta(get_the_ID(), "price_to", true);
					
					
					

				?>
						
						<article class="mix mix_all" style="display: inline-block;opacity: 1;">
							<div class="image_holder">
								<a class="portfolio_link_for_touch" href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
									<span class="image"><?php the_post_thumbnail(); ?></span>
								</a>
								
								<span class="text_holder">
								<span class="text_outer">
								<span class="text_inner">
								<span class="feature_holder">
								<span class="feature_holder_icons">
								<p class="thumb-text villa-thumb-text"><?php echo $short_desc; ?></p>
								<a class="preview qbutton small white" href="<?php the_permalink()?>" target="_self">view</a>
								</span></span></span></span></span>
								
							</div>
						
						<div class="relatedcontent">
						<div class="portfolio_description "><h5 class="portfolio_title "> 
						<a href="<? the_permalink()?>" target="_self"><?php the_title() ?></a>
						 </h5>
						
						</div>
						</div>
						</article>
					
				<?php }
				
					
				
				?>
				</div>
			</div>
		<?php } ?>
		
	<?php }
	
	$post = $orig_post;
wp_reset_query(); ?>

