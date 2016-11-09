<?php
/*
Template Name: Villas By Category
*/ 
?>

<?php
get_header(); ?>
<div class="title_outer title_without_animation" data-height="220">
	<div class="title title_size_small  position_left" style="height:220px;background-color:#F6F6F6;">
		<div class="image not_responsive"></div>
		<div class="title_holder" style="padding-top:134px;height:119px;">
			<div class="container">
				<div class="container_inner clearfix">
					<div class="title_subtitle_holder">
						<div class="title_subtitle_holder_inner">
							<h1><span><?php the_title(); ?></span></h1>
							<div class="breadcrumb"> <div class="breadcrumbs"><div class="breadcrumbs_inner"><a href="<?php echo home_url(); ?>">Home</a><span class="delimiter">&nbsp;&gt;&nbsp;</span><span class="current"><?php the_title(); ?></span></div></div></div>
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
					$portfolio_categories = get_terms('villa_category', $args);
				} else {
					$top_category = get_term_by('slug', $category, 'villa_category');
					$term_id = '';
					if (isset($top_category->term_id))
						$term_id = $top_category->term_id;
					$args = array(
						'parent' => $term_id
					);
					$portfolio_categories = get_terms('villa_category', $args);
				}
				foreach ($portfolio_categories as $villa_category) {
					$html .= "<li class='filter' data-filter='.villa_category_$villa_category->term_id'><span>$villa_category->name</span>";
					$args = array(
						'child_of' => $villa_category->term_id
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
					$portfolio_categories = get_terms('villa_category', $args);
				} else {
					$top_category = get_term_by('slug', $category, 'villa_category');
					$term_id = '';
					if (isset($top_category->term_id))
						$term_id = $top_category->term_id;
					$args = array(
						'parent' => $term_id
					);
					$portfolio_categories = get_terms('villa_category', $args);
				}
				foreach ($portfolio_categories as $villa_category) {
					$html .= "<li class='filter' data-filter='villa_category_$villa_category->term_id'><span". $filter_style .">$villa_category->name</span>";
					$args = array(
						'child_of' => $villa_category->term_id
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
		$category_name = $post_slug=$post->post_name;
	
		if ($category_name) {
			$args = array(
				'villa_category' => $category_name, 
				'post_type' => 'villas',
				'orderby' => $order_by,
				'order' => $order,
				'posts_per_page' => $number,
				'cache_results' => false,
				'paged' => $paged
			);
		}
		if($_POST['high_price']){
			$lowPrice = $_POST['low_price'];
			$highPrice = $_POST['high_price'];
			
			$args = array(
				'post_type' => 'villas',
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
		if($_POST['location']){
			$location = $_POST['location'];
			
			$args = array(
				'post_type' => 'villas',
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
		
		if($_POST['category']){
			$category = $_POST['category'];
			$category_name = $category." bedrooms";
			$args = array(
				'category_name' => $category_name, 
				'post_type' => 'villas',
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
			$terms = wp_get_post_terms(get_the_ID(), 'villa_category');
			$bedrooms = get_post_meta(get_the_ID(), "bedrooms", true);
			$guests = get_post_meta(get_the_ID(), "guest", true);
			$address = get_post_meta(get_the_ID(), "address", true);
			$private_pool_villa = get_post_meta(get_the_ID(), "private_pool_villa", true);
			$beachfront = get_post_meta(get_the_ID(), "beachfront", true);
			$short_desc = get_post_meta(get_the_ID(), "short_text", true);
			$lowPrices = get_post_meta(get_the_ID(), "price_from", true);
			$highPrices = get_post_meta(get_the_ID(), "price_to", true);
			
			$html .= "<article class='mix ";
			foreach ($terms as $term) {
				$html .= "villa_category_$term->term_id ";
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
				if ($lightbox == "") {
					$html .= "<a class='lightbox qbutton small white' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[" . $slug_list_ . "]'>" . __('zoom', 'qode'). "</a>";
				}
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
				if ($lightbox == "yes") {
					$html .= "<a class='lightbox qbutton small white' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[" . $slug_list_ . "]'>" . __('zoom', 'qode'). "</a>";
				}
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
				$html .= '<h5'.$title_tag.' class="portfolio_title "><a href="' . $portfolio_link . '" target="'.$target.'">' . get_the_title() . '</a></'.$title_tag.'h5><p class="vinfo">'.$bedrooms.' | '.$beachfront.' | '.$address.'</p>';
				
				$html .= '<p class="price-info" style="margin-bottom: 0px !important;">$'. $lowPrices.' - $'.$highPrices .'<span class="vinfo">'. " per night" .'</span></p>';	
				
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
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>                          
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/rangeslider.css">
	
<script>
	jQuery(document).ready(function($){
		// Return Location value By location id
		$("#location").val("<?php echo $location; ?>");
		// Price Range Slider js
		$("#slider").slider({
			disabled: false,
			range: "min",
			value: '<?php echo $highPrice; ?>',
			min: 0,
			max: 5000,
			slide: function( event, ui ) {
				$( ".high_price" ).val( ui.value );
				 $( "#amount" ).html( ui.value );
			}
		});

		var value = $( "#slider" ).slider( "value" );
		$( "#amount" ).html( value );
		$("input").change(function () {
			var value = this.value.substring(1);
			console.log(value);
			$("#slider").slider("value", parseInt(value));
		});
		// Bedrooms Range Slider js
		$("#step_slider").slider({
			disabled: false,
			
			range: "min",
			value: '<?php echo $category; ?>',
			min: 1,
			max: 9,
			slide: function( event, ui ) {
				$( ".category" ).val( ui.value );
				 $( "#step" ).html( ui.value );
			}
		});

		var value = $( "#step_slider" ).slider( "value" );
		$( "#step" ).html( value );
		$("input").change(function () {
			var value = this.value.substring(1);
			console.log(value);
			$("#step_slider").slider("value", parseInt(value));
		});
	});
  
</script>
  
	
<?php get_footer(); ?>
