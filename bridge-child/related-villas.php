<?php 

$orig_post = $post;

global $post;

$categories = get_the_term_list( get_the_ID(), 'villa_category');

	if ($categories) {
		$args = array(
			'villa_category' => $categories, 
			'post_type' => 'villas',
			'orderby' => 'rand',
			'order' => 'DESC',
			'posts_per_page' => 3,
			'cache_results' => false,
			'paged' => $paged,
			'post__not_in' => array( $post->ID )
		);
		
		$my_query = new wp_query( $args ); 
		
		?>
		
			<div class="related-villas" style="border-top:1px solid rgb(222,222,222); margin-bottom: 20px;">
		<?php if( $my_query->have_posts() ) { 

			?>
			
				<span class="detail-heading" style="margin: 40px 0; width:100%; text-align: center;">You May Also Like</span>
				<div class="projects_holder  clearfix v3 portfolio_full_image">
				<?php	while( $my_query->have_posts() ) {
					$my_query->the_post(); 
					$terms = wp_get_post_terms(get_the_ID(), 'category');
					$terms = wp_get_post_terms(get_the_ID(), 'villa_category');
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
								<a class="preview qbutton small white" href="<? the_permalink()?>" target="_self">view</a>
								</span></span></span></span></span>
								
							</div>
						
						<div class="relatedcontent">
						<div class="portfolio_description "><h5 class="portfolio_title "> 
						<a href="<? the_permalink()?>" target="_self"><?php the_title() ?></a>
						 </h5><p class="vinfo"><?php echo $bedrooms;
								if($beachfront){
								 echo " | ". $beachfront;
								 }
								if($address){
								 echo " | ".$address; 
								}
								?></p>
						<p class="price-info" style="margin-bottom:0px !important;"><?php echo "$".$lowPrices ." - $". $highPrices; ?><span class="vinfo"> per night</span>
						</p>
						
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

<?php 
$map_post = $post;

global $post;

$all_categories = get_the_term_list( get_the_ID(), 'villa_category');

	if ($all_categories) {
		$map_args = array(
			'villa_category' => $all_categories, 
			'post_type' => 'villas',
			'orderby' => 'rand',
			'order' => 'DESC',
			'cache_results' => false,
			'paged' => $paged,
			'post__not_in' => array( $post->ID )
		);
		
		$map_query = new wp_query( $map_args ); 
		
		?>
			
		<?php if( $map_query->have_posts() ) { 
			
			while( $map_query->have_posts() ) {
					$map_query->the_post();
					 
					
					$low_price = $lowPrices = get_post_meta(get_the_ID(), "price_from", true);
					$high_price = $highPrices = get_post_meta(get_the_ID(), "price_to", true);
					$related_lat = get_post_meta(get_the_ID(), "latitude", true);
					$related_long = get_post_meta(get_the_ID(), "longitude", true);
					$addr = get_post_meta(get_the_ID(), "address", true);
					$icon = 'http://www.hinolincolnshire.co.uk/wp-content/uploads/2015/07/pin_small1.png';
					$related_thumb = get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); 
					
					$title = get_the_title();
					$locations[] = "[ '$title', " . $related_lat .", " .$related_long . ", " . "'$icon']";
					$post_img = '<div class="info_content"><div class="map-thumb" style="width:125px; height: 80px; overflow: hidden;">'.$related_thumb.'</div>';
					$title_add = '<p><a href=" '.get_permalink().' "><b>'.get_the_title().'</b></a></p><p>'.$addr.'</p>';
					$prices = '<p><strong> from US $' .$low_price.' per night</strong></p></div>';
					
					$info[] = "['$post_img $title_add $prices']";
					}
					$locations = vsprintf("%s", implode(",\n ", $locations));
					$infos = vsprintf("%s", implode(",\n ", $info));
				}
		}
$post = $map_post;
wp_reset_query(); ?>