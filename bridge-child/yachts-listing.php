<?php	

$type = "";
$portfolio_qode_like = "";
$portfolio_description_class = "";
$portfolio_box_style = "";
$title_tag = "";
$portfolio_separator = "";
$filter_style = "";
$image_size = "";
$html = "";
$_portfolio_space_class = "";
$_portfolio_masonry_with_space_class = "";
$filter = "";
$category = "";
$_type_class = "";
$order_by = "";
$high_price = "";
$location = "";
$selected_projects = ""; 
$number = "";
$high_price = "";
$location = "";
$category = "";
$highPrice = "";
global $wp_query;

$html .= "";
	$grid_number_of_columns = "gs3";
	$columns="3";
	
	//start html part //

	$html .= "<div class='projects_holder_outer v$columns $_portfolio_space_class $_portfolio_masonry_with_space_class'>";
	if ($filter != "yes") {

		if($type == 'masonry_with_space'){
			$html .= "<div class='filter_outer'>";
			$html .= "<div class='filter_holder'>
				<ul>
				<li class='filter' data-filter='*'><span>" . __('All', 'qode') . "</span></li>";
			if ($category == "") {
				$args = array(
					'parent' => 0
				);
				$portfolio_categories = get_terms('yacht_category', $args);
			} else {
				$top_category = get_term_by('slug', $category, 'yacht_category');
				$term_id = '';
				if (isset($top_category->term_id))
					$term_id = $top_category->term_id;
				$args = array(
					'parent' => $term_id
				);
				$portfolio_categories = get_terms('yacht_category', $args);
			}
			foreach ($portfolio_categories as $yacht_category) {
				$html .= "<li class='filter' data-filter='.yacht_category_$yacht_category->term_id'><span>$yacht_category->name</span>";
				$args = array(
					'child_of' => $yacht_category->term_id
				);
				$html .= '</li>';
			}
			$html .= "</ul></div>";
			$html .= "</div>";

		}else{

			$html .= "<div class='filter_outer'>";
			$html .= "<div class='filter_holder yacht_holder'>
					<ul>
					<li class='filter' data-filter='all'><span". $filter_style .">" . __('All', 'qode') . "</span></li>";
			if ($category == "") {
				$args = array(
					'parent' => 0
				);
				$portfolio_categories = get_terms('yacht_category', $args);
			} else {
				$top_category = get_term_by('slug', $category, 'yacht_category');
				$term_id = '';
				if (isset($top_category->term_id))
					$term_id = $top_category->term_id;
				$args = array(
					'parent' => $term_id
				);
				$portfolio_categories = get_terms('yacht_category', $args);
			}
			foreach ($portfolio_categories as $yacht_category) {
				$html .= "<li class='filter' data-filter='yacht_category_$yacht_category->term_id'><span". $filter_style .">$yacht_category->name</span>";
				$args = array(
					'child_of' => $yacht_category->term_id
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
	
	if ($category == "") {
		$args = array(
			'post_type' => 'yachts',
			'orderby' => $order_by,
			'order' => $order,
			'posts_per_page' => $number,
			'cache_results' => false,
			'paged' => $paged
		);
	}
	if(isset($_POST['high_price'])){
		 $lowPrice = 200;
		 $highPrice = $_POST['high_price'];
		
		$args = array(
			'post_type' => 'yachts',
			'orderby' => $order_by,
			'order' => $order,
			'posts_per_page' => $number,
			'paged' => $paged,
			'meta_key' => 'price_to',
			'meta_query' => array(
				array(
					'key' => 'price_to',
					'value' => array( $lowPrice, $highPrice ),
					'type' => 'numeric',
					'compare' => 'BETWEEN'
				) 
			)
		);
	}	
	if(isset($_POST['location'])){
		$location = $_POST['location'];
		
		$args = array(
			'post_type' => 'yachts',
			'orderby' => $order_by,
			'order' => $order,
			'posts_per_page' => $number,
			'paged' => $paged,
			'meta_key' => 'location',
			'meta_query' => array(
				array(
					'key' => 'location',
					'value' => $location,
					'type' => 'string',
					'compare' => 'LIKE'
				) 
			)
		);
	}
	
	if(isset($_POST['category'])){
		$category = $_POST['category'];
		$category_name = $category." bedrooms";
		$args = array(
			'category_name' => $category_name, 
			'post_type' => 'yachts',
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
		
		$terms = wp_get_post_terms(get_the_ID(), 'yacht_category');
		
		$bedrooms = get_post_meta(get_the_ID(), "bedrooms", true);
		
		$guests = get_post_meta(get_the_ID(), "guest", true);
		
		$address = get_post_meta(get_the_ID(), "address", true);
		
		$private_pool_yacht = get_post_meta(get_the_ID(), "private_pool_yacht", true);
		
		$beachfront = get_post_meta(get_the_ID(), "beachfront", true);
		
		$short_desc = get_post_meta(get_the_ID(), "short_text", true);
		
		$lowPrices = get_post_meta(get_the_ID(), "price_from", true);
		
		$highPrices = get_post_meta(get_the_ID(), "price_to", true);
		
		$rates = get_post_meta(get_the_ID(), "rates", true);
		
		$wording = get_post_meta(get_the_ID(), "wording", true);
		
		$html .= "<article class='mix ";
		foreach ($terms as $term) {
			$html .= "yacht_category_$term->term_id ";
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
			$html .= '<p class="thumb-text yacht-thumb-text">'. $short_desc .'</p>';
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
			if($lowPrices != "" || $highPrices != ""){
			$html .= '<p class="price-info" style="margin-bottom:0px !important;">$'. $lowPrices.' - $'.$highPrices .'<span class="vinfo">'. " per night" .'</span></p>';	
			}
			if($portfolio_separator == "yes"){
				$html .= '<div class="portfolio_separator separator  small ' . $portfolio_separator_aignment . '"></div>';
			}

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
