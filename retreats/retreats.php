<?php
/*
Plugin Name: Retreats
Description: Declares a plugin that will create a custom post type
Version: 1.0
*/

add_action( 'init', 'create_retreat_category' );



function create_retreat_category() {
    register_taxonomy(
        'retreat_category',
        'retreats',
        array(
            'labels' => array(
                'name' => 'Retreat Categories',
                'add_new_item' => 'Add New Retreat Category',
                'new_item_name' => "New Retreat Type Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
			'rewrite'      => array('slug' => 'retreat-category', 'with_front' => false) 
        )
    );
}
add_action( 'init', 'create_retreat' );	
function create_retreat() {
	register_post_type( 'retreats',
		array(
			'labels' => array(
				'name' => 'Retreats',
				'singular_name' => 'Retreat',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Retreat',
				'edit' => 'Edit',
				'edit_item' => 'Edit Retreat',
				'new_item' => 'New Retreat',
				'view' => 'View',
				'view_item' => 'View Retreat',
				'search_items' => 'Search Retreats',
				'not_found' => 'No Retreats found',
				'not_found_in_trash' =>
				'No Retreats found in Trash',
				'parent' => 'Parent Retreat'
			),
			'public' => true,
			'menu_position' => 15,
			'supports' =>
			array( 'title', 'editor', 'comments',
			'thumbnail', 'wpb-visual-composer', 'revisions'  ),
			'taxonomies' => array( '' ),
			'rewrite' => array( 'with_front' => false, 'slug' => 'bali-retreats' ),
			'taxonomies' => array( 'post_tag', 'category' ),
			'has_archive' => true
			
		)
	);
}

add_action( 'admin_init', 'retreat_admin' );




function retreat_admin() {
	add_meta_box( 'retreat_meta_box',
		'Retreat Details',
		'display_retreat_meta_box',
		'retreats', 'normal', 'high' 
	);
	
	add_meta_box( 'retreat_meta_box_slider',
		'Retreat Slider Images',
		'display_retreat_meta_box_slider',
		'retreats', 'normal', 'high' 
	);
	
	add_meta_box( 'retreat_meta_box_thumb',
		'Retreat Image Thumb',
		'display_retreat_meta_box_thumb',
		'retreats', 'normal', 'high' 
	);
	
	add_meta_box( 'retreat_meta_box_program',
		'Retreat Programs',
		'display_retreat_meta_box_program',
		'retreats', 'normal', 'high' 
	);
}


function display_retreat_meta_box_slider( $retreat ) {

	/*
	* initalize
	*/
	$_first_image = '';
	$_first_image_title = '';
	$_first_image_alternate = '';
	
	$_second_image = '';
	$_second_image_title = '';
	$_first_image_alternate = '';
	
	$_third_image = '';
	$_third_image_title = '';
	$_first_image_alternate = '';
	
	$_fourth_image = '';
	$_fourth_image_title = '';
	$_first_image_alternate = '';
	
	$_fifth_image = '';
	$_fifth_image_title = '';
	$_first_image_alternate = '';
	
	$_first_image =  get_post_meta( $retreat->ID, 'first_image', true );
	
	$_first_image_title =  get_post_meta( $retreat->ID, 'first_image_title', true );
	
	$_first_image_alternate =  get_post_meta( $retreat->ID, 'first_image_alternate', true );
	
	$_second_image =  get_post_meta( $retreat->ID, 'second_image', true );
	
	$_second_image_title =  get_post_meta( $retreat->ID, 'second_image_title', true );
	
	$_second_image_alternate =  get_post_meta( $retreat->ID, 'second_image_alternate', true );
	
	$_third_image =  get_post_meta( $retreat->ID, 'third_image', true );
	
	$_third_image_title =  get_post_meta( $retreat->ID, 'third_image_title', true );
	
	$_third_image_alternate =  get_post_meta( $retreat->ID, 'third_image_alternate', true );
	
	$_fourth_image =  get_post_meta( $retreat->ID, 'fourth_image', true );
	
	$_fourth_image_title =  get_post_meta( $retreat->ID, 'fourth_image_title', true );
	
	$_fourth_image_alternate =  get_post_meta( $retreat->ID, 'fourth_image_alternate', true );
	
	$_fifth_image =  get_post_meta( $retreat->ID, 'fifth_image', true );
	
	$_fifth_image_title =  get_post_meta( $retreat->ID, 'fifth_image_title', true );
	
	$_fifth_image_alternate =  get_post_meta( $retreat->ID, 'fifth_image_alternate', true ); 
	
	$_six_image =  get_post_meta( $retreat->ID, 'six_image', true );
	
	$_six_image_title =  get_post_meta( $retreat->ID, 'six_image_title', true );
	
	$_six_image_alternate =  get_post_meta( $retreat->ID, 'six_image_alternate', true );
	
	$_seven_image =  get_post_meta( $retreat->ID, 'seven_image', true );
	
	$_seven_image_title =  get_post_meta( $retreat->ID, 'seven_image_title', true );
	
	$_seven_image_alternate =  get_post_meta( $retreat->ID, 'seven_image_alternate', true );
	
	$_eight_image =  get_post_meta( $retreat->ID, 'eight_image', true );
	
	$_eight_image_title =  get_post_meta( $retreat->ID, 'eight_image_title', true );
	
	$_eight_image_alternate =  get_post_meta( $retreat->ID, 'eight_image_alternate', true );
	
	$_first_image_id = wp_get_image_id($_first_image);
	$_second_image_id = wp_get_image_id($_second_image);
	$_third_image_id = wp_get_image_id($_third_image);
	$_fourth_image_id = wp_get_image_id($_fourth_image);
	$_fifth_image_id = wp_get_image_id($_fifth_image);
	$_six_image_id = wp_get_image_id($_six_image);
	$_seven_image_id = wp_get_image_id($_seven_image);
	$_eight_image_id = wp_get_image_id($_eight_image);
	
	$_first_image_title = get_the_title($_first_image_id);
	$_second_image_title = get_the_title($_second_image_id);
	$_third_image_title = get_the_title($_third_image_id);
	$_fourth_image_title = get_the_title($_fourth_image_id);
	$_fifth_image_title = get_the_title($_fifth_image_id);
	$_six_image_title = get_the_title($_six_image_id);
	$_seven_image_title = get_the_title($_seven_image_id);
	$_eight_image_title = get_the_title($_eight_image_id);
	
	$_first_image_alternate = get_post_meta($_first_image_id, '_wp_attachment_image_alt', true);
	$_second_image_alternate = get_post_meta($_second_image_id, '_wp_attachment_image_alt', true);
	$_third_image_alternate = get_post_meta($_third_image_id, '_wp_attachment_image_alt', true);
	$_fourth_image_alternate = get_post_meta($_fourth_image_id, '_wp_attachment_image_alt', true);
	$_fifth_image_alternate = get_post_meta($_fifth_image_id, '_wp_attachment_image_alt', true);
	$_six_image_alternate = get_post_meta($_six_image_id, '_wp_attachment_image_alt', true);
	$_seven_image_alternate = get_post_meta($_seven_image_id, '_wp_attachment_image_alt', true);
	$_eight_image_alternate = get_post_meta($_eight_image_id, '_wp_attachment_image_alt', true);
	
	?>
	
	<div class="images-gallery">
			<p><strong>First Image</strong></p>
			<p>
				<input type="text" size="80" id="first_upload_image" name="upload_first_image" placeholder="Upload First Image" value="<?php echo $_first_image ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="first_image_title_name" size="80" placeholder="First Image Title" value="<?php echo $_first_image_title; ?>" /></p>
			<p><input type="text" name="first_alternate" size="80" placeholder="Alternate Text For First Image" value="<?php echo $_first_image_alternate; ?>"></p>
		</div>
		<div class="images-gallery">		
			<p><strong>Second Image</strong></p>
			<p>
				<input type="text" size="80" id="second_upload_image" name="upload_second_image" placeholder="Upload Second Image" value="<?php echo $_second_image ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="second_image_title_name" size="80" placeholder="Second Image Title" value="<?php echo $_second_image_title; ?>" /></p>
			<p><input type="text" name="second_alternate" size="80" placeholder="Alternate Text For Second Image" value="<?php echo $_second_image_alternate; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Third Image</strong></p>
			<p>
				<input type="text" size="80" id="third_upload_image" name="upload_third_image" placeholder="Upload Third Image" value="<?php echo $_third_image ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="third_image_title_name" size="80" placeholder="Third Image Title" value="<?php echo $_third_image_title; ?>" /></p>
			<p><input type="text" name="third_alternate" size="80" placeholder="Alternate Text For Third Image" value="<?php echo $_third_image_alternate; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Fourth Image</strong></p>
			<p>
				<input type="text" size="80" id="fourth_upload_image" name="upload_fourth_image" placeholder="Upload Fourth Image" value="<?php echo $_fourth_image ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="fourth_image_title_name" size="80" placeholder="Fourth Image Title" value="<?php echo $_fourth_image_title; ?>" /></p>
			<p><input type="text" name="fourth_alternate" size="80" placeholder="Alternate Text For Fourth Image" value="<?php echo $_fourth_image_alternate; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Fifth Image</strong></p>
			<p>
				<input type="text" size="80" id="fifth_upload_image" name="upload_fifth_image" placeholder="Upload Fifth Image" value="<?php echo $_fifth_image ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="fifth_image_title_name" size="80" placeholder="Fifth Image Title" value="<?php echo $_fifth_image_title; ?>" /></p>
			<p><input type="text" name="fifth_alternate" size="80" placeholder="Alternate Text For Fifth Image" value="<?php echo $_fifth_image_alternate; ?>"></p>
		</div> 
		
		<div class="images-gallery">	
			<p><strong>Sixth Image</strong></p>
			<p>
				<input type="text" size="80" id="six_upload_image" name="upload_six_image" placeholder="Upload Six Image" value="<?php echo $_six_image ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="six_image_title_name" size="80" placeholder="Six Image Title" value="<?php echo $_six_image_title; ?>" /></p>
			<p><input type="text" name="six_alternate" size="80" placeholder="Alternate Text For Six Image" value="<?php echo $_six_image_alternate; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Seventh Image</strong></p>
			<p>
				<input type="text" size="80" id="seven_upload_image" name="upload_seven_image" placeholder="Upload Seven Image" value="<?php echo $_seven_image ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="seven_image_title_name" size="80" placeholder="Seven Image Title" value="<?php echo $_seven_image_title; ?>" /></p>
			<p><input type="text" name="seven_alternate" size="80" placeholder="Alternate Text For Seven Image" value="<?php echo $_seven_image_alternate; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Eighth Image</strong></p>
			<p>
				<input type="text" size="80" id="eight_upload_image" name="upload_eight_image" placeholder="Upload Eight Image" value="<?php echo $_eight_image ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="eight_image_title_name" size="80" placeholder="Eight Image Title" value="<?php echo $_eight_image_title; ?>" /></p>
			<p><input type="text" name="eight_alternate" size="80" placeholder="Alternate Text For Eight Image" value="<?php echo $_eight_image_alternate; ?>"></p>
		</div>
	
	<?php
}

function display_retreat_meta_box_thumb( $retreat ) {

	$_first_gallery_img = '';
	
	$_second_gallery_img = '';
	
	$_third_gallery_img = '';
	
	$_fourth_gallery_img = '';
	
	$_fifth_gallery_img = '';
	
	$_six_gallery_img = '';
	
	$_seven_gallery_img = '';
	
	$_eight_gallery_img = '';
	
	$_nine_gallery_img = '';
	
	$_first_gallery_img =  get_post_meta( $retreat->ID, 'first_gallery_img', true );
	
	$_second_gallery_img =  get_post_meta( $retreat->ID, 'second_gallery_img', true );
	
	$_third_gallery_img =  get_post_meta( $retreat->ID, 'third_gallery_img', true );
	
	$_fourth_gallery_img =  get_post_meta( $retreat->ID, 'fourth_gallery_img', true );
	
	$_fifth_gallery_img =  get_post_meta( $retreat->ID, 'fifth_gallery_img', true );
	
	$_six_gallery_img =  get_post_meta( $retreat->ID, 'six_gallery_img', true );
	
	$_seven_gallery_img =  get_post_meta( $retreat->ID, 'seven_gallery_img', true );
	
	$_eight_gallery_img =  get_post_meta( $retreat->ID, 'eight_gallery_img', true );
	
	$_nine_gallery_img =  get_post_meta( $retreat->ID, 'nine_gallery_img', true );
	
	$_first_thumb_title =  get_post_meta( $retreat->ID, 'first_thumb_title', true );
	
	$_first_thumb_alt =  get_post_meta( $retreat->ID, 'first_image_thumb_alt', true );
	
	
	
	$_second_thumb_title =  get_post_meta( $retreat->ID, 'second_thumb_title', true );
	
	$_second_thumb_alt =  get_post_meta( $retreat->ID, 'second_image_thumb_alt', true );
	
	
	
	$_third_thumb_title =  get_post_meta( $retreat->ID, 'third_thumb_title', true );
	
	$_third_thumb_alt =  get_post_meta( $retreat->ID, 'third_image_thumb_alt', true );
	
	
	
	$_fourth_thumb_title =  get_post_meta( $retreat->ID, 'fourth_thumb_title', true );
	
	$_fourth_thumb_alt =  get_post_meta( $retreat->ID, 'fourth_image_thumb_alt', true );
	
	
	
	$_fifth_thumb_title =  get_post_meta( $retreat->ID, 'fifth_thumb_title', true );
	
	$_fifth_thumb_alt =  get_post_meta( $retreat->ID, 'fifth_image_thumb_alt', true );
	
	
	
	$_six_thumb_title =  get_post_meta( $retreat->ID, 'six_thumb_title', true );
	
	$_six_thumb_alt =  get_post_meta( $retreat->ID, 'six_image_thumb_alt', true );
	
	
	
	$_seven_thumb_title =  get_post_meta( $retreat->ID, 'seven_thumb_title', true );
	
	$_seven_thumb_alt =  get_post_meta( $retreat->ID, 'seven_image_thumb_alt', true );
	
	
	
	$_eight_thumb_title =  get_post_meta( $retreat->ID, 'eight_thumb_title', true );
	
	$_eight_thumb_alt =  get_post_meta( $retreat->ID, 'eight_image_thumb_alt', true );
	
	$_nine_thumb_title =  get_post_meta( $retreat->ID, 'nine_thumb_title', true );
	
	$_nine_thumb_alt =  get_post_meta( $retreat->ID, 'nine_image_thumb_alt', true );
	
	$_first_gallery_img_id = wp_get_image_id($_first_gallery_img);
	$_second_gallery_img_id = wp_get_image_id($_second_gallery_img);
	$_third_gallery_img_id = wp_get_image_id($_third_gallery_img);
	$_fourth_gallery_img_id = wp_get_image_id($_fourth_gallery_img);
	$_fifth_gallery_img_id = wp_get_image_id($_fifth_gallery_img);
	$_six_gallery_img_id = wp_get_image_id($_six_gallery_img);
	$_seven_gallery_img_id = wp_get_image_id($_seven_gallery_img);
	$_eight_gallery_img_id = wp_get_image_id($_eight_gallery_img);
	$_nine_gallery_img_id = wp_get_image_id($_nine_gallery_img);
	
	
	$_first_thumb_title = get_the_title($_first_gallery_img_id);
	$_second_thumb_title = get_the_title($_second_gallery_img_id);
	$_third_thumb_title = get_the_title($_third_gallery_img_id);
	$_fourth_thumb_title = get_the_title($_fourth_gallery_img_id);
	$_fifth_thumb_title = get_the_title($_fifth_gallery_img_id);
	$_six_thumb_title = get_the_title($_six_gallery_img_id);
	$_seven_thumb_title = get_the_title($_seven_gallery_img_id);
	$_eight_thumb_title = get_the_title($_eight_gallery_img_id);
	$_nine_thumb_title = get_the_title($_nine_gallery_img_id);
	
	$_first_thumb_alt = get_post_meta($_first_gallery_img_id, '_wp_attachment_image_alt', true);
	$_second_thumb_alt = get_post_meta($_second_gallery_img_id, '_wp_attachment_image_alt', true);
	$_third_thumb_alt = get_post_meta($_third_gallery_img_id, '_wp_attachment_image_alt', true);
	$_fourth_thumb_alt = get_post_meta($_fourth_gallery_img_id, '_wp_attachment_image_alt', true);
	$_fifth_thumb_alt = get_post_meta($_fifth_gallery_img_id, '_wp_attachment_image_alt', true);
	$_six_thumb_alt = get_post_meta($_six_gallery_img_id, '_wp_attachment_image_alt', true);
	$_seven_thumb_alt = get_post_meta($_seven_gallery_img_id, '_wp_attachment_image_alt', true);
	$_eight_thumb_alt = get_post_meta($_eight_gallery_img_id, '_wp_attachment_image_alt', true);
	$_nine_thumb_alt = get_post_meta($_nine_gallery_img_id, '_wp_attachment_image_alt', true);
	
	
	?>
	
		<div class="images-gallery">
			<p><strong>First Thumbnails Image</strong></p>
			<p>
				<input type="text" size="80" id="first_gallery_image" name="first_gallery_image" placeholder="Upload First Gallery Image" value="<?php echo $_first_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			
				<input type="text" id="first_thumb_title_name" name="first_thumb_title_name" size="80" placeholder="First Thumb Title" value="<?php echo $_first_thumb_title; ?>" /></p>
			<p><input type="text" name="first_thumb_alt" size="80" placeholder="Alternate Text For First Thumb" value="<?php echo $_first_thumb_alt; ?>"></p>
			
		</div>
		<div class="images-gallery">		
			<p><strong>Second Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="second_gallery_image" name="second_gallery_image" placeholder="Upload Second Gallery Image" value="<?php echo $_second_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			
				<input type="text" id="second_thumb_title_name" name="second_thumb_title_name" size="80" placeholder="Second Thumb Title" value="<?php echo $_second_thumb_title; ?>" /></p>
			<p><input type="text" name="second_thumb_alt" size="80" placeholder="Alternate Text For Second Thumb" value="<?php echo $_second_thumb_alt; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Third Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="third_gallery_image" name="third_gallery_image" placeholder="Upload Third Gallery Image" value="<?php echo $_third_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			
				<input type="text" id="third_thumb_title_name" name="third_thumb_title_name" size="80" placeholder="Third Thumb Title" value="<?php echo $_third_thumb_title; ?>" /></p>
			<p><input type="text" name="third_thumb_alt" size="80" placeholder="Alternate Text For Third Thumb" value="<?php echo $_third_thumb_alt; ?>"></p>
		</div>
		<span class="thumb-heading"><h3>Three Thumbnails above to "Spa"</h3></span>
		<div class="images-gallery">	
			<p><strong>First Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="fourth_gallery_image" name="fourth_gallery_image" placeholder="Upload First Gallery Image" value="<?php echo $_fourth_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			
				<input type="text" id="fourth_thumb_title_name" name="fourth_thumb_title_name" size="80" placeholder="First Thumb Title" value="<?php echo $_fourth_thumb_title; ?>" /></p>
			<p><input type="text" name="fourth_thumb_alt" size="80" placeholder="Alternate Text For First Thumb" value="<?php echo $_fourth_thumb_alt; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Second Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="fifth_gallery_image" name="fifth_gallery_image" placeholder="Upload Second Gallery Image" value="<?php echo $_fifth_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			
				<input type="text" id="fifth_thumb_title_name" name="fifth_thumb_title_name" size="80" placeholder="Second Thumb Title" value="<?php echo $_fifth_thumb_title; ?>" /></p>
			<p><input type="text" name="fifth_thumb_alt" size="80" placeholder="Alternate Text For Second Thumb" value="<?php echo $_fifth_thumb_alt; ?>"></p>
		</div>
		<div class="images-gallery">		
			<p><strong>Third Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="six_gallery_image" name="six_gallery_image" placeholder="Upload Third Gallery Image" value="<?php echo $_six_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			
				<input type="text" id="six_thumb_title_name" name="six_thumb_title_name" size="80" placeholder="Third Thumb Title" value="<?php echo $_six_thumb_title; ?>" /></p>
			<p><input type="text" name="six_thumb_alt" size="80" placeholder="Alternate Text For Third Thumb" value="<?php echo $_six_thumb_alt; ?>"></p>
		</div>
		<span class="thumb-heading"><h3>Three Thumbnail above to "Activities"</h3></span>
		<div class="images-gallery">	
			<p><strong>First Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="seven_gallery_image" name="seven_gallery_image" placeholder="Upload First Gallery Image" value="<?php echo $_seven_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			
				<input type="text" id="seven_thumb_title_name" name="seven_thumb_title_name" size="80" placeholder="First Thumb Title" value="<?php echo $_seven_thumb_title; ?>" /></p>
			<p><input type="text" name="seven_thumb_alt" size="80" placeholder="Alternate Text For First Thumb" value="<?php echo $_seven_thumb_alt; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Second Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="eight_gallery_image" name="eight_gallery_image" placeholder="Upload Second Gallery Image" value="<?php echo $_eight_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			
				<input type="text" id="eight_thumb_title_name" name="eight_thumb_title_name" size="80" placeholder="Second Thumb Title" value="<?php echo $_eight_thumb_title; ?>" /></p>
			<p><input type="text" name="eight_thumb_alt" size="80" placeholder="Alternate Text For Second Thumb" value="<?php echo $_eight_thumb_alt; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Third Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="nine_gallery_image" name="nine_gallery_image" placeholder="Upload Third Gallery Image" value="<?php echo $_nine_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			
				<input type="text" id="nine_thumb_title_name" name="nine_thumb_title_name" size="80" placeholder="Third Thumb Title" value="<?php echo $_nine_thumb_title; ?>" /></p>
			<p><input type="text" name="nine_thumb_alt" size="80" placeholder="Alternate Text For Third Thumb" value="<?php echo $_nine_thumb_alt; ?>"></p>
		</div>
	
<?php
}


function display_retreat_meta_box( $retreat ) {

	/*
	* initalize
	*/
	
	
	$_type = '';
	$_price_from = '';
	$_price_to = '';
	$_wording = '';
	$_rates = '';
	
	$_overview = '';
	$_quick_facts = '';
	$_retreats_packages = '';
	$_inclusion = '';
	
	$_hot_deal = '';
	$_longitude = '';
	
	$_latitude  = '';
	$_address = '';
	
	$_review = '';
	$_program_inclusion = "";
	$_program_overview = "";
	$_program_bottom_overview = "";
	$_short_text = "";
	
	
	
	
	$_price_from = get_post_meta( $retreat->ID,'price_from', true );
	
	$_price_to = get_post_meta( $retreat->ID,'price_to', true );
	
	$_wording = get_post_meta( $retreat->ID,'wording', true );
	
	$_rates= get_post_meta( $retreat->ID,'rates', true );
	
	$_type = get_post_meta( $retreat->ID,'type', true );
	
	$_vibe = get_post_meta ( $retreat->ID,'vibe', true );
	
	$_spa = get_post_meta ( $retreat->ID,'spa', true );
	
	$_accommodation = get_post_meta ( $retreat->ID,'accommodation', true );
	
	$_cuisine = get_post_meta ( $retreat->ID,'cuisine', true );
	
	$_activities = get_post_meta ( $retreat->ID,'activities', true );
	
	$_overview = get_post_meta( $retreat->ID,'overview', true );
	
	$_gallery_link = get_post_meta( $retreat->ID,'gallery_link', true );
	
	$_facilities = get_post_meta( $retreat->ID,'facilities', true );
	
	$_quick_facts = get_post_meta( $retreat->ID,'quick_facts', true );
	
	$_retreats_packages = get_post_meta( $retreat->ID,'retreats_packages', true );
	
	$_inclusion = get_post_meta( $retreat->ID,'inclusion', true );
	
	$_location = get_post_meta( $retreat->ID,'location', true );
	
	$_longitude = get_post_meta( $retreat->ID,'longitude', true );
	
	$_latitude  = get_post_meta( $retreat->ID,'latitude', true );
	
	$_address = get_post_meta( $retreat->ID,'address', true );
	
	$_address = get_post_meta( $retreat->ID,'address', true );
	
	$_location_description = get_post_meta( $retreat->ID,'location_description', true );
	
	$_low_season = get_post_meta( $retreat->ID,'low_season', true );
	
	$_high_season = get_post_meta( $retreat->ID,'high_season', true );
	
	$_peak_season = get_post_meta( $retreat->ID,'peak_season', true );
	
	$_review = get_post_meta( $retreat->ID,'review', true );
	
	$_facebook = get_post_meta( $retreat->ID,'facebook', true );
	
	$_twitter = get_post_meta( $retreat->ID,'twitter', true );
	
	$_video_title = get_post_meta( $retreat->ID,'video_title', true );
	
	$_video_image = get_post_meta( $retreat->ID,'video_image', true );
	
	$_video = get_post_meta( $retreat->ID,'video', true );
	
	$_program_overview = get_post_meta( $retreat->ID, 'program_overview', true );
	
	$_program_bottom_overview = get_post_meta( $retreat->ID, 'program_bottom_overview', true );
	
	$_short_text = get_post_meta( $retreat->ID, 'short_text', true );
	
	$_post_id = $retreat->ID;
	
	$settings = array(
			'textarea_rows' => 8,
			  'tabindex' => 4,
			  'tinymce' => array(
				'theme_advanced_buttons1' => 'bold, italic, ul, pH, temp',
			  ),
			);
		
	?>
		
		<div class="images-gallery">
			<p><strong>Images Gallery URL</strong></p>
			<p>
				<input type="text" size="80" id="gallery_images_link" name="gallery_images_link" placeholder="Please Enter Gallery Page Link" value="<?php echo $_gallery_link ; ?>" />
				
			</p>
		</div>
		<div class="meta-box">
			<p><strong>Low Price [ currency $ ]</strong></p>
			<p><input type="text" size="80" name="price_from_name" value="<?php echo $_price_from; ?>" /></p>
		</div> 
		<div class="meta-box">	
			<p><strong>High Price [ currency $ ]</strong></p>
			<p><input type="text" size="80" name="price_high" value="<?php echo $_price_to; ?>" /></p>
		</div>
		<div class="meta-box">	
			<p><strong>Wording</strong></p>
			<p><input type="text" size="80" name="wording_name" value="<?php echo $_wording; ?>" /></p>
		</div>
		<div class="meta-box">	
			<p><strong>Rates</strong></p>
			<p><input type="text" size="80" name="rates_name" value="<?php echo $_rates; ?>" /></p>
		</div>
		<div class="meta-box">
			<p><strong>Type</strong></p>
			<p>
				<select name="type_name">
				  <?php if(empty($_type)){ ?>
					<option value="0">-Select-</option>
				  <?php } ?>
					<option value="detox retreats" <?php if($_type=="detox retreats") echo 'selected="selected"'; ?> >Detox Retreats</option>
					<option value="yoga retreats" <?php if($_type=="yoga retreats") echo 'selected="selected"'; ?> >Yoga Retreats</option>
					<option value="fitness retreats" <?php if($_type=="fitness retreats") echo 'selected="selected"'; ?> >Fitness Retreats</option>
					<option value="ayurvedic retreats" <?php if($_type=="ayurvedic retreats") echo 'selected="selected"'; ?> >Ayurvedic Retreats</option>
					<option value="healing retreats" <?php if($_type=="healing retreats") echo 'selected="selected"'; ?> >Healing Retreats</option>
					<option value="spa retreats" <?php if($_type=="spa retreats") echo 'selected="selected"'; ?> >Spa Retreats</option>
				</select>
			</p>
		</div>
			
			<p><strong>Overview</strong></p>
			<?php
				wp_editor( $_overview, 'overview_name' );
			?>
			
			<p><strong>The Vibe</strong></p>
			<?php
				wp_editor( $_vibe, 'the_vibe' );
			?>
		
		
		<div id="confirmation-box-night" class="confirmation-box" style="border: 1px solid #e2e2e2; padding: 15px; display:none;">
			<div class="popupConfirmation" id="popupConfirmation">
			<span class="no_delete close-btn">&times;</span>
				<p>Are you sure you want to delete this?</p>
				<input type="hidden" id="confirmation_id" value="" />
				<input class="button-style" type="button" id="yes_delete" Value="Yes"/>
				<input class="no_delete button-style" type="button" id="no_delete" Value="No"/>
			</div>
		</div>

		<div id="confirmation-box-program" class="confirmation-box" style="border: 1px solid #e2e2e2; padding: 15px; display:none;">
			<div class="popupConfirmation" id="popupConfirmation">
			<span class="no_delete_program close-btn">&times;</span>
				<p>Are you sure you want to delete this?</p>
				<input type="hidden" id="confirmationP_id" value="" />
				<input class="button-style" type="button" id="yes_delete_program" Value="Yes"/>
				<input class="no_delete_program button-style" type="button" id="no_delete_program" Value="No"/>
			</div>
		</div>
		
		<div id="confirmation-box-accommo" class="confirmation-box" style="border: 1px solid #e2e2e2; padding: 15px; display:none;">
			<div class="popupConfirmation" id="popupConfirmation">
			<span class="no_delete_accommo close-btn">&times;</span>
				<p>Are you sure you want to delete this?</p>
				<input type="hidden" id="confirmation_accommo" value="" />
				<input class="button-style" type="button" id="yes_delete_accommo" Value="Yes"/>
				<input class="no_delete_accommo button-style" type="button" id="no_delete_accommo" Value="No"/>
			</div>
		</div>
		
		
			<div class="program-container" style="border: 2px solid #e2e2e2; padding: 15px;">
			<h3>Programs Section</h3>
		<p><strong>Program Overview</strong></p>
			<?php
				wp_editor( $_program_overview, 'program_overview_name', $editor_settings );
			?>
			
		<p class="add-program add-new-btn"><input type="button"  id="retreatProgram" value="Add New Program"></p>
		<div class="program" id="retreatProgramForm" style="display:none;">
		<input type="hidden" name="this_retreat_id" id="this_retreat_id" size="80" value="<?php echo $retreat->ID; ?>" />
		<div class="meta-box">	
			<p><strong>Program Title</strong></p>
			<p><input type="text" size="80" name="program_title" id="program_title" value="<?php echo $_program_title; ?>" /></p>
		</div>
		
		<div class="meta-box">	
				<p><strong>Program image</strong></p>
				<p><input type="text" size="80" name="program_image" id="program_image" placeholder="Upload Program Image" value="<?php echo $_program_image; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
		<div class="meta-box">	
				<p><strong>Program Night</strong></p>
				<p><input type="text" size="80" name="program_night" id="program_night" value="<?php echo $_program_night; ?>" /></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Program Address</strong></p>
				<p><input type="text" size="80" name="program_address" id="program_address" value="<?php echo $_program_address; ?>" /></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Program Price</strong></p>
				<p><input type="text" size="80" name="program_price" id="program_price" value="<?php echo $_program_price; ?>" /></p>
			</div>
		
		<p><strong>Program Description</strong></p>
			<?php
				wp_editor( $_program_discription, 'program_discription_name', $editor_settings );
			?>

		
		<p><strong>Inclusion</strong></p>
			<?php
				wp_editor( $_program_inclusion, 'program_inclusion_name', $editor_settings );
				
			?>
			
			
		<p><strong>Program Rates</strong></p>
			<?php
				wp_editor( $_program_rate, 'program_rate', $editor_settings );
				
			?>
			
		<div class="meta-box">	
			<p><strong>Program Dates</strong></p>
			<p><input type="text" size="80" name="program_date" id="program_date" value="<?php echo $_program_date; ?>" /></p>
		</div>
			
		<p class="add-new-btn"><input type="button" class="button-style" name="retreatProgramBtn" id="retreatProgramBtn" value="Save"><input type="button" class="button-style" name="cRetreatProgramBtn" id="cRetreatProgramBtn" value="Cancel"></p>
		</div>
		
		
			<p class="add-program"><span id="showRetreatProgram"><strong>All Programs</strong></span></p>
			<p><span id="retreatProgramsContent" style="color: #fff;"></span></p>
			
			<?php 
		global $wpdb;
		
		$table_name = $wpdb->prefix . "program";
		
		
		$programs_data = $wpdb->get_results( "SELECT * FROM $table_name Where post_id = " .$retreat->ID  );
		?>
			
		<?php foreach ($programs_data as $program_data){ ?>
			
			<p class="add-program"><?php echo $program_data->program_title; ?><input type="hidden" class="toggle"  id="toggle" value="<?php echo $program_data->id; ?>"><img src="<?php echo plugins_url( 'images/cross.png', __FILE__ )?>" title="Delete Program" id="<?php echo $program_data->id;?>" class="deleteProgram"/><img src="<?php echo plugins_url( 'images/edit.png', __FILE__ )?>" title="Edit Program" id="<?php echo $program_data->id; ?>" class="editProgram"></p><br/>
			
			<div class="editProgramForm" id="editProgramForm_<?php echo $program_data->id; ?>" style="display:none;">
			<input type="hidden" name="programRet_id" id="programRet_id" size="80" value="<?php echo $retreat->ID; ?>" />
			<div class="meta-box">	
				<p><strong>Program Title</strong></p>
				<p><input type="text" size="80" name="programs_title" id="programs_title_<?php echo $program_data->id ?>" value="<?php echo $program_data->program_title; ?>" /></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Program image</strong></p>
				<p><input type="text" size="80" name="programs_image" id="programs_image_<?php echo $program_data->id; ?>" placeholder="Upload Program Image" value="<?php echo $program_data->program_image; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			
			<div class="meta-box">	
				<p><strong>Program Address</strong></p>
				<p><input type="text" size="80" name="programs_address" id="programs_address_<?php echo $program_data->id ?>" value="<?php echo $program_data->program_address; ?>" /></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Program Price</strong></p>
				<p><input type="text" size="80" name="programs_price" id="programs_price_<?php echo $program_data->id ?>" value="<?php echo $program_data->program_price; ?>" /></p>
			</div>
			
			<p><strong>Program Description</strong></p>
				<?php
					$program_desc_data = $program_data->program_desc;
					wp_editor( $program_desc_data, 'programs_discription_name_'.$program_data->id, $editor_settings);
					
				?>

			
			<p><strong>Inclusion</strong></p>
				<?php
					wp_editor( $program_data->program_inclusion, 'programs_inclusion_name_'.$program_data->id, $editor_settings );
					
				?>
				
				
			<p><strong>Program Rates</strong></p>
				<?php
					$program_rates = $program_data->rate;
					wp_editor( $program_rates, 'programs_rate_'.$program_data->id, $editor_settings );
					
				?>
				
			<div class="meta-box">	
				<p><strong>Program Dates</strong></p>
				<p><input type="text" size="80" name="program_date" id="programs_date_<?php echo $program_data->id ?>" value="<?php echo $program_data->date; ?>" /></p>
			</div>
			<br/>	
			<p class="add-new-btn"><input type="button" class="button-style retreatProgramBtn" name="retreatProgramBtn" id="<?php echo $program_data->id ?>" value="Update"></p>
		</div>
			
		<?php 
		}
		?>
		
		<div class="program-night" style="border: 1px solid #e2e2e2; margin: 25px 0; padding: 25px;">
		
		<p class="add-new-btn add-night"><input type="button"  id="programNight" value="Add New Night"></p>
		
		<div class="night-added-content" id="retreatProgramNightForm" style="display:none;"> 
			<div class="meta-box">	
				<p><strong>Night Title</strong></p>
				<p><input type="text" size="80" name="night_title" id="night_title" value="" /></p>
			</div>
			
			<p><strong>Night Content</strong></p>
			<?php
				wp_editor( $_night_content, 'night_content', $editor_settings );
				
			?>
			
			<p><strong>Night Condition</strong></p>
			<?php
				wp_editor( $_night_condition, 'night_condition', $editor_settings );
				
			?>
			
			<p><strong>Please Select Program</strong></p>
			<select id="id_program" name="programs_all">
				<?php foreach ($programs_data as $program_data){ ?>
					<option value="<?php echo $program_data->id ?>"><?php echo $program_data->program_title; ?></option>
				<?php } ?>
			</select>
			
			<p class="add-new-btn"><input type="button" class="button-style nightProgramBtn" name="nightProgramBtn" id="nightProgramBtn" value="Save"></p>
		</div>
		
		<?php 
				global $wpdb;
				
				$table_name = $wpdb->prefix . "night";
				
				
				//$night_data = $wpdb->get_results( "SELECT wp_night.id, wp_night.post_id, wp_night.night_title, wp_night.night_content, wp_night.program_id , wp_program.program_title, FROM $table_name, wp_program Where wp_night. = " .$retreat->ID  );
				$nights_data = $wpdb->get_results( "SELECT * FROM $table_name Where post_id = " .$retreat->ID  );
				 ?>
				
					<table style="text-align:left; color: #000; width:100%">
						<tr>
							<th>Program</th>
							<th>Nights</th>
							<th>Edit</th>
							<th>Delete</th>		
							
						</tr>
					<?php foreach($nights_data as $night_data){ ?>
						<tr>
							<?php 
								global $wpdb;
								
								$table_name = $wpdb->prefix . "program";
								
								
								$programs_dat = $wpdb->get_results( "SELECT * FROM $table_name Where id = " .$night_data->program_id  );
								foreach($programs_dat as $selected){ ?>
								<td><?php echo $selected->program_title; ?></td>
							<?php } ?>
							<td><?php echo $night_data->night_title;?></td>
							<td><img class="editNight" src="<?php echo plugins_url( 'images/edit.png', __FILE__ )?>" title="Edit Night" class="editNight" id="<?php echo $night_data->id; ?>" style="cursor:pointer;"/></td>		
							<td><img class="deleteNight" src="<?php echo plugins_url( 'images/cross.png', __FILE__ )?>" title="Delete Night" id="<?php echo $night_data->id; ?>" style="cursor:pointer;"/></td>	
							
						</tr>
						<p></p>
						
				<?php } ?>
					</table>
					
					<?php foreach($nights_data as $night_data){ ?>
						<div class="editNightForm" id="editNightForm_<?php echo $night_data->id; ?>" style="display:none;">
							<div class="program-night" style="border: 1px solid #e2e2e2; margin: 25px 0; padding: 25px;">
		
							
								<div class="meta-box">	
									<p><strong>Night Title</strong></p>
									<p><input type="text" size="80" name="nights_title" id="nights_title_<?php echo $night_data->id ?>" value="<?php echo $night_data->night_title;?>" /></p>
								</div>
								
								<p><strong>Night Content</strong></p>
								<?php
									$night_content = $night_data->night_content;
									wp_editor( $night_content, 'nights_content_'.$night_data->id, $editor_settings );
									
								?>
								
								<p><strong>Night Condition</strong></p>
								<?php
									$night_condition = $night_data->night_condition;
									wp_editor( $night_condition, 'nights_condition_'.$night_data->id, $editor_settings );
									
								?>
								
								<p><strong>Please Select Program</strong></p>
								<select id="id_programs_<?php echo $night_data->id ?>" name="program_all">
									<?php 
										global $wpdb;
										
										$table_name = $wpdb->prefix . "program";
										
										
										$programs_dat = $wpdb->get_results( "SELECT * FROM $table_name Where id = " .$night_data->program_id  );
										foreach($programs_dat as $selected){ ?>
										<option value="<?php echo $selected->id ?>"><?php echo $selected->program_title; ?></option>
									<?php }
									?>
								
									<?php foreach ($programs_data as $program_data){ ?>
										<option value="<?php echo $program_data->id ?>"><?php echo $program_data->program_title; ?></option>
									<?php } ?>
								</select>
								
								<p class="add-new-button"><input type="button" class="button-style updateNightBtn" name="nightProgramBtn" id="<?php echo $night_data->id ?>" value="Update"></p>
							
						</div>
						</div>
					<?php } ?>
		</div>
		</div>
		
		
			<p><strong>SPA</strong></p>
			<?php
				wp_editor( $_spa, 'spa_name' );
			?>
			
			<p><strong>Accommodation</strong></p>
			<?php
				wp_editor( $_accommodation, 'accommodation_name' );
			?>
		
			<p><strong>Cuisine</strong></p>
			<?php
				wp_editor( $_cuisine, 'cuisine_name' );
			?>
			
			<p><strong>Activities</strong></p>
			<?php
				wp_editor( $_activities, 'activities_name' );
			?>
		
			<p><strong>Facilities</strong></p>
			<?php
				 wp_editor( $_facilities, 'facilities_name' );
				
			?>
			
			<p><strong>Quick Facts</strong></p>
			<?php
				wp_editor( $_quick_facts, 'quick_facts_name' );
			?>
		 
		<div class="meta-box-textarea">
			<p><strong>Retreat Packages</strong></p>
			<p><textarea name="retreats_packages_name"  rows="4" cols="60" style="width:49%;"><?php echo $_retreats_packages; ?></textarea></p>
		</div> 
		<div class="meta-box-textarea">
			<p><strong>Inclusions</strong></p>
			<p><textarea name="inclusion_name"  rows="4" cols="60" style="width:49%;"><?php echo $_inclusion; ?></textarea></p>
		</div> 
		
		<div class="meta-box">
			<p><strong>Location</strong></p>
			<p>
				<select name="location_name">
				  <?php if(empty($_location)){ ?>
					<option value="0">-Select-</option>
				  <?php } ?>
					<option value="bali" <?php if($_location=="bali") echo 'selected="selected"'; ?> >Bali</option>
					<option value="semiyank" <?php if($_location=="semiyank") echo 'selected="selected"'; ?> >Semiyank</option>
					<option value="tabanan" <?php if($_location=="tabanan") echo 'selected="selected"'; ?> >Tabanan</option>
				</select>
			</p>
		</div>
		
		<div class="meta-box">	
			<p><strong>Latitude </strong></p>
			<p><input type="text" size="80" id="latitude_name" name="latitude_name" onkeyup="retreatMapFunction()" value="<?php echo $_latitude; ?>" /></p>
		</div>
		
		<div class="meta-box">	
			<p><strong>Longitude</strong></p>
			<p><input type="text" size="80" id="longitude_name" name="longitude_name" onkeyup="retreatMapFunction()" value="<?php echo $_longitude; ?>" /></p>
		</div>
		
		<div class="meta-box">
			<p><strong>Location & Map</strong></p>
			<p><input type="text" size="80" placeholder="Type to search" name="address_name"  id="address" value="<?php echo $_address ;?>"   /></p>
		</div> 
			<div id="retreatMap" style="width: 100%; height: 400px;"></div>
			<iframe onload="retreatMapFunction();" style="display:none;"></iframe>
			
			<p><strong>Location Description</strong></p>
			<?php
				 wp_editor( $_location_description, 'location_desc', $settings );
			?>
	  
	  
		  <div class="meta-box">	
			<p><strong>Low Seasons</strong></p>
			<p><input type="text" size="80" name="low_season_name" value="<?php echo $_low_season; ?>" /></p>
		  </div>
		  <div class="meta-box">	
			<p><strong>High Seasons</strong></p>
			<p><input type="text" size="80" name="high_season_name" value="<?php echo $_high_season; ?>" /></p>
		  </div>
		  <div class="meta-box">	
			<p><strong>Peak Seasons</strong></p>
			<p><input type="text" size="80" name="peak_season_name" value="<?php echo $_peak_season; ?>" /></p>
		  </div>
		
		<div class="meta-box">
			<p><strong>Facebook Url</strong></p>
			<p><input type="text" size="80" name="facebook_name" value="<?php echo $_facebook; ?>" /></p>
		</div> 
		<div class="meta-box">	
			<p><strong>Twitter Url</strong></p>
			<p><input type="text" size="80" name="twitter_name" value="<?php echo $_twitter; ?>" /></p>
		</div>
		<div class="meta-box-textarea">	
			<p><strong>Short Description</strong></p>
			<p><textarea name="short_desc"  rows="4" cols="60" style="width:75%;"><?php echo $_short_text; ?></textarea></p>
		</div>
		<div class="meta-box">	
			<p><strong>Video Title</strong></p>
			<p><input type="text" size="80" name="video_title_name" value="<?php echo $_video_title; ?>" /></p>
		</div>
		
		<div class="meta-box">	
			<p><strong>Video image</strong></p>
			<p><input type="text" size="80" id="video_image_name" name="video_image_name" value="<?php echo $_video_image; ?>" />
			<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
		</div>
		
		<div class="meta-box-textarea">
			<p><strong>Video</strong></p>
			<p><textarea name="video_name"  rows="4" cols="60" style="width:49%;"><?php echo $_video; ?></textarea></p>
		</div>

		<div class="award-content" id="award-content" style="padding: 25px;">
			<div class="award-form" id="award-form">
				<div class="meta-box">
					<p><strong>Award Title</strong></p>
					<p><input type="text" size="80" id="award_title" name="award_title" value=""/></p>
				</div>
				<div class="meta-box-textarea">
					<p><strong>Award Detail</strong></p>
					<p><textarea name="award_detail" id="award_detail" rows="4" cols="60" style="width:49%;"></textarea></p>
				</div>
				<p class="add-new-btn"><input class="button-style" type="button" id="awardBtn" value="Save"></p>
			</div>
		</div>
		
		
		<div class="awards-list">
			<?php 
				global $wpdb;
				
				$table_name = $wpdb->prefix . "award";
				
				$awards_data = $wpdb->get_results( "SELECT * FROM $table_name Where post_id = " .$retreat->ID  );
				 ?>
				
					<table style="text-align:left; color: #000; width:100%">
						<tr>
							<th>Award Title</th>
							<th>Action 1</th>
							<th>Action 2</th>		
							
						</tr>
					<?php foreach($awards_data as $award_data){ ?>
						<tr>
							<td><?php echo $award_data->award_title;?></td>
							<td><img class="editAward" src="<?php echo plugins_url( 'images/edit.png', __FILE__ )?>" title="Edit Award" id="<?php echo $award_data->id; ?>" style="cursor:pointer;"/></td>		
							<td><img class="deleteAward" src="<?php echo plugins_url( 'images/cross.png', __FILE__ )?>" title="Delete Award" id="<?php echo $award_data->id; ?>" style="cursor:pointer;"/></td>	
							
						</tr>
						
				<?php } ?>
					</table>
					<div class="award-content" id="award-content" style="padding: 25px;">
					<?php foreach($awards_data as $award_data){ ?>
						
							<div class="award-form" id="editAwardForm_<?php echo $award_data->id ?>" style="display:none;" >
								<div class="meta-box">
									<p><strong>Award Title</strong></p>
									<p><input type="text" size="80" id="awards_title_<?php echo $award_data->id ?>" name="award_title" value="<?php echo $award_data->award_title ?>"/></p>
								</div>
								<div class="meta-box-textarea">
									<p><strong>Award Detail</strong></p>
									<p><textarea name="award_detail" id="awards_detail_<?php echo $award_data->id ?>" rows="4" cols="60" style="width:49%;"><?php echo $award_data->award_content ?></textarea></p>
								</div>
								<p class="add-new-btn"><input class="button-style awardUpdateBtn" type="button" id="<?php echo $award_data->id ?>" value="Update"></p>
							</div>
						
					<?php } ?>
					</div>
		</div>
		
		<div class="review-box">
		 
			<div class="review" id="retreatReviewForm">
			
			<p><strong>Name</strong></p>
			<input type="hidden" name="retreat_id" id="retreat_id" size="80" value="<?php echo $_post_id; ?>" />
			<p><input type="text" name="review_author_retreat" id="review_author_retreat" size="80" value="<?php echo $_review_author; ?>" /></p>
			<p><strong>Title</strong></p>
			<p><input type="text" name="review_title" id="review_title" size="80" value="" /></p>
			<p><strong>Country</strong></p>
			<p><input type="text" name="country" id="country" size="80" value="" /></p>
			<p><strong>Publish Date</strong></p>
			<p><input type="text" name="publish_date" id="publish_date" size="80" value="" placeholder="<?php echo date(' F Y');  ?>"/></p>
			<p><strong>Email</strong></p>
			<p><input type="text" name="review_author_email_address" id="review_author_email_address" size="80" value="<?php echo $_review_author_email; ?>" /></p>
			<p><strong>Rating</strong></p>
			<p><input type="text" name="review_rating_retreat" id="review_rating_retreat" size="80" value="<?php echo $_review_rating; ?>" /></p>
			<p><strong>Review</strong></p>
			<p><textarea name="retreat_review" id="retreat_review" rows="4" cols="60" style="width:49%;"><?php echo $_retreat_review; ?></textarea></p>
			<span id="message" style="color:red;"></span>
			<p><input type="button" name="review" id="retreatReviewBtn" value="Save"></p>
			</div>
			
		</div>
	
		<div class="review-box">	
			<input type="hidden" name="show_retreat_id" id="show_retreat_id" size="80" value="<?php echo $_post_id; ?>" />
			<?php
		global $wpdb;
		
		$table_name = $wpdb->prefix . "reviews";
		
		
		$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name Where post_id = " .$_post_id. " ORDER BY id DESC" );
		?>
			<table style="text-align:left; color: #000; width:100%">
				<tr>
				<th>Author</th>
				<th>Country</th>
				<th>Review Rating</th>		
				<th>Review</th>		
				<th>Icon</th>
				<th>Active</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		<?php foreach ($retrieve_data as $retrieved_data){ ?>
			
		<tr>
			<td style="width: 120px;"><?php echo  stripslashes($retrieved_data->author_name);?></td>
			<td style="width: 100px;"><?php echo  stripslashes($retrieved_data->country);?></td>		
			
			<?php $nb_stars = $retrieved_data->review_rating;?>
			<td style="width: 115px;"><?php for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
					if ( $star_counter <= $nb_stars ) {?>
						<i class="fa fa-star active-review"></i>
					<?php } else { ?>
						<i class="fa fa-star-o"></i>
				<?php	}
				} ?></td>
				<?php 
					$review = $retrieved_data->review;
					$position = 100;
					$reviews_half = substr($review, 0, $position);
				?>
			<td style="width: 750px;"><?php echo  stripslashes($reviews_half."...");?></td>
			
			<?php $id = $retrieved_data->id;?>
			<?php $approved = $retrieved_data->review_approved; ?>
			<?php $icon = $retrieved_data->review_icon; ?>
			<td><input type="checkbox" class="tripAdvisor_icon" id="<?php echo $id;?>"  <?php if ($icon == 1){?> checked="checked" <?php } ?>/></td>
			<td><input type="hidden" class="active" name="active" id="active" value="<?php echo $id;?>">
			<input type="checkbox" class="btnapprove" id="<?php echo $id;?>"  <?php if ($approved == 1){?> checked="checked" <?php } ?>/></td>
			<td><input type="hidden" class="delete_id" name="delete_id" id="delete_id" value="<?php echo $id;?>"><img src="<?php echo plugins_url( 'images/edit.png', __FILE__ )?>" title="Edit" id="<?php echo $id;?>" class="editRetreat"></td><td><img src="<?php echo plugins_url( 'images/cross.png', __FILE__ )?>" title="Delete" id="<?php echo $id;?>" class="delete_retreat"/></td>	
			
		</tr>
			
			
		<?php 
		}
		?>
		</table>
			<p><span id="retreatReviewEditForm" style="color: #fff;"></span></p>
		</div>
		
		<div id="confirmation-box-reviewR" class="confirmation-box" style="border: 1px solid #e2e2e2; padding: 15px; display:none;">
			<div class="popupConfirmation" id="popupConfirmation">
			<span class="no_deleteRetreat close-btnR">&times;</span>
				<p>Are you sure you want to delete this?</p>
				<input type="hidden" id="confirmationRetreatR_id" value="" />
				<input class="button-style" type="button" id="deleteRetreat" Value="Yes"/>
				<input class="button-style" type="button" id="no_deleteRetreat" Value="No"/>
			</div>
		</div>
		
	<?php 
}




 function display_retreat_meta_box_program($retreat){
 
	$editor_settings = array(
			'textarea_rows' => 8,
			  'tabindex' => 4,
			  'tinymce' => array(
				'theme_advanced_buttons1' => 'bold, italic, ul, pH, temp',
			  ),
			);
 
	
	$_accommo_overview = "";

	$_accommo_overview = get_post_meta( $retreat->ID, 'accommo_overview', true );
	?>
	
		
		<p><strong>Accommodation Overview</strong></p>
			<?php
				wp_editor( $_accommo_overview, 'accommo_overview_name', $editor_settings );
			?>
		
		<p><input type="button" id="retreatAccommodation" Value="New Accommodation"></p>
		<div class="review" id="retreatAccommoForm" style="display:none;">
			<input type="hidden" name="this_retreat_id" id="this_retreat_id" size="80" value="<?php echo $retreat->ID; ?>" />
			
			<div class="meta-box">	
				<p><strong>Accommodation Title</strong></p>
				<p><input type="text" size="80" name="accommo_title" id="accommo_title" value="<?php echo $_accommo_title; ?>" /></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Accommodation image first</strong></p>
				<p><input type="text" size="80" name="accommo_image_first" id="accommo_image_first" placeholder="Upload Accomodation Image" value="" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Accommodation image second</strong></p>
				<p><input type="text" size="80" name="accommo_image_second" id="accommo_image_second" placeholder="Upload Accomodation Image" value="" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Accommodation image third</strong></p>
				<p><input type="text" size="80" name="accommo_image_third" id="accommo_image_third" placeholder="Upload Accomodation Image" value="" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Accommodation image fourth</strong></p>
				<p><input type="text" size="80" name="accommo_image_fourth" id="accommo_image_fourth" placeholder="Upload Accomodation Image" value="" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Accommodation image fifth</strong></p>
				<p><input type="text" size="80" name="accommo_image_fifth" id="accommo_image_fifth" placeholder="Upload Accomodation Image" value="" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>

			<p><strong>Accommodation Description</strong></p>
				<?php
					wp_editor( $_accommodation_discription, 'accommodation_discription_name', $editor_settings );
				?>
			<p><input type="button" name="retreatAccommoBtn" id="retreatAccommoBtn" value="Save"></p>	
		</div>
		
		
		
		<?php 
		global $wpdb;
		
		$table_name = $wpdb->prefix . "accommodation";
		
		
		$accommos_data = $wpdb->get_results( "SELECT * FROM $table_name Where post_id = " .$retreat->ID  );
		?>
		
		
		
			
			
			<table style="text-align:left; color: #000; width:100%">
				<tr>
				<th>Title</th>
				<th>Edit</th>
				<th>Delete</th>	
			</tr>
		<?php foreach ($accommos_data as $accommo_data){ ?>
			
		<tr>
			<td><?php echo $accommo_data->accommo_title;?></td>
			
			<td><input type="hidden" class="toggle"  id="toggle" value="<?php echo $accommo_data->id; ?>"><img src="<?php echo plugins_url( 'images/edit.png', __FILE__ )?>" title="Edit Accommodation" id="<?php echo $accommo_data->id; ?>" class="editAccommo"></td><td><input type="hidden" class="delete_accommo_id" name="delete_accommo_id" id="delete_accommo_id" value="<?php echo $accommo_data->id;?>"><img src="<?php echo plugins_url( 'images/cross.png', __FILE__ )?>" title="Delete" id="<?php echo $accommo_data->id;?>" class="deleteAccommo"/></td>	
		</tr>
		<?php 
		}
		?>
		</table>
			
			<?php foreach ($accommos_data as $accommo_data){ ?>
			
			<div class="editAccommoForm" id="editAccommoForm_<?php echo $accommo_data->id; ?>" style="display:none;">
			
				<input type="hidden" name="accommoRet_id" id="accommoRet_id" size="80" value="<?php echo $retreat->ID; ?>" />
			<div class="meta-box">	
				<p><strong>Accommodation Title</strong></p>
				<p><input type="text" size="80" name="accommos_title" id="accommos_title_<?php echo $accommo_data->id ?>" value="<?php echo $accommo_data->accommo_title; ?>" /></p>
			</div>
			
			
			<div class="meta-box">	
				<p><strong>Accommodation image first</strong></p>
				<p><input type="text" size="80" name="accommo_image" id="accommos_image_<?php echo $accommo_data->id ?>" value="<?php echo $accommo_data->accommo_image; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Accommodation image second</strong></p>
				<p><input type="text" size="80" name="accommo_image" id="accommos_image_second_<?php echo $accommo_data->id ?>" value="<?php echo $accommo_data->accommo_image_second; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Accommodation image third</strong></p>
				<p><input type="text" size="80" name="accommo_image" id="accommos_image_third_<?php echo $accommo_data->id ?>" value="<?php echo $accommo_data->accommo_image_third; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Accommodation image fourth</strong></p>
				<p><input type="text" size="80" name="accommo_image" id="accommos_image_fourth_<?php echo $accommo_data->id ?>" value="<?php echo $accommo_data->accommo_image_fourth; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Accommodation image fifth</strong></p>
				<p><input type="text" size="80" name="accommo_image" id="accommos_image_fifth_<?php echo $accommo_data->id ?>" value="<?php echo $accommo_data->accommo_image_fifth; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<p><strong>Accommodation Description</strong></p>
				<?php
					$accommo_desc_data = $accommo_data->accommo_desc;
					wp_editor( $accommo_desc_data, 'accommo_discription_name_'.$accommo_data->id, $editor_settings);
					
				?>

				<br/>	
			<p><input type="button" class="editAccommoBtn" name="editAccommoBtn" id="<?php echo $accommo_data->id ?>" value="Save"></p>
			</div>
			
			
			
			<?php } ?>
			
			
	<?php
 }



add_action( 'save_post','add_retreat_fields', 10, 2 );


function add_retreat_fields( $retreat_id,$retreat ) {
	// Check post type for bali-retreats
	if ( $retreat->post_type == 'retreats' ) {
		// Store data in post meta table if present in post data
		if ( isset( $_POST['upload_first_image'] ) ) {
			update_post_meta( $retreat_id, 'first_image', $_POST['upload_first_image'] );
		}
		if ( isset( $_POST['first_image_title_name'] ) ) {
			update_post_meta( $retreat_id, 'first_image_title', $_POST['first_image_title_name'] );
		}
		if ( isset( $_POST['first_alternate'] )  ) {
			update_post_meta( $retreat_id, 'first_image_alternate', $_POST['first_alternate'] );
		}
		if ( isset( $_POST['upload_second_image'] ) ) {
			update_post_meta( $retreat_id, 'second_image', $_POST['upload_second_image'] );
		}
		if ( isset( $_POST['second_image_title_name'] )  ) {
			update_post_meta( $retreat_id, 'second_image_title', $_POST['second_image_title_name'] );
		}
		if ( isset( $_POST['second_alternate'] )  ) {
			update_post_meta( $retreat_id, 'second_image_alternate', $_POST['second_alternate'] );
		}
		if ( isset( $_POST['upload_third_image'] ) ) {
			update_post_meta( $retreat_id, 'third_image', $_POST['upload_third_image'] );
		}
		if ( isset( $_POST['third_image_title_name'] ) ) {
			update_post_meta( $retreat_id, 'third_image_title', $_POST['third_image_title_name'] );
		}
		if ( isset( $_POST['third_alternate'] )  ) {
			update_post_meta( $retreat_id, 'third_image_alternate', $_POST['third_alternate'] );
		}
		if ( isset( $_POST['upload_fourth_image'] ) ) {
			update_post_meta( $retreat_id, 'fourth_image', $_POST['upload_fourth_image'] );
		}
		if ( isset( $_POST['fourth_image_title_name'] ) ) {
			update_post_meta( $retreat_id, 'fourth_image_title', $_POST['fourth_image_title_name'] );
		}
		if ( isset( $_POST['fourth_alternate'] ) ) {
			update_post_meta( $retreat_id, 'fourth_image_alternate', $_POST['fourth_alternate'] );
		}
		if ( isset( $_POST['upload_fifth_image'] ) ) {
			update_post_meta( $retreat_id, 'fifth_image', $_POST['upload_fifth_image'] );
		}
		if ( isset( $_POST['fifth_image_title_name'] ) ) {
			update_post_meta( $retreat_id, 'fifth_image_title', $_POST['fifth_image_title_name'] );
		}
		if ( isset( $_POST['fifth_alternate'] ) ) {
			update_post_meta( $retreat_id, 'fifth_image_alternate', $_POST['fifth_alternate'] );
		}
		if ( isset( $_POST['upload_image'] ) ) {
			update_post_meta( $retreat_id, 'image', $_POST['upload_image'] );
		}
		if ( isset( $_POST['upload_six_image'] ) ) {
			update_post_meta( $retreat_id, 'six_image', $_POST['upload_six_image'] );
		}
		if ( isset( $_POST['six_image_title_name'] ) ) {
			update_post_meta( $retreat_id, 'six_image_title', $_POST['six_image_title_name'] );
		}
		if ( isset( $_POST['six_alternate'] ) ) {
			update_post_meta( $retreat_id, 'six_image_alternate', $_POST['six_alternate'] );
		}
		if ( isset( $_POST['upload_seven_image'] ) ) {
			update_post_meta( $retreat_id, 'seven_image', $_POST['upload_seven_image'] );
		}
		if ( isset( $_POST['seven_image_title_name'] ) ) {
			update_post_meta( $retreat_id, 'seven_image_title', $_POST['seven_image_title_name'] );
		}
		if ( isset( $_POST['seven_alternate'] ) ) {
			update_post_meta( $retreat_id, 'seven_image_alternate', $_POST['seven_alternate'] );
		}
		if ( isset( $_POST['upload_eight_image'] ) ) {
			update_post_meta( $retreat_id, 'eight_image', $_POST['upload_eight_image'] );
		}
		if ( isset( $_POST['eight_image_title_name'] )  ) {
			update_post_meta( $retreat_id, 'eight_image_title', $_POST['eight_image_title_name'] );
		}
		if ( isset( $_POST['eight_alternate'] )  ) {
			update_post_meta( $retreat_id, 'eight_image_alternate', $_POST['eight_alternate'] );
		}
		if ( isset( $_POST['price_from_name'] ) ) {
			update_post_meta( $retreat_id, 'price_from', $_POST['price_from_name'] );
		}
		if ( isset( $_POST['price_high'] ) ) {
			update_post_meta( $retreat_id, 'price_to', $_POST['price_high'] );
		}
		if ( isset( $_POST['rates_name'] ) ) {
			update_post_meta( $retreat_id, 'rates', $_POST['rates_name'] );
		}
		if ( isset( $_POST['wording_name'] ) ) {
			update_post_meta( $retreat_id, 'wording', $_POST['wording_name'] );
		}
		if ( isset( $_POST['type_name'] ) ) {
			update_post_meta( $retreat_id, 'type', $_POST['type_name'] );
		}
		if ( isset( $_POST['overview_name'] ) ) {
			update_post_meta( $retreat_id, 'overview', $_POST['overview_name'] );
		}
		if ( isset( $_POST['gallery_images_link'] )) {
			update_post_meta( $retreat_id, 'gallery_link', $_POST['gallery_images_link'] );
		}
		if ( isset( $_POST['the_vibe'] ) ) {
			update_post_meta( $retreat_id, 'vibe', $_POST['the_vibe'] );
		}
		if ( isset( $_POST['spa_name'] )  ) {
			update_post_meta( $retreat_id, 'spa', $_POST['spa_name'] );
		}
		if ( isset( $_POST['accommodation_name'] )  ) {
			update_post_meta( $retreat_id, 'accommodation', $_POST['accommodation_name'] );
		}
		if ( isset( $_POST['cuisine_name'] ) ) {
			update_post_meta( $retreat_id, 'cuisine', $_POST['cuisine_name'] );
		}
		if ( isset( $_POST['activities_name'] ) ) {
			update_post_meta( $retreat_id, 'activities', $_POST['activities_name'] );
		}
		if ( isset( $_POST['facilities_name'] ) && $_POST['facilities_name'] != '' ) {
			update_post_meta( $retreat_id, 'facilities', $_POST['facilities_name'] );
		}
		if ( isset( $_POST['quick_facts_name'] ) ) {
			update_post_meta( $retreat_id, 'quick_facts', $_POST['quick_facts_name'] );
		}
		if ( isset( $_POST['retreats_packages_name'] ) ) {
			update_post_meta( $retreat_id, 'retreats_packages', $_POST['retreats_packages_name'] );
		}
		if ( isset( $_POST['inclusion_name'] )) {
			update_post_meta( $retreat_id, 'inclusion', $_POST['inclusion_name'] );
		}
		if ( isset( $_POST['location_name'] ) ) {
			update_post_meta( $retreat_id, 'location', $_POST['location_name'] );
		}
		if ( isset( $_POST['location_name'] )) {
			update_post_meta( $retreat_id, 'location', $_POST['location_name'] );
		}
		if ( isset( $_POST['longitude_name'] )  ) {
			update_post_meta( $retreat_id, 'longitude', $_POST['longitude_name'] );
		}
		if ( isset( $_POST['latitude_name'] )) {
			update_post_meta( $retreat_id, 'latitude', $_POST['latitude_name'] );
		}
		if ( isset( $_POST['address_name'] ) ) {
			update_post_meta( $retreat_id, 'address', $_POST['address_name'] );
		}
		if ( isset( $_POST['location_desc'] )) {
			update_post_meta( $retreat_id, 'location_description', $_POST['location_desc'] );
		}
		if ( isset( $_POST['low_season_name'] )) {
			update_post_meta( $retreat_id, 'low_season', $_POST['low_season_name'] );
		}
		if ( isset( $_POST['high_season_name'] )) {
			update_post_meta( $retreat_id, 'high_season', $_POST['high_season_name'] );
		}
		if ( isset( $_POST['peak_season_name'] )) {
			update_post_meta( $retreat_id, 'peak_season', $_POST['peak_season_name'] );
		}
		if ( isset( $_POST['program_overview_name'] ) ) {
			update_post_meta( $retreat_id, 'program_overview', $_POST['program_overview_name'] );
		}
		if ( isset( $_POST['program_bottom_overview_name'] )  ) {
			update_post_meta( $retreat_id, 'program_bottom_overview', $_POST['program_bottom_overview_name'] );
		}
		if ( isset( $_POST['accommo_overview_name'] ) ) {
			update_post_meta( $retreat_id, 'accommo_overview', $_POST['accommo_overview_name'] );
		}
		if ( isset( $_POST['facebook_name'] ) ) {
			update_post_meta( $retreat_id, 'facebook', $_POST['facebook_name'] );
		}
		if ( isset( $_POST['twitter_name'] ) ) {
			update_post_meta( $retreat_id, 'twitter', $_POST['twitter_name'] );
		}
		if ( isset( $_POST['short_desc'] ) ) {
			update_post_meta( $retreat_id, 'short_text', $_POST['short_desc'] );
		}
		if ( isset( $_POST['video_image_name'] ) ) {
			update_post_meta( $retreat_id, 'video_image', $_POST['video_image_name'] );
		}
		if ( isset( $_POST['video_title_name'] ) ) {
			update_post_meta( $retreat_id, 'video_title', $_POST['video_title_name'] );
		}
		if ( isset( $_POST['video_name'] ) ) {
			update_post_meta( $retreat_id, 'video', $_POST['video_name'] );
		}
		if ( isset( $_POST['first_gallery_image'] ) ) {
			update_post_meta( $retreat_id, 'first_gallery_img', $_POST['first_gallery_image'] );
		}
		if ( isset( $_POST['first_thumb_title_name'] ) ) {
			update_post_meta( $retreat_id, 'first_thumb_title', $_POST['first_thumb_title_name'] );
		}
		if ( isset( $_POST['first_thumb_alt'] ) ) {
			update_post_meta( $retreat_id, 'first_image_thumb_alt', $_POST['first_thumb_alt'] );
		}
		if ( isset( $_POST['second_gallery_image'] ) ) {
			update_post_meta( $retreat_id, 'second_gallery_img', $_POST['second_gallery_image'] );
		}
		if ( isset( $_POST['second_thumb_title_name'] ) ) {
			update_post_meta( $retreat_id, 'second_thumb_title', $_POST['second_thumb_title_name'] );
		}
		if ( isset( $_POST['second_thumb_alt'] ) ) {
			update_post_meta( $retreat_id, 'second_image_thumb_alt', $_POST['second_thumb_alt'] );
		}
		if ( isset( $_POST['third_gallery_image'] ) ) {
			update_post_meta( $retreat_id, 'third_gallery_img', $_POST['third_gallery_image'] );
		}
		if ( isset( $_POST['third_thumb_title_name'] ) ) {
			update_post_meta( $retreat_id, 'third_thumb_title', $_POST['third_thumb_title_name'] );
		}
		if ( isset( $_POST['third_thumb_alt'] ) ) {
			update_post_meta( $retreat_id, 'third_image_thumb_alt', $_POST['third_thumb_alt'] );
		}
		if ( isset( $_POST['fourth_gallery_image'] ) ) {
			update_post_meta( $retreat_id, 'fourth_gallery_img', $_POST['fourth_gallery_image'] );
		}
		if ( isset( $_POST['fourth_thumb_title_name'] ) ) {
			update_post_meta( $retreat_id, 'fourth_thumb_title', $_POST['fourth_thumb_title_name'] );
		}
		if ( isset( $_POST['fourth_thumb_alt'] ) ) {
			update_post_meta( $retreat_id, 'fourth_image_thumb_alt', $_POST['fourth_thumb_alt'] );
		}
		if ( isset( $_POST['fifth_gallery_image'] ) ) {
			update_post_meta( $retreat_id, 'fifth_gallery_img', $_POST['fifth_gallery_image'] );
		}
		if ( isset( $_POST['fifth_thumb_title_name'] ) ) {
			update_post_meta( $retreat_id, 'fifth_thumb_title', $_POST['fifth_thumb_title_name'] );
		}
		if ( isset( $_POST['fifth_thumb_alt'] ) ) {
			update_post_meta( $retreat_id, 'fifth_image_thumb_alt', $_POST['fifth_thumb_alt'] );
		}
		if ( isset( $_POST['six_gallery_image'] ) ) {
			update_post_meta( $retreat_id, 'six_gallery_img', $_POST['six_gallery_image'] );
		}
		if ( isset( $_POST['six_thumb_title_name'] ) ) {
			update_post_meta( $retreat_id, 'six_thumb_title', $_POST['six_thumb_title_name'] );
		}
		if ( isset( $_POST['six_thumb_alt'] ) ) {
			update_post_meta( $retreat_id, 'six_image_thumb_alt', $_POST['six_thumb_alt'] );
		}
		if ( isset( $_POST['seven_gallery_image'] ) ) {
			update_post_meta( $retreat_id, 'seven_gallery_img', $_POST['seven_gallery_image'] );
		}
		if ( isset( $_POST['seven_thumb_title_name'] )) {
			update_post_meta( $retreat_id, 'seven_thumb_title', $_POST['seven_thumb_title_name'] );
		}
		if ( isset( $_POST['seven_thumb_alt'] ) ) {
			update_post_meta( $retreat_id, 'seven_image_thumb_alt', $_POST['seven_thumb_alt'] );
		}
		if ( isset( $_POST['eight_gallery_image'] ) ) {
			update_post_meta( $retreat_id, 'eight_gallery_img', $_POST['eight_gallery_image'] );
		}
		if ( isset( $_POST['eight_thumb_title_name'] ) ) {
			update_post_meta( $retreat_id, 'eight_thumb_title', $_POST['eight_thumb_title_name'] );
		}
		if ( isset( $_POST['eight_thumb_alt'] ) ) {
			update_post_meta( $retreat_id, 'eight_image_thumb_alt', $_POST['eight_thumb_alt'] );
		}
		if ( isset( $_POST['nine_gallery_image'] ) ) {
			update_post_meta( $retreat_id, 'nine_gallery_img', $_POST['nine_gallery_image'] );
		}
		if ( isset( $_POST['nine_thumb_title_name'] ) ) {
			update_post_meta( $retreat_id, 'nine_thumb_title', $_POST['nine_thumb_title_name'] );
		}
		if ( isset( $_POST['nine_thumb_alt'] ) ) {
			update_post_meta( $retreat_id, 'nine_image_thumb_alt', $_POST['nine_thumb_alt'] );
		}
	}
}	

add_action( 'admin_enqueue_scripts', 'retreat_ajax_enqueue_script' );
function retreat_ajax_enqueue_script() {
	wp_enqueue_script('retreat-review', plugins_url( '/js/retreat-review.js' , __FILE__ ) , array( 'jquery' ));
}
	function retreat_review_save($review_post_id){

		$review_post_id = $_POST['retreat_id'];
		$author_name = $_POST['review_author_retreat'];
		$review_title = $_POST['review_title'];
		$country = $_POST['country'];
		$review_author_email = $_POST['review_author_email_address'];
		$review_rating = $_POST['review_rating_retreat'];
		$retreat_review = $_POST['retreat_review'];
		$review_date = $_POST['review_date'];
		
		if($review_date == ""){
			$date = date('y-m-d');
		}else{
			$old_date_timestamp = strtotime($review_date);
			$date  = date('Y-m-d', $old_date_timestamp);
		}
		
		global $wpdb;
		$wpdb->insert( 
			'wp_reviews', 
			array( 
				'post_id' => $review_post_id,
				'author_name' => $author_name,
				'review_title' => $review_title,
				'country' => $country,
				'author_email' => $review_author_email,
				'review_rating' => $review_rating,
				'review' => $retreat_review,
				'review_date' => $date,
				
			), 
			array( 
				'%d',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s'
			) 
		);
		die();
		return true;
	}
add_action('wp_ajax_retreat_review_save', 'retreat_review_save');
add_action('wp_ajax_nopriv_retreat_review_save', 'retreat_review_save');

	$is_ajax = "";
	if(isset($_POST['is_ajax'])){
		$is_ajax=$_POST["is_ajax"];
	}
	
	if($is_ajax==1){
		$id = $_POST['active'];
		global $wpdb;
		
		$table_name = $wpdb->prefix . "reviews";
		
		
		$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name Where id = " .$id  );
		
		foreach ($retrieve_data as $retrieved_data){ 
			$approve =	$retrieved_data->review_approved;
		} 
		if($approve == 0){
			$wpdb->update( 
				'wp_reviews', 
				array( 
					'review_approved' => 1
					 
				), 
				array( 'ID' => $id ), 
				array( 
					
					'%d'	
				), 
				array( '%d' ) 
			);
			die();
		return true;
		}else if($approve == 1){
			$wpdb->update( 
				'wp_reviews', 
				array( 
					'review_approved' => 0
					 
				), 
				array( 'ID' => $id ), 
				array( 
					
					'%d'	
				), 
				array( '%d' ) 
			);
			die();
			return true;
		}
	}
	
	if($is_ajax=="tripAdvisor_icon"){
		$id = $_POST['icon'];
		global $wpdb;
		
		$table_name = $wpdb->prefix . "reviews";
		
		
		$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name Where id = " .$id  );
		
		foreach ($retrieve_data as $retrieved_data){ 
			$icon=	$retrieved_data->review_icon;
		} 
		if($icon == 0){
			$wpdb->update( 
				'wp_reviews', 
				array( 
					'review_icon' => 1
					 
				), 
				array( 'ID' => $id ), 
				array( 
					
					'%d'	
				), 
				array( '%d' ) 
			);
		}else if($icon == 1){
			$wpdb->update( 
				'wp_reviews', 
				array( 
					'review_icon' => 0
					 
				), 
				array( 'ID' => $id ), 
				array( 
					
					'%d'	
				), 
				array( '%d' ) 
			);
		
		}
	}
	
	if($is_ajax== "deleteRetreat"){
		$id = $_POST['delete_id'];
		$wpdb->delete( 'wp_reviews', array( 'id' => $id ), array( '%d' ) );
	}
	
	if($is_ajax=="edit_actionRetreat"){
		 $edit_id = $_POST['edit_id'];
		global $wpdb;
		
		$table_name = $wpdb->prefix . "reviews";
		
		
		$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name Where id = " .$edit_id  );
		?>
			
		<?php foreach ($retrieve_data as $retrieved_data){ ?>
			
			
			
			
			
			<div class="review" id="updateRetreatReviewForm" style="color: #000;">
				<p><strong>Name</strong></p>
				<input type="hidden" name="id" id="id" size="80" value="<?php echo $retrieved_data->id;?>" />
				<input type="hidden" name="trip_icon" id="trip_icon" size="80" value="<?php echo $retrieved_data->review_icon;?>" />
				<input type="hidden" name="post_id" id="post_id" size="80" value="<?php echo $retrieved_data->post_id;?>" />
				<p><input type="text" name="review_author_name" id="review_author_name" size="80" value="<?php echo  stripslashes($retrieved_data->author_name);?>" /></p>
				<p><strong>Title</strong></p>
				<p><input type="text" name="review_title1" id="review_title1" size="80" value="<?php echo  stripslashes($retrieved_data->review_title);?>" /></p>
				<p><strong>Country</strong></p>
				<p><input type="text" name="country1" id="country1" size="80" value="<?php echo  stripslashes($retrieved_data->country);?>" /></p>
				<p><strong>Email</strong></p>
				<p><input type="text" name="retreat_author_email_address" id="retreat_author_email_address" size="80" value="<?php echo  stripslashes($retrieved_data->author_email);?>" /></p>
				<p><strong>Publish Date</strong></p>
				<p><input type="text" name="review_date1" id="review_date1" size="80" value="<?php  echo  date('F Y',strtotime( $retrieved_data->review_date ) ); ?>" /></p>
				<p><strong>Rating</strong></p>
				<p><input type="text" name="review_rating" id="review_rating" size="80" value="<?php echo  stripslashes($retrieved_data->review_rating);?>" /></p>
				<p><strong>Review</strong></p>
				<p><textarea name="retreat_review1" id="retreat_review1" rows="4" cols="60" style="width:49%;"><?php echo  stripslashes($retrieved_data->review);?></textarea></p>
				<span id="message" style="color:red;"></span>
				<p><input type="button" name="updateReview" id="updateRetreatReview" value="Update"></p>
			</div>
			
		<?php 
		}
		
	}
	
	if($is_ajax == "updateReviews"){

		$id = $_POST['id'];
		$review_post_id = $_POST['post_id'];
		$name = $_POST['review_author_name'];
		$review_title1 = $_POST['review_title1'];
		$country1 = $_POST['country1'];
		$review_author_email = $_POST['author_email_address'];
		$review_rating = $_POST['review_rating'];
		$retreat_review = $_POST['retreat_review'];
		$publish_date = $_POST['review_date1'];
		$old_date_timestamp = strtotime($publish_date);
		$new_date = date('Y-m-d', $old_date_timestamp);

		global $wpdb;
		$wpdb->update( 
			'wp_reviews', 
			array( 
				'post_id' => $review_post_id,
				'author_name' => $name,
				'review_title' => $review_title1,
				'country' => $country1,
				'author_email' => $review_author_email,
				'review_rating' => $review_rating,
				'review' => $retreat_review,
				'review_date' => $new_date,
				
			),
				array( 'ID' => $id ),
			array( 
				'%d',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				
				'%s'
			),
				array( '%d' )
		);
		die();
		return true;
	}


/*
 * Retreat Programs
 */
	
	if($is_ajax == "programSave"){

		 $this_retreat_id = $_POST['this_retreat_id'];
		 $program_title = $_POST['program_title'];
		 $program_night = $_POST['program_night'];
		 $program_address = $_POST['program_address'];
		 $program_price = $_POST['program_price'];
		 $program_image = $_POST['program_image'];
		 $program_inclusion = $_POST['program_inclusion_name'];
		 $program_rate = $_POST['program_rate'];
		 $program_date = $_POST['program_date'];
		 $program_desc = $_POST['program_discription_name'];
		
		global $wpdb;
		$wpdb->insert( 
			'wp_program', 
			array( 
				'post_id' => $this_retreat_id,
				'program_title' => $program_title,
				'program_night' => $program_night,
				'program_address' => $program_address,
				'program_price' => $program_price,
				'program_image' => $program_image,
				'rate' => $program_rate,
				'date' => $program_date,
				'program_desc' => $program_desc,
				'program_inclusion' => $program_inclusion,
				'program_date' => date('y-m-d'),
			),
			array( 
				'%d',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s'
			)
		);
		die();
		
		return true;
	}

	if($is_ajax == "get_retreat_program"){

		$_retreat_id = $_POST['this_retreat_id'];
		global $wpdb;
		
		$table_name = $wpdb->prefix . "program";
		echo $_retreat_id;
		
		$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name Where post_id = " .$_post_id  );

	}
	
	if($is_ajax == "programUpdate"){

		$id = $_POST['this_program_id'];
		$this_retreat_id = $_POST['this_retreat_id'];
		$programs_title = $_POST['programs_title'];
		$programs_night = $_POST['programs_night'];
		$programs_address = $_POST['programs_address'];
		$programs_price = $_POST['programs_price'];
		$programs_discription = $_POST['programs_discription_name'];
		$programs_inclusion = $_POST['programs_inclusion_name'];
		$programs_rate = $_POST['programs_rate'];
		$programs_image = $_POST['programs_image'];
		$programs_date = $_POST['programs_date'];


		global $wpdb;
		$wpdb->update( 
			'wp_program', 
			array( 
				'post_id' => $this_retreat_id,
				'program_title' => $programs_title,
				'program_night' => $programs_night,
				'program_address' => $programs_address,
				'program_price' => $programs_price,
				'rate' => $programs_rate,
				'date' => $programs_date,
				'program_image' => $programs_image,
				'program_inclusion' => $programs_inclusion,
				'program_desc' => $programs_discription,
			),
				array( 'ID' => $id ),
			array( 
				'%d',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s'
			),
				array( '%d' )
		);
		die();
		return true;
	}
	
	if($is_ajax=="deleteProgram"){
		$id = $_POST['this_program_id'];
		$wpdb->delete( 'wp_program', array( 'id' => $id ), array( '%d' ) );
	}
	
	
	if($is_ajax == "programNightSave"){

		$this_retreat_id = $_POST['this_retreat_id'];
		$night_title = $_POST['night_title'];
		$night_content = $_POST['night_content'];
		$night_condition = $_POST['night_condition'];
		$id_program = $_POST['id_program'];
		
		global $wpdb;
		$wpdb->insert( 
			'wp_night', 
			array( 
				'post_id' => $this_retreat_id,
				'program_id' => $id_program,
				'night_title' => $night_title,
				'night_content' => $night_content,
				'night_condition' => $night_condition,
			),
			array( 
				'%d',
				'%d',
				'%s',
				'%s',
				'%s'
			)
		);
		echo "success";
		die();
		return true;
	}
	
	if($is_ajax == "nightUpdate"){
		$this_retreat_id = $_POST['this_retreat_id'];
		$night_id = $_POST['this_night_id'];
		
		$programs_id = $_POST['programs_id'];
		$nights_title = $_POST['nights_title'];
		$nights_content = $_POST['nights_content'];
		$nights_condition = $_POST['nights_condition'];
		
		global $wpdb;
		$wpdb->update( 
			'wp_night', 
			array( 
				'post_id' => $this_retreat_id,
				'program_id' => $programs_id,
				'night_title' => $nights_title,
				'night_content' => $nights_content,
				'night_condition' => $nights_condition,
				
			),
				array( 'ID' => $night_id ),
			array( 
				'%d',
				'%d',
				'%s',
				'%s',
				'%s'
			),
				array( '%d' )
		);
		die();
		return true;
	}
	
	
	if($is_ajax == "programAwardSave"){

		$this_retreat_id = $_POST['this_retreat_id'];
		$award_title = $_POST['award_title'];
		$award_content = $_POST['award_content'];
		
		
		global $wpdb;
		$wpdb->insert( 
			'wp_award', 
			array( 
				'post_id' => $this_retreat_id,
				'award_title' => $award_title,
				'award_content' => $award_content,
				
			),
			array( 
				'%d',
				'%s',
				'%s'
			)
		);
		echo "success";
		die();
		return true;
	}
	
	if($is_ajax=="deleteAward"){
		$id = $_POST['this_award_id'];
		$wpdb->delete( 'wp_award', array( 'id' => $id ), array( '%d' ) );
	}
	
	if($is_ajax=="deleteNight"){
		$id = $_POST['this_night_id'];
		$wpdb->delete( 'wp_night', array( 'id' => $id ), array( '%d' ) );
	}
	
	if($is_ajax=="deleteAccommo"){
		$id = $_POST['delete_accommo'];
		$wpdb->delete( 'wp_accommodation', array( 'id' => $id ), array( '%d' ) );
	}
	
	if($is_ajax == "awardUpdate"){
		$this_retreat_id = $_POST['this_retreat_id'];
		$award_id = $_POST['this_award_id'];
		$awards_title = $_POST['awards_title'];
		$awards_content = $_POST['awards_content'];
		
		global $wpdb;
		$wpdb->update( 
			'wp_award', 
			array( 
				'post_id' => $this_retreat_id,
				'award_title' => $awards_title,
				'award_content' => $awards_content,
				
				
			),
				array( 'ID' => $award_id ),
			array( 
				'%d',
				'%s',
				'%s'
			),
				array( '%d' )
		);
		die();
		return true;
	}
	
/*
 * Retreat Accommodations
 */	
	
	if($is_ajax == "accommodationSave"){

		$this_retreat_id = $_POST['this_retreat_id'];
		$accommo_title = $_POST['accommo_title'];
		$accommo_image_first = $_POST['accommo_image_first'];
		$accommo_image_second = $_POST['accommo_image_second'];
		$accommo_image_third = $_POST['accommo_image_third'];
		$accommo_image_fourth = $_POST['accommo_image_fourth'];
		$accommo_image_fifth = $_POST['accommo_image_fifth'];
		$accommodation_discription = $_POST['accommodation_discription_name'];
		
		global $wpdb;
		$wpdb->insert( 
			'wp_accommodation', 
			array( 
				'post_id' => $this_retreat_id,
				'accommo_title' => $accommo_title,
				'accommo_image' => $accommo_image_first,
				'accommo_image_second' => $accommo_image_second,
				'accommo_image_third' => $accommo_image_third,
				'accommo_image_fourth' => $accommo_image_fourth,
				'accommo_image_fifth' => $accommo_image_fifth,
				'accommo_desc' => $accommodation_discription,
				'accommo_date' => date('y-m-d'),
				
			),
			array( 
				'%d',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s'
				
			)
		);
		die();
		return true;
	}

	if($is_ajax == "accommodationUpdate"){

		$id = $_POST['this_accommo_id'];
		$this_retreat_id = $_POST['this_retreat_id'];
		$accommos_title = $_POST['accommos_title'];
		$accommos_image = $_POST['accommos_image'];
		$accommos_image_second = $_POST['accommos_image_second'];
		$accommos_image_third = $_POST['accommos_image_third'];
		$accommos_image_fourth = $_POST['accommos_image_fourth'];
		$accommos_image_fifth = $_POST['accommos_image_fifth'];
		$accommodations_discription = $_POST['accommodations_discription_name'];
	


		global $wpdb;
		$wpdb->update( 
			'wp_accommodation', 
			array( 
				'post_id' => $this_retreat_id,
				'accommo_title' => $accommos_title,
				'accommo_image' => $accommos_image,
				'accommo_image_second' => $accommos_image_second,
				'accommo_image_third' => $accommos_image_third,
				'accommo_image_fourth' => $accommos_image_fourth,
				'accommo_image_fifth' => $accommos_image_fifth,
				'accommo_desc' => $accommodations_discription,
			),
				array( 'ID' => $id ),
			array( 
				'%d',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
			),
				array( '%d' )
		);
		die();
		return true;
	}
	
function retreat_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('image-upload', plugins_url( '/js/media-upload.js' , __FILE__ ), array('jquery','media-upload','thickbox')); 
	wp_enqueue_script('image-upload');
	wp_enqueue_script( 'jquery-ui' );
	wp_enqueue_script( 'retreat-custom', plugins_url( '/js/retreat-map.js', __FILE__ ));
	wp_enqueue_script( 'map-api', plugins_url( '/js/map-api.js', __FILE__ ));
	wp_register_script( 'maps', 'http://maps.google.com/maps/api/js?sensor=false', array(), null, false );
    wp_enqueue_script('maps');
}
function retreat_styles() {
	wp_enqueue_style('thickbox');
	wp_enqueue_style( 'custom-retreat', plugins_url('css/custom-retreat.css', __FILE__) );
}


add_action('admin_print_scripts', 'retreat_scripts');
add_action('admin_print_styles', 'retreat_styles');
?>
