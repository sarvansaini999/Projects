<?php
/*
Plugin Name: Villas
Description: Declares a plugin that will create a custom post type
Version: 1.0
*/

add_action( 'init', 'create_villa_category' );

function create_villa_category() {
    register_taxonomy(
        'villa_category',
        'villas',
        array(
            'labels' => array(
                'name' => 'Villa Categories',
                'add_new_item' => 'Add New Villa Category',
                'new_item_name' => "New Villa Type Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
			'rewrite'      => array('slug' => 'villa-category', 'with_front' => false) 
        )
    );
}

add_action( 'init', 'create_villa' );	

function create_villa() {
	register_post_type( 'villas',
		array(
			'labels' => array(
				'name' => 'Villas',
				'singular_name' => 'Villa',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Villa',
				'edit' => 'Edit',
				'edit_item' => 'Edit Villa',
				'new_item' => 'New Villa',
				'view' => 'View',
				'view_item' => 'View Villa',
				'search_items' => 'Search Villas',
				'not_found' => 'No Villas found',
				'not_found_in_trash' =>
				'No Villas found in Trash',
				'parent' => 'Parent Villa'
			),
			'public' => true,
			'menu_position' => 15,
			'supports' =>
			array( 'title', 'editor',
			'thumbnail', 'wpb-visual-composer', 'revisions' ),
			'taxonomies' => array( 'post_tag', 'category'),
			'rewrite' => array( 'with_front' => false, 'slug' => 'bali-villas'),
			
			'has_archive' => true
			
		)
	);
}

add_action( 'admin_init', 'villa_admin' );

function villa_admin() {
	add_meta_box( 'villa_meta_box',
		'Villa Details',
		'display_villa_meta_box',
		'villas', 'normal', 'high' 
	);
	
	add_meta_box( 'villa_meta_box_gallery',
		'Villa Image Gallery',
		'display_villa_meta_box_gallery',
		'villas', 'normal', 'high' 
	);
	
	add_meta_box( 'villa_meta_box_slider',
		'Villa Slider Images',
		'display_villa_meta_box_slider',
		'villas', 'normal', 'high' 
	);
}

function display_villa_meta_box( $villa ) {

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
	
	$_guest = '';
	$_bedrooms = '';
	$_bathrooms = '';
	$_private_pool_villa = '';
	$_price_from = '';
	$_price_to = '';
	$_staff = '';
	
	$_short_text = '';
	$_overview = '';
	$_vibe = '';
	$_layout = '';
	$_master_bedroom = '';
	$_guest_bedroom = '';
	$_outdoor_living = '';
	$_gallery_link = '';
	$_rate_term = '';
	$_rate_term_second = '';
	$_rate_term_third = '';
	$_discount = '';
	$_availability = '';
	$_facilities = '';
	$_inclusion = '';
	
	$_extra = '';
	$_need_to_know = '';
	$_hot_deal = '';
	$_location = '';
	$_address = '';
	$_location_discription = '';
	$_seasons = '';
	
	$_review_author1 = '';
	$_review_author_email1 = '';
	$_review_rating1 = '';
	$_villa_review1 = '';
	
	$_review_author2 = '';
	$_review_author_email2 = '';
	$_review_rating2 = '';
	$_villa_review2 = '';

	$_post_id = get_the_ID(); 
	
	
	$_bedrooms = get_post_meta( $villa->ID,'bedrooms', true );
	
	$_bathrooms = get_post_meta( $villa->ID,'bathrooms', true );
	
	$_private_pool_villa = get_post_meta( $villa->ID,'private_pool_villa', true );
	
	$_beachfront = get_post_meta( $villa->ID,'beachfront', true );
	
	$_guest = get_post_meta( $villa->ID,'guest', true );
	
	$_price_from = get_post_meta( $villa->ID,'price_from', true );
	
	$_price_to = get_post_meta( $villa->ID,'price_to', true );
	
	$_staff = get_post_meta( $villa->ID,'staff', true );
	
	$_short_text = get_post_meta( $villa->ID,'short_text', true );
	
	$_vibe = get_post_meta( $villa->ID,'vibe', true );
	
	$_layout = get_post_meta( $villa->ID,'layout', true );
	
	$_master_bedroom = get_post_meta( $villa->ID,'master_bedroom', true );
	
	$_guest_bedroom = get_post_meta( $villa->ID,'guest_bedroom', true );
	
	$_outdoor_living = get_post_meta( $villa->ID,'outdoor_living', true );
	
	$_overview = get_post_meta( $villa->ID,'overview', true );
	
	$_gallery_link = get_post_meta( $villa->ID,'gallery_link', true );
	
	$_rate_term = get_post_meta( $villa->ID,'rate_term', true );
	
	$_rate_term_second = get_post_meta( $villa->ID,'rate_term_second', true );
	
	$_rate_term_third = get_post_meta( $villa->ID,'rate_term_third', true );
	
	$_availability = get_post_meta( $villa->ID,'availability', true );
	
	$_discount = get_post_meta( $villa->ID,'discount', true );
	
	$_facilities = get_post_meta( $villa->ID,'facilities', true );
	
	$_inclusion = get_post_meta( $villa->ID,'inclusion', true );
	
	$_extra = get_post_meta( $villa->ID,'extra', true );
	
	$_need_to_know = get_post_meta( $villa->ID,'need_to_know', true );
	
	$_hot_deal = get_post_meta( $villa->ID,'hot_deal', true );
	
	$_location = get_post_meta( $villa->ID,'location', true );
	
	$_longitude = get_post_meta( $villa->ID,'longitude', true );
	
	$_latitude  = get_post_meta( $villa->ID,'latitude', true );
	
	$_address = get_post_meta( $villa->ID,'address', true );
	
	$_location_description = get_post_meta( $villa->ID,'location_description', true );
	
	$_low_season = get_post_meta( $villa->ID,'low_season', true );
	
	$_high_season = get_post_meta( $villa->ID,'high_season', true );
	
	$_peak_season = get_post_meta( $villa->ID,'peak_season', true );
	
	$_review = get_post_meta( $villa->ID,'review', true );
	
	$_facebook = get_post_meta( $villa->ID,'facebook', true );
	
	$_twitter = get_post_meta( $villa->ID,'twitter', true );
	
	$_related = get_post_meta( $villa->ID,'related', true );
	
	$_post_id = $villa->ID;
	?>
		
		<div class="images-gallery">
			<p><strong>Images Gallery URL</strong></p>
			<p>
				<input type="text" size="80" id="gallery_images_link" name="gallery_images_link" placeholder="Please Enter Gallery Page Link" value="<?php echo $_gallery_link ; ?>" />
				
			</p>
		</div>
	  
	  <div class="meta-box">
		<p><strong>Guests</strong></p>
		<p><input type="text" size="80" name="guest_name" value="<?php echo $_guest; ?>" /></p>
	  </div>
	  <div class="meta-box">
		<p><strong>Bedrooms</strong></p>
		<p><input type="text" size="80" name="bedrooms_name" value="<?php echo $_bedrooms; ?>" /></p>
	  </div>
	  <div class="meta-box">
		<p><strong>Bathrooms</strong></p>
		<p><input type="text" size="80" name="bathrooms_name" value="<?php echo $_bathrooms; ?>" /></p>
	  </div>
	  <div class="meta-box">
		<p><strong>Private Pool Villa</strong></p>
		<p><input type="text" size="80" name="private_pool_villa_name" value="<?php echo $_private_pool_villa; ?>" /></p>
	  </div>
	  <div class="meta-box">
		<p><strong>Beachfront</strong></p>
		<p><input type="text" size="80" name="beachfront_name" value="<?php echo $_beachfront; ?>" /></p>
	  </div>
	  <div class="meta-box">	
		<p><strong>Low Price [ currency $ ]</strong></p>
		<p><input type="text" size="80" name="price_low" value="<?php echo $_price_from; ?>" /></p>
	  </div>
	  
	  <div class="meta-box">	
		<p><strong>High Price [ currency $ ]</strong></p>
		<p><input type="text" size="80" name="price_high" value="<?php echo $_price_to; ?>" /></p>
	  </div>
	  
	  
		<p><strong>Overview</strong></p>
		<?php
			$settings = array(
			'textarea_rows' => 8,
			  'tabindex' => 4,
			  'tinymce' => array(
				'theme_advanced_buttons1' => 'bold, italic, ul, pH, temp',
			  ),
			);
			
			wp_editor( $_overview, 'overview_name'); 
		?>
		<p><strong>The Vibe</strong></p>
		<?php
		
			wp_editor( $_vibe, 'vibe_name'); 
		?>
		
		<p><strong>The Layout</strong></p>
		<?php
		
			wp_editor( $_layout, 'layout_name' ); 
		?>
		
		
		<h2>Rates & inclusions</h2>
		
		<div class="meta-box">	
		<p><strong>Special Discount</strong></p>
		<p><input type="text" size="80" name="discount_name" value="<?php echo $_discount; ?>" /></p>
	  </div>
		
		<p><strong>Rates & Terms ( <?php echo "Year-2016"; ?> )</strong></p>
		<?php
			wp_editor( $_rate_term_second, 'rate_term_second_name' );
		?>
		
		<p><strong>Rates & Terms ( <?php echo "Year-2017"; ?> )</strong></p>
		<?php
			wp_editor( $_rate_term_third, 'rate_term_third_name' );
		?>
		
		<p><strong>Rates & Terms ( <?php echo "Year-2018"; ?> )</strong></p>
		<?php
			wp_editor( $_rate_term, 'rate_term_name' );
		?>
		
		<div class="meta-box">	
			<p><strong>Availability Calendar</strong></p>
			<p><input type="text" size="80" name="availability_name" value="<?php echo $_availability; ?>" /></p>
		</div>
		
		<p><strong>Inclusions</strong></p>
		<?php
		 	wp_editor( $_inclusion, 'inclusion_name', $settings );
	  	?>
		
		<p><strong>Extras</strong></p>
		<?php
		 	wp_editor( $_extra, 'extra_name', $settings );
	  	?>
	  
		<p><strong>Policies</strong></p>
		<?php
			 wp_editor( $_need_to_know, 'need_to_know_name', $settings );
		?>
		
			
			<p><strong>Villa Staff</strong></p>
			
			<?php
			 wp_editor( $_staff, 'staff_name', $settings );
			
			?>
		
		
		<p><strong>Quick Facts</strong></p>
		<?php
			 wp_editor( $_facilities, 'facilities_name' );
			
		?>
	  
	  	
	 
	  <div class="meta-box">
			<p><strong>Location</strong></p>
			<p>
				<select name="location_name">
				  <?php if(empty($_location)){ ?>
					<option value="0">All</option>
				  <?php } ?>
					
					<option value="seminyak" <?php if($_location=="seminyak") echo 'selected="selected"'; ?> >Seminyak</option>
					<option value="ubud" <?php if($_location=="ubud") echo 'selected="selected"'; ?> >Ubud</option>
					<option value="canggu" <?php if($_location=="canggu") echo 'selected="selected"'; ?> >Canggu</option>
					<option value="umalas" <?php if($_location=="umalas") echo 'selected="selected"'; ?> >Umalas</option>
					<option value="kerobokan" <?php if($_location=="kerobokan") echo 'selected="selected"'; ?> >Kerobokan</option>
					<option value="candidasa" <?php if($_location=="candidasa") echo 'selected="selected"'; ?> >Candidasa</option>
					<option value="amed" <?php if($_location=="amed") echo 'selected="selected"'; ?> >Amed</option>
					<option value="sanur_ketewel" <?php if($_location=="sanur_ketewel") echo 'selected="selected"'; ?> >Sanur-Ketewel</option>
					<option value="uluwatu" <?php if($_location=="uluwatu") echo 'selected="selected"'; ?> >Uluwatu</option>
					<option value="jimbaran" <?php if($_location=="jimbaran") echo 'selected="selected"'; ?> >Jimbaran</option>
					<option value="nusa_dua" <?php if($_location=="nusa_dua") echo 'selected="selected"'; ?> >Nusa Dua</option>
					<option value="tabanan" <?php if($_location=="tabanan") echo 'selected="selected"'; ?> >Tabanan</option>
					<option value="seseh_tanah_lot" <?php if($_location=="seseh_tanah_lot") echo 'selected="selected"'; ?> >Seseh-Tanah Lot</option>
				</select>
			</p>
		</div>
		
		<div class="meta-box">	
			<p><strong>Latitude </strong></p>
			<p><input type="text" size="80" id="latitude_name" name="latitude_name" value="<?php echo $_latitude; ?>" onkeyup="mapFunction()"/></p>
		</div>
		
		<div class="meta-box">	
			<p><strong>Longitude</strong></p>
			<p><input type="text" size="80" id="longitude_name" name="longitude_name" value="<?php echo $_longitude; ?>" onkeyup="mapFunction()"/></p>
		</div>
	  
		
		<p><strong>Location & Map</strong></p>
		<p><input type="text" size="80" placeholder="Type to search" name="address_name" id="address" value="<?php echo $_address ;?>"  /></p>
		<div id="villaMap" style="width: 100%; height: 400px;"></div>
		<iframe onload="mapFunction();" style="display:none;"></iframe>
		
	  	
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
	 
	 <div class="review-box">
		<strong>Review Section</strong>
		<div class="review" id="reviewForm">
		
		<p><strong>Name</strong></p>
		<input type="hidden" name="post_id" id="post_id" size="80" value="<?php echo $_post_id; ?>" />
		<p><input type="text" name="review_author_name1" id="review_author_name1" size="80" value="<?php echo $_review_author1; ?>" /></p>
		<p><strong>Title</strong></p>
		<p><input type="text" name="review_title" id="review_title" size="80" value="" /></p>
		<p><strong>Country</strong></p>
		<p><input type="text" name="country" id="country" size="80" value="" /></p>
		<p><strong>Publish Date</strong></p>
		<p><input type="text" name="publish_date" id="publish_date" size="80" value="" placeholder="<?php echo date(' F Y');  ?>"/></p>
		<p><strong>Email</strong></p>
		<p><input type="text" name="review_author_email_address1" id="review_author_email_address1" size="80" value="<?php echo $_review_author_email1; ?>" /></p>
		<p><strong>Rating</strong></p>
		<p><input type="text" name="review_rating1" id="review_rating1" size="80" value="<?php echo $_review_rating; ?>" /></p>
		<p><strong>Review</strong></p>
		<p><textarea name="villa_review1" id="villa_review1" rows="6" cols="60" style="width:49%;"><?php echo $_villa_review1; ?></textarea></p>
		<span id="message" style="color:red;"></span>
		<p><input type="button" name="review" id="review" value="Save"></p>
		</div>
		
	</div>
	
	<div class="review-box">	
		<input type="hidden" name="show_post_id" id="show_post_id" size="80" value="<?php echo $_post_id; ?>" />
		<p class="display-review"><span id="showReview">Recent Reviews</span></p>
		<p><span id="reviewContent" style="color: #fff;">
		<?php	global $wpdb;
		
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
			
			<?php $nb_stars = $retrieved_data->review_rating; ?>
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
			<td><input type="hidden" class="delete_id" name="delete_id" id="delete_id" value="<?php echo $id;?>"><img src="<?php echo plugins_url( 'images/edit.png', __FILE__ )?>" title="Edit" id="<?php echo $id;?>" class="edit"></td><td><img src="<?php echo plugins_url( 'images/cross.png', __FILE__ )?>" title="Delete" id="<?php echo $id;?>" class="delete"/></td>	
			
		</tr>
			
			
		<?php 
		}
		?>
		</table>
		
		</span></p>
		<p><span id="reviewEditForm" style="color: #fff;"></span></p>
	</div>
	
	<div id="confirmation-box-review" class="confirmation-box" style="border: 1px solid #e2e2e2; padding: 15px; display:none;">
		<div class="popupConfirmation" id="popupConfirmation">
		<span onclick="RPopUpHide()" class="close-btnR">&times;</span>
			<p>Are you sure you want to delete this?</p>
			<input type="hidden" id="confirmationR_id" value="" />
			<input class="button-style" type="button" id="yes_delete_review" Value="Yes"/>
			<input class="button-style" type="button" id="no_delete_review" Value="No"/>
		</div>
	</div>
	
	<div class="meta-box-textarea">	
		<p><strong>Short Description</strong></p>
		<p><textarea name="short_desc"  rows="4" cols="60" style="width:75%;"><?php echo $_short_text; ?></textarea></p>
		
	</div>
	<?php 
}

function display_villa_meta_box_slider( $villa ) {
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
	
	$_first_image =  get_post_meta( $villa->ID, 'first_image', true );
	
	$_first_image_title =  get_post_meta( $villa->ID, 'first_image_title', true );
	
	$_first_image_alternate =  get_post_meta( $villa->ID, 'first_image_alternate', true );
	
	$_second_image =  get_post_meta( $villa->ID, 'second_image', true );
	
	$_second_image_title =  get_post_meta( $villa->ID, 'second_image_title', true );
	
	$_second_image_alternate =  get_post_meta( $villa->ID, 'second_image_alternate', true );
	
	$_third_image =  get_post_meta( $villa->ID, 'third_image', true );
	
	$_third_image_title =  get_post_meta( $villa->ID, 'third_image_title', true );
	
	$_third_image_alternate =  get_post_meta( $villa->ID, 'third_image_alternate', true );
	
	$_fourth_image =  get_post_meta( $villa->ID, 'fourth_image', true );
	
	$_fourth_image_title =  get_post_meta( $villa->ID, 'fourth_image_title', true );
	
	$_fourth_image_alternate =  get_post_meta( $villa->ID, 'fourth_image_alternate', true );
	
	$_fifth_image =  get_post_meta( $villa->ID, 'fifth_image', true );
	
	$_fifth_image_title =  get_post_meta( $villa->ID, 'fifth_image_title', true );
	
	$_fifth_image_alternate =  get_post_meta( $villa->ID, 'fifth_image_alternate', true );
	
	$_six_image =  get_post_meta( $villa->ID, 'six_image', true );
	
	$_six_image_title =  get_post_meta( $villa->ID, 'six_image_title', true );
	
	$_six_image_alternate =  get_post_meta( $villa->ID, 'six_image_alternate', true );
	
	$_seven_image =  get_post_meta( $villa->ID, 'seven_image', true );
	
	$_seven_image_title =  get_post_meta( $villa->ID, 'seven_image_title', true );
	
	$_seven_image_alternate =  get_post_meta( $villa->ID, 'seven_image_alternate', true );
	
	$_eight_image =  get_post_meta( $villa->ID, 'eight_image', true );
	
	$_eight_image_title =  get_post_meta( $villa->ID, 'eight_image_title', true );
	
	$_eight_image_alternate =  get_post_meta( $villa->ID, 'eight_image_alternate', true );
	
	
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

function display_villa_meta_box_gallery( $villa ) {

	$_first_gallery_img = '';
	
	$_second_gallery_img = '';
	
	$_third_gallery_img = '';
	
	$_fourth_gallery_img = '';
	
	$_fifth_gallery_img = '';
	
	$_six_gallery_img = '';
	
	$_seven_gallery_img = '';
	
	$_eight_gallery_img = '';
	
	$_nine_gallery_img = '';
	
	$_first_gallery_img =  get_post_meta( $villa->ID, 'first_gallery_img', true );
	
	$_second_gallery_img =  get_post_meta( $villa->ID, 'second_gallery_img', true );
	
	$_third_gallery_img =  get_post_meta( $villa->ID, 'third_gallery_img', true );
	
	$_fourth_gallery_img =  get_post_meta( $villa->ID, 'fourth_gallery_img', true );
	
	$_fifth_gallery_img =  get_post_meta( $villa->ID, 'fifth_gallery_img', true );
	
	$_six_gallery_img =  get_post_meta( $villa->ID, 'six_gallery_img', true );
	
	$_seven_gallery_img =  get_post_meta( $villa->ID, 'seven_gallery_img', true );
	
	$_eight_gallery_img =  get_post_meta( $villa->ID, 'eight_gallery_img', true );
	
	$_nine_gallery_img =  get_post_meta( $villa->ID, 'nine_gallery_img', true );
	
	$_first_thumb_title =  get_post_meta( $villa->ID, 'first_thumb_title', true );
	
	$_first_thumb_alt =  get_post_meta( $villa->ID, 'first_image_thumb_alt', true );
	
	$_second_thumb_title =  get_post_meta( $villa->ID, 'second_thumb_title', true );
	
	$_second_thumb_alt =  get_post_meta( $villa->ID, 'second_image_thumb_alt', true );
	
	$_third_thumb_title =  get_post_meta( $villa->ID, 'third_thumb_title', true );
	
	$_third_thumb_alt =  get_post_meta( $villa->ID, 'third_image_thumb_alt', true );
	
	$_fourth_thumb_title =  get_post_meta( $villa->ID, 'fourth_thumb_title', true );
	
	$_fourth_thumb_alt =  get_post_meta( $villa->ID, 'fourth_image_thumb_alt', true );
	
	$_fifth_thumb_title =  get_post_meta( $villa->ID, 'fifth_thumb_title', true );
	
	$_fifth_thumb_alt =  get_post_meta( $villa->ID, 'fifth_image_thumb_alt', true );
	
	$_six_thumb_title =  get_post_meta( $villa->ID, 'six_thumb_title', true );
	
	$_six_thumb_alt =  get_post_meta( $villa->ID, 'six_image_thumb_alt', true );
	
	$_seven_thumb_title =  get_post_meta( $villa->ID, 'seven_thumb_title', true );
	
	$_seven_thumb_alt =  get_post_meta( $villa->ID, 'seven_image_thumb_alt', true );
	
	$_eight_thumb_title =  get_post_meta( $villa->ID, 'eight_thumb_title', true );
	
	$_eight_thumb_alt =  get_post_meta( $villa->ID, 'eight_image_thumb_alt', true );
	
	$_nine_thumb_title =  get_post_meta( $villa->ID, 'nine_thumb_title', true );
	
	$_nine_thumb_alt =  get_post_meta( $villa->ID, 'nine_image_thumb_alt', true );
	
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
			</p>
			<p><input type="text" name="first_thumb_title_name" size="80" placeholder="First Thumb Title" value="<?php echo $_first_thumb_title; ?>" /></p>
			<p><input type="text" name="first_thumb_alt" size="80" placeholder="Alternate Text For First Thumb" value="<?php echo $_first_thumb_alt; ?>"></p>
			
		</div>
		<div class="images-gallery">		
			<p><strong>Second Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="second_gallery_image" name="second_gallery_image" placeholder="Upload Second Gallery Image" value="<?php echo $_second_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="second_thumb_title_name" size="80" placeholder="Second Thumb Title" value="<?php echo $_second_thumb_title; ?>" /></p>
			<p><input type="text" name="second_thumb_alt" size="80" placeholder="Alternate Text For Second Thumb" value="<?php echo $_second_thumb_alt; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Third Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="third_gallery_image" name="third_gallery_image" placeholder="Upload Third Gallery Image" value="<?php echo $_third_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="third_thumb_title_name" size="80" placeholder="Third Thumb Title" value="<?php echo $_third_thumb_title; ?>" /></p>
			<p><input type="text" name="third_thumb_alt" size="80" placeholder="Alternate Text For Third Thumb" value="<?php echo $_third_thumb_alt; ?>"></p>
		</div>
		<span class="thumb-heading"><h3>Three Thumbnails above to "Rates & Inclusions"</h3></span>
		<div class="images-gallery">	
			<p><strong>First Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="fourth_gallery_image" name="fourth_gallery_image" placeholder="Upload First Gallery Image" value="<?php echo $_fourth_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="fourth_thumb_title_name" size="80" placeholder="First Thumb Title" value="<?php echo $_fourth_thumb_title; ?>" /></p>
			<p><input type="text" name="fourth_thumb_alt" size="80" placeholder="Alternate Text For First Thumb" value="<?php echo $_fourth_thumb_alt; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Second Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="fifth_gallery_image" name="fifth_gallery_image" placeholder="Upload Second Gallery Image" value="<?php echo $_fifth_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="fifth_thumb_title_name" size="80" placeholder="Second Thumb Title" value="<?php echo $_fifth_thumb_title; ?>" /></p>
			<p><input type="text" name="fifth_thumb_alt" size="80" placeholder="Alternate Text For Second Thumb" value="<?php echo $_fifth_thumb_alt; ?>"></p>
		</div>
		<div class="images-gallery">		
			<p><strong>Third Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="six_gallery_image" name="six_gallery_image" placeholder="Upload Third Gallery Image" value="<?php echo $_six_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="six_thumb_title_name" size="80" placeholder="Third Thumb Title" value="<?php echo $_six_thumb_title; ?>" /></p>
			<p><input type="text" name="six_thumb_alt" size="80" placeholder="Alternate Text For Third Thumb" value="<?php echo $_six_thumb_alt; ?>"></p>
		</div>
		<span class="thumb-heading"><h3>Three Thumbnail above to "Quick Facts"</h3></span>
		<div class="images-gallery">	
			<p><strong>First Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="seven_gallery_image" name="seven_gallery_image" placeholder="Upload First Gallery Image" value="<?php echo $_seven_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="seven_thumb_title_name" size="80" placeholder="First Thumb Title" value="<?php echo $_seven_thumb_title; ?>" /></p>
			<p><input type="text" name="seven_thumb_alt" size="80" placeholder="Alternate Text For First Thumb" value="<?php echo $_seven_thumb_alt; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Second Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="eight_gallery_image" name="eight_gallery_image" placeholder="Upload Second Gallery Image" value="<?php echo $_eight_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="eight_thumb_title_name" size="80" placeholder="Second Thumb Title" value="<?php echo $_eight_thumb_title; ?>" /></p>
			<p><input type="text" name="eight_thumb_alt" size="80" placeholder="Alternate Text For Second Thumb" value="<?php echo $_eight_thumb_alt; ?>"></p>
		</div>
		<div class="images-gallery">	
			<p><strong>Third Thumbnail Image</strong></p>
			<p>
				<input type="text" size="80" id="nine_gallery_image" name="nine_gallery_image" placeholder="Upload Third Gallery Image" value="<?php echo $_nine_gallery_img ; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/>
			</p>
			<p><input type="text" name="nine_thumb_title_name" size="80" placeholder="Third Thumb Title" value="<?php echo $_nine_thumb_title; ?>" /></p>
			<p><input type="text" name="nine_thumb_alt" size="80" placeholder="Alternate Text For Third Thumb" value="<?php echo $_nine_thumb_alt; ?>"></p>
		</div>
	<?php }

add_action( 'save_post','add_villa_fields', 10, 2 );

function add_villa_fields( $villa_id,$villa ) {
	
	if ( $villa->post_type == 'villas' ) {
		
		if ( isset( $_POST['upload_first_image'] )  ) {
			update_post_meta( $villa_id, 'first_image', $_POST['upload_first_image'] );
		}
		if ( isset( $_POST['first_image_title_name'] )  ) {
			update_post_meta( $villa_id, 'first_image_title', $_POST['first_image_title_name'] );
		}
		if ( isset( $_POST['first_alternate'] )  ) {
			update_post_meta( $villa_id, 'first_image_alternate', $_POST['first_alternate'] );
		}
		if ( isset( $_POST['upload_second_image'] )) {
			update_post_meta( $villa_id, 'second_image', $_POST['upload_second_image'] );
		}
		if ( isset( $_POST['second_image_title_name'] )) {
			update_post_meta( $villa_id, 'second_image_title', $_POST['second_image_title_name'] );
		}
		if ( isset( $_POST['second_alternate'] )) {
			update_post_meta( $villa_id, 'second_image_alternate', $_POST['second_alternate'] );
		}
		if ( isset( $_POST['upload_third_image'] )) {
			update_post_meta( $villa_id, 'third_image', $_POST['upload_third_image'] );
		}
		if ( isset( $_POST['third_image_title_name'] )) {
			update_post_meta( $villa_id, 'third_image_title', $_POST['third_image_title_name'] );
		}
		if ( isset( $_POST['third_alternate'] )) {
			update_post_meta( $villa_id, 'third_image_alternate', $_POST['third_alternate'] );
		}
		if ( isset( $_POST['upload_fourth_image'] )) {
			update_post_meta( $villa_id, 'fourth_image', $_POST['upload_fourth_image'] );
		}
		if ( isset( $_POST['fourth_image_title_name'] )) {
			update_post_meta( $villa_id, 'fourth_image_title', $_POST['fourth_image_title_name'] );
		}
		if ( isset( $_POST['fourth_alternate'] )) {
			update_post_meta( $villa_id, 'fourth_image_alternate', $_POST['fourth_alternate'] );
		}
		if ( isset( $_POST['upload_fifth_image'] )) {
			update_post_meta( $villa_id, 'fifth_image', $_POST['upload_fifth_image'] );
		}
		if ( isset( $_POST['fifth_image_title_name'] )) {
			update_post_meta( $villa_id, 'fifth_image_title', $_POST['fifth_image_title_name'] );
		}
		if ( isset( $_POST['fifth_alternate'] )) {
			update_post_meta( $villa_id, 'fifth_image_alternate', $_POST['fifth_alternate'] );
		}
		if ( isset( $_POST['upload_six_image'] )) {
			update_post_meta( $villa_id, 'six_image', $_POST['upload_six_image'] );
		}
		if ( isset( $_POST['six_image_title_name'] )) {
			update_post_meta( $villa_id, 'six_image_title', $_POST['six_image_title_name'] );
		}
		if ( isset( $_POST['six_alternate'] )) {
			update_post_meta( $villa_id, 'six_image_alternate', $_POST['six_alternate'] );
		}
		if ( isset( $_POST['upload_seven_image'] )) {
			update_post_meta( $villa_id, 'seven_image', $_POST['upload_seven_image'] );
		}
		if ( isset( $_POST['seven_image_title_name'] )) {
			update_post_meta( $villa_id, 'seven_image_title', $_POST['seven_image_title_name'] );
		}
		if ( isset( $_POST['seven_alternate'] )) {
			update_post_meta( $villa_id, 'seven_image_alternate', $_POST['seven_alternate'] );
		}
		if ( isset( $_POST['upload_eight_image'] )) {
			update_post_meta( $villa_id, 'eight_image', $_POST['upload_eight_image'] );
		}
		if ( isset( $_POST['eight_image_title_name'] )) {
			update_post_meta( $villa_id, 'eight_image_title', $_POST['eight_image_title_name'] );
		}
		if ( isset( $_POST['eight_alternate'] )) {
			update_post_meta( $villa_id, 'eight_image_alternate', $_POST['eight_alternate'] );
		}
		if ( isset( $_POST['guest_name'] )) {
			update_post_meta( $villa_id, 'guest', $_POST['guest_name'] );
		}
		if ( isset( $_POST['bedrooms_name'] )) {
			update_post_meta( $villa_id, 'bedrooms', $_POST['bedrooms_name'] );
		}
		if ( isset( $_POST['bathrooms_name'] )) {
			update_post_meta( $villa_id, 'bathrooms', $_POST['bathrooms_name'] );
		}
		if ( isset( $_POST['private_pool_villa_name'] )) {
			update_post_meta( $villa_id, 'private_pool_villa', $_POST['private_pool_villa_name'] );
		}
		if ( isset( $_POST['beachfront_name'] )) {
			update_post_meta( $villa_id, 'beachfront', $_POST['beachfront_name'] );
		}
		if ( isset( $_POST['price_low'] )) {
			update_post_meta( $villa_id, 'price_from', $_POST['price_low'] );
		}
		if ( isset( $_POST['price_high'] )) {
			update_post_meta( $villa_id, 'price_to', $_POST['price_high'] );
		}
		if ( isset( $_POST['staff_name'] )) {
			update_post_meta( $villa_id, 'staff', $_POST['staff_name'] );
		}
		if ( isset( $_POST['short_desc'] )) {
			update_post_meta( $villa_id, 'short_text', $_POST['short_desc'] );
		}
		if ( isset( $_POST['overview_name'] )) {
			update_post_meta( $villa_id, 'overview', $_POST['overview_name'] );
		}
		if ( isset( $_POST['vibe_name'] )) {
			update_post_meta( $villa_id, 'vibe', $_POST['vibe_name'] );
		}
		if ( isset( $_POST['layout_name'] )) {
			update_post_meta( $villa_id, 'layout', $_POST['layout_name'] );
		}
		if ( isset( $_POST['master_bedroom_name'] )) {
			update_post_meta( $villa_id, 'master_bedroom', $_POST['master_bedroom_name'] );
		}
		if ( isset( $_POST['guest_bedroom_name'] )) {
			update_post_meta( $villa_id, 'guest_bedroom', $_POST['guest_bedroom_name'] );
		}
		if ( isset( $_POST['outdoor_living_name'] )) {
			update_post_meta( $villa_id, 'outdoor_living', $_POST['outdoor_living_name'] );
		}
		if ( isset( $_POST['gallery_images_link'] )) {
			update_post_meta( $villa_id, 'gallery_link', $_POST['gallery_images_link'] );
		}
		if ( isset( $_POST['rate_term_name'] )) {
			update_post_meta( $villa_id, 'rate_term', $_POST['rate_term_name'] );
		}
		if ( isset( $_POST['rate_term_second_name'] )) {
			update_post_meta( $villa_id, 'rate_term_second', $_POST['rate_term_second_name'] );
		}
		if ( isset( $_POST['rate_term_third_name'] )) {
			update_post_meta( $villa_id, 'rate_term_third', $_POST['rate_term_third_name'] );
		}
		if ( isset( $_POST['discount_name'] )) {
			update_post_meta( $villa_id, 'discount', $_POST['discount_name'] );
		}
		if ( isset( $_POST['availability_name'] )) {
			update_post_meta( $villa_id, 'availability', $_POST['availability_name'] );
		}
		if ( isset( $_POST['facilities_name'] )) {
			update_post_meta( $villa_id, 'facilities', $_POST['facilities_name'] );
		}
		if ( isset( $_POST['inclusion_name'] )) {
			update_post_meta( $villa_id, 'inclusion', $_POST['inclusion_name'] );
		}
		if ( isset( $_POST['extra_name'] )) {
			update_post_meta( $villa_id, 'extra', $_POST['extra_name'] );
		}
		if ( isset( $_POST['need_to_know_name'] )) {
			update_post_meta( $villa_id, 'need_to_know', $_POST['need_to_know_name'] );
		}
		if ( isset( $_POST['hot_deal_name'] )) {
			update_post_meta( $villa_id, 'hot_deal', $_POST['hot_deal_name'] );
		}
		if ( isset( $_POST['location_name'] )) {
			update_post_meta( $villa_id, 'location', $_POST['location_name'] );
		}
		if ( isset( $_POST['longitude_name'] )) {
			update_post_meta( $villa_id, 'longitude', $_POST['longitude_name'] );
		}
		if ( isset( $_POST['latitude_name'] )) {
			update_post_meta( $villa_id, 'latitude', $_POST['latitude_name'] );
		}
		if ( isset( $_POST['address_name'] )) {
			update_post_meta( $villa_id, 'address', $_POST['address_name'] );
		}
		if ( isset( $_POST['location_desc'] )) {
			update_post_meta( $villa_id, 'location_description', $_POST['location_desc'] );
		}
		if ( isset( $_POST['low_season_name'] )) {
			update_post_meta( $villa_id, 'low_season', $_POST['low_season_name'] );
		}
		if ( isset( $_POST['high_season_name'] )) {
			update_post_meta( $villa_id, 'high_season', $_POST['high_season_name'] );
		}
		if ( isset( $_POST['peak_season_name'] )) {
			update_post_meta( $villa_id, 'peak_season', $_POST['peak_season_name'] );
		}
		if ( isset( $_POST['review_name'] )) {
			update_post_meta( $villa_id, 'review', $_POST['review_name'] );
		}
		if ( isset( $_POST['facebook_name'] )) {
			update_post_meta( $villa_id, 'facebook', $_POST['facebook_name'] );
		}
		if ( isset( $_POST['twitter_name'] )) {
			update_post_meta( $villa_id, 'twitter', $_POST['twitter_name'] );
		}
		if ( isset( $_POST['first_gallery_image'] ) ) {
			update_post_meta( $villa_id, 'first_gallery_img', $_POST['first_gallery_image'] );
		}
		if ( isset( $_POST['first_thumb_title_name'] ) ) {
			update_post_meta( $villa_id, 'first_thumb_title', $_POST['first_thumb_title_name'] );
		}
		if ( isset( $_POST['first_thumb_alt'] ) ) {
			update_post_meta( $villa_id, 'first_image_thumb_alt', $_POST['first_thumb_alt'] );
		}
		if ( isset( $_POST['second_gallery_image'] ) ) {
			update_post_meta( $villa_id, 'second_gallery_img', $_POST['second_gallery_image'] );
		}
		if ( isset( $_POST['second_thumb_title_name'] ) ) {
			update_post_meta( $villa_id, 'second_thumb_title', $_POST['second_thumb_title_name'] );
		}
		if ( isset( $_POST['second_thumb_alt'] ) ) {
			update_post_meta( $villa_id, 'second_image_thumb_alt', $_POST['second_thumb_alt'] );
		}
		if ( isset( $_POST['third_gallery_image'] ) ) {
			update_post_meta( $villa_id, 'third_gallery_img', $_POST['third_gallery_image'] );
		}
		if ( isset( $_POST['third_thumb_title_name'] ) ) {
			update_post_meta( $villa_id, 'third_thumb_title', $_POST['third_thumb_title_name'] );
		}
		if ( isset( $_POST['third_thumb_alt'] ) ) {
			update_post_meta( $villa_id, 'third_image_thumb_alt', $_POST['third_thumb_alt'] );
		}
		if ( isset( $_POST['fourth_gallery_image'] ) ) {
			update_post_meta( $villa_id, 'fourth_gallery_img', $_POST['fourth_gallery_image'] );
		}
		if ( isset( $_POST['fourth_thumb_title_name'] ) ) {
			update_post_meta( $villa_id, 'fourth_thumb_title', $_POST['fourth_thumb_title_name'] );
		}
		if ( isset( $_POST['fourth_thumb_alt'] ) ) {
			update_post_meta( $villa_id, 'fourth_image_thumb_alt', $_POST['fourth_thumb_alt'] );
		}
		if ( isset( $_POST['fifth_gallery_image'] ) ) {
			update_post_meta( $villa_id, 'fifth_gallery_img', $_POST['fifth_gallery_image'] );
		}
		if ( isset( $_POST['fifth_thumb_title_name'] ) ) {
			update_post_meta( $villa_id, 'fifth_thumb_title', $_POST['fifth_thumb_title_name'] );
		}
		if ( isset( $_POST['fifth_thumb_alt'] ) ) {
			update_post_meta( $villa_id, 'fifth_image_thumb_alt', $_POST['fifth_thumb_alt'] );
		}
		if ( isset( $_POST['six_gallery_image'] ) ) {
			update_post_meta( $villa_id, 'six_gallery_img', $_POST['six_gallery_image'] );
		}
		if ( isset( $_POST['six_thumb_title_name'] ) ) {
			update_post_meta( $villa_id, 'six_thumb_title', $_POST['six_thumb_title_name'] );
		}
		if ( isset( $_POST['six_thumb_alt'] ) ) {
			update_post_meta( $villa_id, 'six_image_thumb_alt', $_POST['six_thumb_alt'] );
		}
		if ( isset( $_POST['seven_gallery_image'] ) ) {
			update_post_meta( $villa_id, 'seven_gallery_img', $_POST['seven_gallery_image'] );
		}
		if ( isset( $_POST['seven_thumb_title_name'] )) {
			update_post_meta( $villa_id, 'seven_thumb_title', $_POST['seven_thumb_title_name'] );
		}
		if ( isset( $_POST['seven_thumb_alt'] ) ) {
			update_post_meta( $villa_id, 'seven_image_thumb_alt', $_POST['seven_thumb_alt'] );
		}
		if ( isset( $_POST['eight_gallery_image'] ) ) {
			update_post_meta( $villa_id, 'eight_gallery_img', $_POST['eight_gallery_image'] );
		}
		if ( isset( $_POST['eight_thumb_title_name'] ) ) {
			update_post_meta( $villa_id, 'eight_thumb_title', $_POST['eight_thumb_title_name'] );
		}
		if ( isset( $_POST['eight_thumb_alt'] ) ) {
			update_post_meta( $villa_id, 'eight_image_thumb_alt', $_POST['eight_thumb_alt'] );
		}
		if ( isset( $_POST['nine_gallery_image'] ) ) {
			update_post_meta( $villa_id, 'nine_gallery_img', $_POST['nine_gallery_image'] );
		}
		if ( isset( $_POST['nine_thumb_title_name'] ) ) {
			update_post_meta( $villa_id, 'nine_thumb_title', $_POST['nine_thumb_title_name'] );
		}
		if ( isset( $_POST['nine_thumb_alt'] ) ) {
			update_post_meta( $villa_id, 'nine_image_thumb_alt', $_POST['nine_thumb_alt'] );
		}
	}
}
add_action( 'admin_enqueue_scripts', 'ajax_enqueue_script' );
function ajax_enqueue_script() {
	wp_enqueue_script('inkthemes', plugins_url( '/js/review.js' , __FILE__ ) , array( 'jquery' ));

	wp_localize_script( 'inkthemes', 'ReviewAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));

}
function post_word_count($review_post_id){

$review_post_id = $_POST['post_id'];
$author_name = $_POST['review_author_name1'];
$review_title = $_POST['review_title'];
$country = $_POST['country'];
$review_author_email = $_POST['review_author_email_address1'];
$review_rating = $_POST['review_rating1'];
$villa_review = $_POST['villa_review1'];
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
		'author_email' => $review_author_email,
		'country' => $country,
		'review_rating' => $review_rating,
		'review' => $villa_review,
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
add_action('wp_ajax_post_word_count', 'post_word_count');
add_action('wp_ajax_nopriv_post_word_count', 'post_word_count');

	$is_ajax = "";
	if(isset($_POST['is_ajax'])){
		$is_ajax=$_POST["is_ajax"];
	}
	
	if($is_ajax=="approve_Vreview"){
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
	
	if($is_ajax=="delete_villa_review"){
		$id = $_POST['delete_id'];
		$wpdb->delete( 'wp_reviews', array( 'id' => $id ), array( '%d' ) );
		
	}
	
	if($is_ajax=="edit_actionVillas"){
		 $edit_id = $_POST['edit_id'];
		global $wpdb;
		
		$table_name = $wpdb->prefix . "reviews";
		
		
		$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name Where id = " .$edit_id );
		?>
			
		<?php foreach ($retrieve_data as $retrieved_data){ ?>
			
			<div class="review" id="updateReviewForm" style="color: #000;">
				<p><strong>Name</strong></p>
				<input type="hidden" name="id" id="id" size="80" value="<?php echo $retrieved_data->id;?>" />
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
				<p><input type="text" name="review_rating" id="review_rating" size="80" value="<?php echo $retrieved_data->review_rating;?>" /></p>
				<p><strong>Review</strong></p>
				<p><textarea name="villa_review" id="villa_review" rows="4" cols="60" style="width:49%;"><?php echo  stripslashes($retrieved_data->review);?></textarea></p>
				<span id="message" style="color:red;"></span>
				<p><input type="button" name="updateReview" id="updateReview" value="Update"></p>
			</div>
			
			
		<?php 
		}
		
	}
	
	if($is_ajax == "updatevillaReviews"){

		$id = $_POST['id'];
		$review_post_id = $_POST['post_id'];
		$name = $_POST['review_author_name'];
		$review_title1 = $_POST['review_title1'];
		$country1 = $_POST['country1'];
		$review_author_email = $_POST['retreat_author_email_address'];
		$review_rating = $_POST['review_rating'];
		$villa_review = $_POST['villa_review'];
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
				'review' => $villa_review,
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

function villa_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('image-upload', plugins_url( '/js/media-upload.js' , __FILE__ ), array('jquery','media-upload','thickbox')); 
	wp_enqueue_script('image-upload');
	wp_enqueue_script( 'jquery-ui' );
	
	wp_enqueue_script( 'map', plugins_url( '/js/villa_map.js', __FILE__ ));
	wp_register_script( 'maps', 'http://maps.google.com/maps/api/js?sensor=false', array(), null, false );
    wp_enqueue_script('maps');
}
function villa_styles() {
	wp_enqueue_style('thickbox');
	wp_enqueue_style( 'custom-villa', plugins_url('css/custom-villa.css', __FILE__) );
}


add_action('admin_print_scripts', 'villa_scripts');
add_action('admin_print_styles', 'villa_styles');
?>