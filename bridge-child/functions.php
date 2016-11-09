<?php
//$qode_toolbar = true;
//$qode_landing = true;

load_theme_textdomain( 'qode', get_template_directory().'/languages' );

if(isset($qode_toolbar) && $qode_toolbar === true) {
	if (!function_exists('myStartSession')) {
		/**
		 * Function that sets session after theme is activated hook. Hooks to after_setup_theme action
		 */
		function myStartSession() {
			if(!session_id()) {
				session_start();
			}
			if (!empty($_GET['animation'])) {
				$_SESSION['qode_animation'] = $_GET['animation'];
			}

			if (isset($_SESSION['qode_animation']) && $_SESSION['qode_animation'] == "off") {
				$_SESSION['qode_animation'] = "";
			}
		}

		add_action('after_setup_theme', 'myStartSession', 1);
	}

	if (!function_exists('myEndSession')) {
		/**
		 * Function that ends session on wp_login and wp_logout action
		 */
		function myEndSession() {
			session_destroy();
		}

		add_action('wp_logout', 'myEndSession');
		add_action('wp_login', 'myEndSession');
	}
}

add_filter('widget_text', 'do_shortcode');
//add_filter( 'the_excerpt', 'do_shortcode');

include_once('includes/shortcodes/shortcodes.php');



function wp_childTheme_enqueue_scripts() {
	wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
	wp_enqueue_style( 'childstyle' );
	wp_enqueue_style("custom", get_stylesheet_directory_uri(). "/css/custom-layout.css");
	wp_enqueue_style("animate", get_stylesheet_directory_uri(). "/css/animate.css");
	wp_enqueue_style("custom-new", get_stylesheet_directory_uri(). "/css/new.css");
	wp_enqueue_script("parallax", get_stylesheet_directory_uri(). "/js/jquery.parallax.js");
	wp_enqueue_script("ub-script", get_stylesheet_directory_uri(). "/js/ub-script.js");
	// wp_enqueue_script("default-js", get_stylesheet_directory_uri(). "/js/default.js");
	wp_enqueue_script("jquery-touch-punch", get_stylesheet_directory_uri(). "/js/jquery.ui.touch-punch.min.js");
}
add_action( 'wp_enqueue_scripts', 'wp_childTheme_enqueue_scripts', 11);
/*if(!is_page('magazine')){
	function pagination($pages = '', $range = 4){  
		$showitems = ($range * 2)+1;  
 
		global $paged;
		if(empty($paged)) $paged = 1;
 
		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages)
			{
				$pages = 1;
			}
		}   
 
		if(1 != $pages){
			echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
			if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
	 
			for ($i=1; $i <= $pages; $i++){
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
					echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
				}
			}
	 
			if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
			echo "</div>\n";
		}
	}
}*/


function my_mce4_options($init) {
  $default_colours = '"000000", "Black",
                      "993300", "Burnt orange",
                      "333300", "Dark olive",
                      "003300", "Dark green",
                      "003366", "Dark azure",
                      "000080", "Navy Blue",
                      "333399", "Indigo",
                      "333333", "Very dark gray",
                      "800000", "Maroon",
                      "FF6600", "Orange",
                      "808000", "Olive",
                      "008000", "Green",
                      "008080", "Teal",
                      "0000FF", "Blue",
                      "666699", "Grayish blue",
                      "808080", "Gray",
                      "FF0000", "Red",
                      "FF9900", "Amber",
                      "99CC00", "Yellow green",
                      "339966", "Sea green",
                      "33CCCC", "Turquoise",
                      "3366FF", "Royal blue",
                      "800080", "Purple",
                      "999999", "Medium gray",
                      "FF00FF", "Magenta",
                      "FFCC00", "Gold",
                      "FFFF00", "Yellow",
                      "00FF00", "Lime",
                      "00FFFF", "Aqua",
                      "00CCFF", "Sky blue",
                      "993366", "Red violet",
                      "FFFFFF", "White",
                      "FF99CC", "Pink",
                      "FFCC99", "Peach",
                      "FFFF99", "Light yellow",
                      "CCFFCC", "Pale green",
                      "CCFFFF", "Pale cyan",
                      "99CCFF", "Light sky blue",
					  "CC99FF", "Plum"';
					 

  $custom_colours =  '"E14D43", "Color 1 Name",
                      "D83131", "Color 2 Name",
                      "ED1C24", "Color 3 Name",
                      "F99B1C", "Color 4 Name",
                      "50B848", "Color 5 Name",
                      "00A859", "Color 6 Name",
                      "00AAE7", "Color 7 Name",
                      "95ba00", "Custom Green",
					  "e2e2e2", "Custom Gray"';

  // build colour grid default+custom colors
  $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';

  // enable 6th row for custom colours in grid
  $init['textcolor_rows'] = 6;

  return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');


if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'new-size', 350, 257, true ); //(cropped)
}
add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
$addsizes = array(
"new-size" => __( "Custom Thumb")
);
$newsizes = array_merge($sizes, $addsizes);
return $newsizes;
}

	function wpdocs_dequeue_script() {
	if( is_page('magazine') || is_singular('post') ){
       wp_dequeue_script("ajax", QODE_ROOT."/js/ajax.min.js",array(),false,true);
	}
	// wp_dequeue_script("default", QODE_ROOT."/js/default.min.js",array(),false,true);
} 
add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );

/*
function add_rewrite_rules( $wp_rewrite ) 
{
	$new_rules = array(
		'magazine/(.+?)/?$' => 'index.php?post_type=post&name='. $wp_rewrite->preg_index(1),
	);
 
	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'add_rewrite_rules');
 
function change_blog_links($post_link, $id=0){
 
	$post = get_post($id);
 
	if( is_object($post) && $post->post_type == 'post'){
		return home_url('/magazine/'. $post->post_name.'/');
	}
 
	return $post_link;
}
add_filter('post_link', 'change_blog_links', 1, 3);

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
*/

define('MY_WORDPRESS_FOLDER',$_SERVER['DOCUMENT_ROOT']);
define('MY_THEME_FOLDER',str_replace("\\",'/',dirname(__FILE__)));
define('MY_THEME_PATH','/' . substr(MY_THEME_FOLDER,stripos(MY_THEME_FOLDER,'wp-content')));
 
add_action('admin_init','my_meta_init');
 
function my_meta_init()
{
    // review the function reference for parameter details
    // http://codex.wordpress.org/Function_Reference/wp_enqueue_script
    // http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 
    //wp_enqueue_script('my_meta_js', MY_THEME_PATH . '/custom/meta.js', array('jquery'));
    wp_enqueue_style('my_meta_css', MY_THEME_PATH . '/custom/meta.css');
 
    // review the function reference for parameter details
    // http://codex.wordpress.org/Function_Reference/add_meta_box
 
    // add a meta box for each of the wordpress page types: posts and pages
    foreach (array('post','page') as $type) 
    {
        add_meta_box('my_all_meta', 'Title Meta Box', 'my_meta_setup', $type, 'normal', 'high');
    }
     
    // add a callback function to save any data a user enters in
    add_action('save_post','my_meta_save');
}
 
function my_meta_setup()
{
    global $post;
  
    // using an underscore, prevents the meta variable
    // from showing up in the custom fields section
    $meta = get_post_meta($post->ID,'_my_meta',TRUE);
  
    // instead of writing HTML here, lets do an include
    include(MY_THEME_FOLDER . '/custom/meta.php');
  
    // create a custom nonce for submit verification later
    echo '<input type="hidden" name="my_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}
  
function my_meta_save($post_id) 
{
    // authentication checks
 
    // make sure data came from our meta box
    if (!wp_verify_nonce($_POST['my_meta_noncename'],__FILE__)) return $post_id;
 
    // check user permissions
    if ($_POST['post_type'] == 'page') 
    {
        if (!current_user_can('edit_page', $post_id)) return $post_id;
    }
    else
    {
        if (!current_user_can('edit_post', $post_id)) return $post_id;
    }
 
    // authentication passed, save data
 
    // var types
    // single: _my_meta[var]
    // array: _my_meta[var][]
    // grouped array: _my_meta[var_group][0][var_1], _my_meta[var_group][0][var_2]
 
    $current_data = get_post_meta($post_id, '_my_meta', TRUE);  
  
    $new_data = $_POST['_my_meta'];
 
    my_meta_clean($new_data);
     
    if ($current_data) 
    {
        if (is_null($new_data)) delete_post_meta($post_id,'_my_meta');
        else update_post_meta($post_id,'_my_meta',$new_data);
    }
    elseif (!is_null($new_data))
    {
        add_post_meta($post_id,'_my_meta',$new_data,TRUE);
    }
 
    return $post_id;
}
 
function my_meta_clean(&$arr)
{
    if (is_array($arr))
    {
        foreach ($arr as $i => $v)
        {
            if (is_array($arr[$i])) 
            {
                my_meta_clean($arr[$i]);
 
                if (!count($arr[$i])) 
                {
                    unset($arr[$i]);
                }
            }
            else
            {
                if (trim($arr[$i]) == '') 
                {
                    unset($arr[$i]);
                }
            }
        }
 
        if (!count($arr)) 
        {
            $arr = NULL;
        }
    }
}
 
 function register_left_menu() {
  register_nav_menu('left-top-navigation',__( 'Left Top Navigation' ));
}
add_action( 'init', 'register_left_menu' );

function register_right_menu() {
  register_nav_menu('right-top-navigation',__( 'Right Top Navigation' ));
}
add_action( 'init', 'register_right_menu' );
 
  add_action( 'init', 'create_magazine_category' );

function create_magazine_category() {
    register_taxonomy(
        'magazine_category',
        'post',
        array(
            'labels' => array(
                'name' => 'Magazine Categories',
                'add_new_item' => 'Add New Magazine Category',
                'new_item_name' => "New Magazine Type Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
			'rewrite' => array('slug' => 'categories')
        )
    );
}

//add_filter('widget_tag_cloud_args','display_custom_tax');
    function display_custom_tax($args) {
    $args = array(
        'taxonomy'  => array('magazine_category'), 
		);
return $args;
}
 
add_filter('widget_tag_cloud_args','single_post_tag_cloud_tags');
function single_post_tag_cloud_tags($args) {
if( is_single() ) {
global $post;
$post_tag_ids = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
$args = array('include' => implode(',',$post_tag_ids));
}
return $args; }
 
 // First we create a function
function list_terms_custom_taxonomy( $atts ) {
	
// Inside the function we extract custom taxonomy parameter of our shortcode

	extract( shortcode_atts( array(
		'custom_taxonomy' => '',
	), $atts ) );

// arguments for function wp_list_categories
$args = array( 
taxonomy => $custom_taxonomy,
title_li => 'Categories'
);

// We wrap it in unordered list 
echo '<div class="widget widget_tag_cloud posts_holder">'; 
echo '<div class="tagcloud">'; 
echo wp_list_categories($args);
echo '</div>';
echo '</div>';
}

// Add a shortcode that executes our function
add_shortcode( 'ct_terms', 'list_terms_custom_taxonomy' );

//Allow Text widgets to execute shortcodes

add_filter('widget_text', 'do_shortcode');
 
/*
* Rename Uncategorized name and slug
*/
 
 wp_update_term(1, 'category', array(
  'name' => 'All',
  'slug' => 'all'
));


// retrieves the attachment ID from the file URL
function wp_get_image_id($image_url = "") {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}
function company_logos() {
  $logos = "";
  $logos .= '<div class="qode_carousels">';
  $logos .= '<ul class="company-logos">';
  $logos .= '<li class="item" style="width: 181px;">';
  $logos .= '<div class="carousel_item_holder"><span class="first_image_holder has_hover_image"><img src="'.get_stylesheet_directory_uri(). '/img/company-logos/logo-1.png'.'" alt="carousel image"></span>';
  $logos .= '</li>';
  $logos .= '<li class="item" style="width: 181px;">';
  $logos .= '<div class="carousel_item_holder"><span class="first_image_holder has_hover_image"><img src="'.get_stylesheet_directory_uri(). '/img/company-logos/logo-5.png'.'" alt="carousel image"></span>';
  $logos .= '</li>';
  $logos .= '<li class="item" style="width: 181px;">';
  $logos .= '<div class="carousel_item_holder"><span class="first_image_holder has_hover_image"><img src="'.get_stylesheet_directory_uri(). '/img/company-logos/logo-3.png'.'" alt="carousel image"></span>';
  $logos .= '</li>';
  $logos .= '<li class="item" style="width: 181px;">';
  $logos .= '<div class="carousel_item_holder"><span class="first_image_holder has_hover_image"><img src="'.get_stylesheet_directory_uri(). '/img/company-logos/logo-4.png'.'" alt="carousel image"></span>';
  $logos .= '</li>';
  $logos .= '<li class="item" style="width: 181px;">';
  $logos .= '<div class="carousel_item_holder"><span class="first_image_holder has_hover_image"><img src="'.get_stylesheet_directory_uri(). '/img/company-logos/logo-2.png'.'" alt="carousel image">';
  $logos .= '</li>';
  $logos .= '<li class="item" style="width: 181px;">';
  $logos .= '<div class="carousel_item_holder"><span class="first_image_holder has_hover_image"><img src="'.get_stylesheet_directory_uri(). '/img/company-logos/logo-6.png'.'" alt="carousel image"></span>';
  $logos .= '</li>';
  $logos .= '</ul>';$logos .= '</div>';
  return $logos;
}

add_shortcode('company-logo', 'company_logos');
/*
function wp_get_post_id($post_title = "")  {
	global $wpdb;
	$postid = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_title = '" . $post_title . "'" );
	return $postid;
}
*/

add_action('init', 'start_session');
function start_session() {
    if(!session_id()) {
        session_start();
    }
}

add_filter('body_class','my_class_names');
function my_class_names($classes) {
    if (! ( is_user_logged_in() ) ) {
        $classes[] = 'not-logged';
    }
    return $classes;
}

add_action( "save_post", "eg_create_sitemap" );   
function eg_create_sitemap() {
    $postsForSitemap = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'modified',
        'post_type'   => array( 'post', 'page', 'villas', 'retreats', 'yachts' ),
        'order'       => 'DESC'
    ) );
    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
    $sitemap .= "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";    
    foreach( $postsForSitemap as $post ) {
        setup_postdata( $post );   
        $postdate = explode( " ", $post->post_modified );   
        $sitemap .= "\t" . '<url>' . "\n" .
            "\t\t" . '<loc>' . get_permalink( $post->ID ) . '</loc>' .
            "\n\t\t" . '<lastmod>' . $postdate[0] . '</lastmod>' .
            "\n\t\t" . '<changefreq>monthly</changefreq>' .
            "\n\t" . '</url>' . "\n";
    }
	$custom_terms = get_terms('magazine_category');

	foreach($custom_terms as $custom_term) {
				
				setup_postdata( $custom_term );   
				$term_link = get_term_link( $custom_term );
				$termdate = explode( " ", $custom_term->term_modified );   
				$sitemap .= "\t" . '<url>' . "\n" .
				"\t\t" . '<loc>' . $term_link . '</loc>' .
				"\n\t\t" . '<lastmod>2016-02-08</lastmod>' .
				"\n\t\t" . '<changefreq>weekly</changefreq>' .
				"\n\t" . '</url>' . "\n";	
			
		 
	}
    $sitemap .= '</urlset>';     
    $fp = fopen( ABSPATH . "sitemap.xml", 'w' );
    fwrite( $fp, $sitemap );
    fclose( $fp );
}

?>