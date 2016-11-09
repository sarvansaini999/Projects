<?php
get_header('archive'); 

global $wp_query;
$id = $wp_query->get_queried_object_id();
$slug = get_query_var( 'term' );
 $term = get_term_by('slug', $slug, 'retreat_category'); 
  $category_name = $slug; 
    
?>
<div class="title_outer title_without_animation" data-height="735">
	
	<div class="background-fixed title title_size_large  position_center  has_background" style="padding-top:100px;height:635px; background:url('http://www.hinolincolnshire.co.uk/wp-content/uploads/2015/04/Bali-Retreats.jpg') !important;background-attachment: fixed !important;background-size: 1920px auto;background-repeat: no-repeat !important;background-position: center 0 !important;">
		<div class="image not_responsive"><img src="http://www.hinolincolnshire.co.uk/wp-content/uploads/2015/04/Bali-Retreats.jpg"/></div>
		<div class="title_holder" style="padding-top:100px;height:629px;">
			<h1 class="archive-page-title  booking-page-title"><span class="breadcrumb_title"><?php echo $term->name ?></span></h1>
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
<div class="container">
	<div class="container_inner default_template_holder clearfix page_container_inner">
		
		<br/>
		<br/>
		<div class="wpb_row section vc_row-fluid" style=" text-align:left;">
		  <div class=" full_section_inner clearfix">
			<div class="vc_span12 wpb_column column_container ">
			  <div class="wpb_wrapper">
<?php	

	global $wp_query;
    $html .= "";
		$grid_number_of_columns = "gs3";
		$columns="3";
		
		//start html part //
	
		$html .= "<div class='projects_holder_outer v$columns $_portfolio_space_class $_portfolio_masonry_with_space_class'>";
		if ($filter == "yes") {

			if($type == 'masonry_with_space'){
				$html .= "<div class='filter_outer'>";
				$html .= "<div class='filter_holder'>
					<ul>
					<li class='filter' data-filter='*'><span>" . __('All', 'qode') . "</span></li>";
				if ($category == "") {
					$args = array(
						'parent' => 0
					);
					$portfolio_categories = get_terms('retreat_category', $args);
				} else {
					$top_category = get_term_by('slug', $category, 'retreat_category');
					$term_id = '';
					if (isset($top_category->term_id))
						$term_id = $top_category->term_id;
					$args = array(
						'parent' => $term_id
					);
					$portfolio_categories = get_terms('retreat_category', $args);
				}
				foreach ($portfolio_categories as $retreat_category) {
					$html .= "<li class='filter' data-filter='.villa_category_$retreat_category->term_id'><span>$retreat_category->name</span>";
					$args = array(
						'child_of' => $retreat_category->term_id
					);
					$html .= '</li>';
				}
				$html .= "</ul></div>";
				$html .= "</div>";

			}else{

				$html .= "<div class='filter_outer'>";
				$html .= "<div class='filter_holder'>
						<ul>
						<li class='filter' data-filter='all'><span". $filter_style .">" . __('All', 'qode') . "</span></li>";
				if ($category == "") {
					$args = array(
						'parent' => 0
					);
					$portfolio_categories = get_terms('retreat_category', $args);
				} else {
					$top_category = get_term_by('slug', $category, 'retreat_category');
					$term_id = '';
					if (isset($top_category->term_id))
						$term_id = $top_category->term_id;
					$args = array(
						'parent' => $term_id
					);
					$portfolio_categories = get_terms('retreat_category', $args);
				}
				foreach ($portfolio_categories as $retreat_category) {
					$html .= "<li class='filter' data-filter='villa_category_$retreat_category->term_id'><span". $filter_style .">$retreat_category->name</span>";
					$args = array(
						'child_of' => $retreat_category->term_id
					);
					$html .= '</li>';
				}
				$html .= "</ul></div>";
				$html .= "</div>";
			}
		}

		$thumb_size_class = "";
		//get proper image size
		switch($image_size) {
			case 'landscape':
				$thumb_size_class = 'portfolio_landscape_image';
				break;
			case 'portrait':
				$thumb_size_class = 'portfolio_portrait_image';
				break;
			case 'square':
				$thumb_size_class = 'portfolio_square_image';
				break;
			default:
				$thumb_size_class = 'portfolio_full_image';
				break;
		}

		$html .= "<div class='projects_holder  clearfix v$columns$_type_class $thumb_size_class'>\n";
		if (get_query_var('paged')) {
			$paged = get_query_var('paged');
		} elseif (get_query_var('page')) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
		//$category_name = $post_slug=$post->post_name;
	
		if ($category_name) {
			$args = array(
				'retreat_category' => $category_name, 
				'post_type' => 'retreats',
				'orderby' => $order_by,
				'order' => $order,
				'posts_per_page' => $number,
				'cache_results' => false,
				'paged' => $paged
			);
		}
		
		$project_ids = null;
		if ($selected_projects != "") {
			$project_ids = explode(",", $selected_projects);
			$args['post__in'] = $project_ids;
		}
		query_posts($args);
		if (have_posts()) : while (have_posts()) : the_post();
		$terms = wp_get_post_terms(get_the_ID(), 'category');
		
		$terms = wp_get_post_terms(get_the_ID(), 'retreat_category');
		
		$bedrooms = get_post_meta(get_the_ID(), "bedrooms", true);
		
		$guests = get_post_meta(get_the_ID(), "guest", true);
		
		$address = get_post_meta(get_the_ID(), "address", true);
		
		$private_pool_retreat = get_post_meta(get_the_ID(), "private_pool_retreat", true);
		
		$beachfront = get_post_meta(get_the_ID(), "beachfront", true);
		
		$short_desc = get_post_meta(get_the_ID(), "short_text", true);
		
		$lowPrices = get_post_meta(get_the_ID(), "price_from", true);
		
		$highPrices = get_post_meta(get_the_ID(), "price_to", true);
		$rates = get_post_meta(get_the_ID(), "rates", true);
		$wording = get_post_meta(get_the_ID(), "wording", true);
		
		$html .= "<article class='mix ";
		foreach ($terms as $term) {
			$html .= "retreat_category_$term->term_id ";
		}

		$title = get_the_title();
		$featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size
		$large_image = $featured_image_array[0];
		$slug_list_ = "pretty_photo_gallery";

		//get proper image size
		switch($image_size) {
			case 'landscape':
				$thumb_size = 'portfolio-landscape';
				break;
			case 'portrait':
				$thumb_size = 'portfolio-portrait';
				break;
			case 'square':
				$thumb_size = 'portfolio-square';
				break;
			default:
				$thumb_size = 'full';
				break;
		}

		if($type == "masonry_with_space"){
			$thumb_size = 'portfolio_masonry_with_space';
		}

		$custom_portfolio_link = get_post_meta(get_the_ID(), 'qode_portfolio-external-link', true);
		$portfolio_link = $custom_portfolio_link != "" ? $custom_portfolio_link : get_permalink();
		$target = $custom_portfolio_link != "" ? '_blank' : '_self';

		$html .="'>";

		$html .= "<div class='image_holder '>";
		$html .= "<a class='portfolio_link_for_touch' href='".$portfolio_link."' target='".$target."'>";
		$html .= "<span class='image'>";
		$html .= get_the_post_thumbnail(get_the_ID(), $thumb_size);
		$html .= "</span>";
		$html .= "</a>";

		if ($type == "" ) {
			$html .= "<span class='text_holder'>";
			$html .= "<span class='text_outer'>";
			$html .= "<span class='text_inner'>";
			$html .= "<span class='feature_holder'>";
			$html .= '<span class="feature_holder_icons">';
			$html .= '<p class="thumb-text retreat-thumb-text">'. $short_desc .'</p>';
			$html .= "<a class='preview qbutton small white' href='" . $portfolio_link . "' target='".$target."'>" . __('view', 'qode'). "</a>";
			if ($portfolio_qode_like == "on") {
				$html .= "<span class='portfolio_like qbutton small white'>";
				$portfolio_project_id = get_the_ID();

				if (function_exists('qode_like_portfolio_list')) {
					$html .= qode_like_portfolio_list();
				}
				$html .= "</span>";
			}
			$html .= "</span>";
			$html .= "</span></span></span></span>";


		} else if ($type == "hover_text" || $type == "hover_text_no_space") {

			$html .= "<span class='text_holder'>";
			$html .= "<span class='text_outer'>";
			$html .= "<span class='text_inner'>";
			$html .= '<div class="hover_feature_holder_title"><div class="hover_feature_holder_title_inner">';
			$html .= '<'.$title_tag.' class="portfolio_title"><a href="' . $portfolio_link . '" target="'.$target.'">' . get_the_title() . '</a></'.$title_tag.'>';
			if($portfolio_separator == "yes"){
				$html .= '<div class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
			}
			$html .= '<span class="project_category">';
			$k = 1;
			foreach ($terms as $term) {
				$html .= "$term->name";
				if (count($terms) != $k) {
					$html .= ', ';
				}
				$k++;
			}
			$html .= '</span></div></div>';
			$html .= "<span class='feature_holder'>";
			$html .= '<span class="feature_holder_icons">';
			$html .= '<p class="thumb-text">'. $short_desc .'</p>';
			$html .= "<a class='preview qbutton small white' href='" . $portfolio_link . "' target='".$target."'>" . __('view', 'qode'). "</a>";
			if ($portfolio_qode_like == "on") {
				$html .= "<span class='portfolio_like qbutton small white'>";
				$portfolio_project_id = get_the_ID();

				if (function_exists('qode_like_portfolio_list')) {
					$html .= qode_like_portfolio_list();
				}
				$html .= "</span>";
			}
			$html .= "</span>";
			$html .= "</span></span></span></span>";


		}
		$html .= "</div>";
		if ($type == "" ) {
			$html .= "<div class='portfolio_description ".$portfolio_description_class."'". $portfolio_box_style .">";
			$html .= '<h5'.$title_tag.' class="portfolio_title "><a href="' . $portfolio_link . '" target="'.$target.'">' . get_the_title() . '</a></'.$title_tag.'></h5>';
			if($wording != "" || $address != ""){
				$html .= '<p class="vinfo">';
				if($wording != ""){ 
					$html .= ''.$wording.' | '; 
				}
				if($address != ""){
				$html .=  $address;
				}
				$html .= '</p>';
			}			
			if($rates != ""){ 
				$html .= '<p class="price-info" style="margin: 11px 0px 11px 0px !important;">'.$rates.'</p>';
			}
			if($lowPrices && $highPrices){
				$html .= '<p class="price-info" style="margin-bottom:0px !important;">$'. $lowPrices.' - $'.$highPrices .'<span class="vinfo">'. " per night" .'</span></p>';	
			}
			if($portfolio_separator == "yes"){
				$html .= '<div class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
			}

			/* $html .= '<span class="project_category">';
			$k = 1;
			foreach ($terms as $term) {
				$html .= "$term->name";
				if (count($terms) != $k) {
					$html .= ', ';
				}
				$k++;
			}
			$html .= '</span>'; */
			$html .= '</div>';
		}

		$html .= "</article>\n";
	
	endwhile;

		$i = 1;
		while ($i <= $columns) {
			$i++;
			if ($columns != 1) {
				$html .= "<div class='filler'></div>\n";
			}
		}

	else:
		?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'qode'); ?></p>
	<?php
	endif;
	
	
	$html .= "</div>";
	
	if (get_next_posts_link()) {
		if ($show_load_more == "yes" || $show_load_more == "") {
			$html .= '<div class="portfolio_paging"><span rel="' . $wp_query->max_num_pages . '" class="load_more">' . get_next_posts_link(__('Show more', 'qode')) . '</span></div>';
			$html .= '<div class="portfolio_paging_loading"><a href="javascript: void(0)" class="qbutton">'.__('Loading...', 'qode').'</a></div>';
		}
	}
	 
	$html .= "</div><br/><br/>";
	
	wp_reset_query();

echo $html;
?>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>                          
<?php get_footer(); ?>
