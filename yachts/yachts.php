<?php
/*
Plugin Name: Yachts
Description: Declares a plugin that will create a custom post type
Version: 1.0
*/

add_action( 'init', 'create_yacht_category' );



function create_yacht_category() {
    register_taxonomy(
        'yacht_category',
        'yachts',
        array(
            'labels' => array(
                'name' => 'Yacht Categories',
                'add_new_item' => 'Add New Yacht Category',
                'new_item_name' => "New Yacht Type Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
			'rewrite'      => array('slug' => 'yacht-category', 'with_front' => false)
        )
    );
}
add_action( 'init', 'create_yacht' );	


function create_yacht() {
	register_post_type( 'yachts',
		array(
			'labels' => array(
				'name' => 'Yachts',
				'singular_name' => 'Yacht',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Yacht',
				'edit' => 'Edit',
				'edit_item' => 'Edit Yacht',
				'new_item' => 'New Yacht',
				'view' => 'View',
				'view_item' => 'View Yacht',
				'search_items' => 'Search Yachts',
				'not_found' => 'No Yachts found',
				'not_found_in_trash' =>
				'No Yachts found in Trash',
				'parent' => 'Parent Yacht'
			),
			'public' => true,
			'menu_position' => 15,
			'supports' =>
			array( 'title', 'editor', 
			'thumbnail', 'wpb-visual-composer', 'revisions'  ),
			'taxonomies' => array( 'post_tag', 'category' ),
			'rewrite' => array( 'with_front' => false, 'slug' => 'bali-yachts' ),
			
			'has_archive' => true
			
		)
	);
}

add_action( 'admin_init', 'yacht_admin' );




function yacht_admin() {
	add_meta_box( 'yacht_meta_box',
		'Yacht Details',
		'display_yacht_meta_box',
		'yachts', 'normal', 'high' 
	);
	
	add_meta_box( 'yacht_meta_box_thumb',
		'Yacht Image Thumb',
		'display_yacht_meta_box_thumb',
		'yachts', 'normal', 'high' 
	);
	
	add_meta_box( 'yacht_meta_box_slider',
		'Yacht Slider Images',
		'display_yacht_meta_box_slider',
		'yachts', 'normal', 'high' 
	);
}

function display_yacht_meta_box( $yacht ) {

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
	
	$_price_from = '';
	$_price_to = '';
	$_wording = '';
	$_rates = '';
	$_overview = '';
	$_rate_term = '';
	$_availability = '';
	$_facilities = '';
	
	$_inclusion = '';
	
	$_hot_deal = '';
	$_location = '';
	$_address = '';
	
	$_review = '';
	$_short_text = "";
	
	

	$_first_image =  get_post_meta( $yacht->ID, 'first_image', true );
	
	$_first_image_title =  get_post_meta( $yacht->ID, 'first_image_title', true );
	
	$_first_image_alternate =  get_post_meta( $yacht->ID, 'first_image_alternate', true );
	
	$_second_image =  get_post_meta( $yacht->ID, 'second_image', true );
	
	$_second_image_title =  get_post_meta( $yacht->ID, 'second_image_title', true );
	
	$_second_image_alternate =  get_post_meta( $yacht->ID, 'second_image_alternate', true );
	
	$_third_image =  get_post_meta( $yacht->ID, 'third_image', true );
	
	$_third_image_title =  get_post_meta( $yacht->ID, 'third_image_title', true );
	
	$_third_image_alternate =  get_post_meta( $yacht->ID, 'third_image_alternate', true );
	
	$_fourth_image =  get_post_meta( $yacht->ID, 'fourth_image', true );
	
	$_fourth_image_title =  get_post_meta( $yacht->ID, 'fourth_image_title', true );
	
	$_fourth_image_alternate =  get_post_meta( $yacht->ID, 'fourth_image_alternate', true );
	
	$_fifth_image =  get_post_meta( $yacht->ID, 'fifth_image', true );
	
	$_fifth_image_title =  get_post_meta( $yacht->ID, 'fifth_image_title', true );
	
	$_fifth_image_alternate =  get_post_meta( $yacht->ID, 'fifth_image_alternate', true );
	
	$_gallery = get_post_meta( $yacht->ID,'gallery', true );
	
	$_price_from = get_post_meta( $yacht->ID,'price_from', true );
	
	$_price_to = get_post_meta( $yacht->ID,'price_to', true );
	
	$_wording = get_post_meta( $yacht->ID,'wording', true );
	
	$_rates = get_post_meta( $yacht->ID,'rates', true );
	
	$_overview = get_post_meta( $yacht->ID,'overview', true );
	
	$_vibe = get_post_meta( $yacht->ID,'vibe', true );
	
	$_package_overview = get_post_meta( $yacht->ID,'package_overview', true );
	
	$_on_board = get_post_meta( $yacht->ID,'on_board', true );
	
	$_quick_fact = get_post_meta( $yacht->ID,'quick_fact', true );
	
	$_specification = get_post_meta( $yacht->ID,'specification', true );
	
	$_facilities = get_post_meta( $yacht->ID,'facilities', true );
	
	$_cruises = get_post_meta( $yacht->ID,'cruises', true );
	
	$_hot_deal = get_post_meta( $yacht->ID,'hot_deal', true );
	
	$_location = get_post_meta( $yacht->ID,'location', true );
	
	$_longitude = get_post_meta( $yacht->ID,'longitude', true );
	
	$_latitude  = get_post_meta( $yacht->ID,'latitude', true );
	
	$_address = get_post_meta( $yacht->ID,'address', true );
	
	$_location_description = get_post_meta( $yacht->ID,'location_desc', true );
	
	$_low_season = get_post_meta( $yacht->ID,'low_season', true );
	
	$_high_season = get_post_meta( $yacht->ID,'high_season', true );
	
	$_peak_season = get_post_meta( $yacht->ID,'peak_season', true );
	
	$_facebook = get_post_meta( $yacht->ID,'facebook', true );
	
	$_twitter = get_post_meta( $yacht->ID,'twitter', true );
	
	$_video_title = get_post_meta( $yacht->ID,'video_title', true );
	
	$_video_image = get_post_meta( $yacht->ID,'video_image', true );
	
	$_video = get_post_meta( $yacht->ID,'video', true );
	$_cabin_overview = get_post_meta( $yacht->ID,'cabin_overview', true );
	
	$_short_text = get_post_meta( $yacht->ID,'short_text', true );
	
	$_post_id = $yacht->ID;
	?>
 	   
		<div id="yacht-cbox-award" class="confirmation-box" style="border: 1px solid #e2e2e2; padding: 15px; display:none;">
			<div class="popupConfirmation" id="popupConfirmation">
			<span onclick="cPopUpHide()" class="close-btn">&times;</span>
				<p>Are you sure you want to delete this?</p>
				<input type="hidden" id="confirmationA_id" value="" />
				<input class="button-style" type="button" id="yes_delete_award" Value="Yes"/>
				<input class="button-style" type="button" id="no_delete_award" Value="No"/>
			</div>
		</div>
	   
	   <div id="package-cbox-night" class="confirmation-box" style="border: 1px solid #e2e2e2; padding: 15px; display:none;">
			<div class="popupConfirmation" id="popupConfirmation">
			<span class="no_delete_night close-btn">&times;</span>
				<p>Are you sure you want to delete this?</p>
				<input type="hidden" id="confirmationN_id" value="" />
				<input class="button-style" type="button" id="yes_delete_night" Value="Yes"/>
				<input class="no_delete_night button-style" type="button" id="no_delete_night" Value="No"/>
			</div>
		</div>
		
		<div id="yacht-cbox-package" class="confirmation-box" style="border: 1px solid #e2e2e2; padding: 15px; display:none;">
			<div class="popupConfirmation" id="popupConfirmation">
			<span class="no_delete_package close-btn">&times;</span>
				<p>Are you sure you want to delete this?</p>
				<input type="hidden" id="confirmationPackage_id" value="" />
				<input class="button-style" type="button" id="yes_delete_package" Value="Yes"/>
				<input class="no_delete_package button-style" type="button" id="no_delete_package" Value="No"/>
			</div>
		</div>
		<div id="confirmation-box-cabin" class="confirmation-box" style="border: 1px solid #e2e2e2; padding: 15px; display:none;">
			<div class="popupConfirmation" id="popupConfirmation">
			<span class="no_delete_cabin close-btn">&times;</span>
				<p>Are you sure you want to delete this?</p>
				<input type="hidden" id="confirmation_cabin" value="" />
				<input class="button-style" type="button" id="yes_delete_cabin" Value="Yes"/>
				<input class="no_delete_cabin button-style" type="button" id="no_delete_cabin" Value="No"/>
			</div>
		</div>
	   
		<div class="meta-box">
			<p><strong>Gallery Link</strong></p>
			<p><input type="text" size="80" name="gallery_link" value="<?php echo $_gallery; ?>" /></p>
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
			<p><strong>Overview</strong></p>
			<?php
				wp_editor( $_overview, 'overview_name' );
			?>
			
			<p><strong>On Board</strong></p>
			<?php
			
				wp_editor( $_vibe, 'vibe_name'); 
			?>
			
			<p><strong>Package Overview</strong></p>
			<?php
			
				wp_editor( $_package_overview, 'package_overview_name'); 
			?>
			
		<div class="yachts-package">	
			
	<p class="add-package add-new-btn"><input type="button"  id="yachtPackage" value="Add New Package"></p>
		<div class="package" id="yachtPackageForm" style="display:none;">
		<input type="hidden" name="this_yacht_id" id="this_yacht_id" size="80" value="<?php echo $yacht->ID; ?>" />
		<div class="meta-box">	
			<p><strong>Package Title</strong></p>
			<p><input type="text" size="80" name="package_title" id="package_title" value="<?php echo $_package_title; ?>" /></p>
		</div>
		
		<div class="meta-box">	
				<p><strong>Package image</strong></p>
				<p><input type="text" size="80" name="package_image" id="package_image" placeholder="Upload Package Image" value="<?php echo $_package_image; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			<div class="meta-box">	
				<p><strong>Package Address</strong></p>
				<p><input type="text" size="80" name="package_address" id="package_address" value="<?php echo $_package_address; ?>" /></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Package Price</strong></p>
				<p><input type="text" size="80" name="package_price" id="package_price" value="<?php echo $_package_price; ?>" /></p>
			</div>
		
		<p><strong>Package Description</strong></p>
			<?php
				wp_editor( $_package_discription, 'package_discription_name', $editor_settings );
			?>

		
		<p><strong>Inclusion</strong></p>
			<?php
				wp_editor( $_package_inclusion, 'package_inclusion_name', $editor_settings );
				
			?>
			
			
		<p><strong>Package Rates</strong></p>
			<?php
				wp_editor( $_package_rate, 'package_rate', $editor_settings );
				
			?>
			
		<div class="meta-box">	
			<p><strong>Package Dates</strong></p>
			<p><input type="text" size="80" name="package_date" id="package_date" value="<?php echo $_package_date; ?>" /></p>
		</div>
			
		<p class="add-new-btn"><input type="button" class="button-style" name="yachtPackageBtn" id="yachtPackageBtn" value="Save"><input type="button" class="button-style" name="cRetreatPackageBtn" id="cRetreatPackageBtn" value="Cancel"></p>
		</div>
		
		
		<p class="add-Package"><span id="showRetreatPackage"><strong>All Packages</strong></span></p>
			<p><span id="yachtPackagesContent" style="color: #fff;"></span></p>
			
		<?php 
		global $wpdb;
		
		$table_name = $wpdb->prefix . "program";
		$programs_data = $wpdb->get_results( "SELECT * FROM $table_name Where post_id = " .$yacht->ID  );
	
		?>
			
		<?php foreach ($programs_data as $package_data){ ?>
			
			<p class="add-program"><?php echo $package_data->program_title; ?><input type="hidden" class="toggle"  id="toggle" value="<?php echo $package_data->id; ?>"><img src="<?php echo plugins_url( 'images/cross.png', __FILE__ )?>" title="Delete Package" id="<?php echo $package_data->id;?>" class="deletePackage"/><img src="<?php echo plugins_url( 'images/edit.png', __FILE__ )?>" title="Edit Package" id="<?php echo $package_data->id; ?>" class="editPackage"></p><br/>
			
			<div class="editPackageForm" id="editPackageForm_<?php echo $package_data->id; ?>" style="display:none;">
			<input type="hidden" name="packageRet_id" id="packageRet_id" size="80" value="<?php echo $yacht->ID; ?>" />
			<div class="meta-box">	
				<p><strong>Package Title</strong></p>
				<p><input type="text" size="80" name="packages_title" id="packages_title_<?php echo $package_data->id ?>" value="<?php echo $package_data->program_title; ?>" /></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Package image</strong></p>
				<p><input type="text" size="80" name="packages_image" id="packages_image_<?php echo $package_data->id; ?>" placeholder="Upload Package Image" value="<?php echo $package_data->program_image; ?>" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			
			<div class="meta-box">	
				<p><strong>Package Address</strong></p>
				<p><input type="text" size="80" name="packages_address" id="packages_address_<?php echo $package_data->id ?>" value="<?php echo $package_data->program_address; ?>" /></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>Package Price</strong></p>
				<p><input type="text" size="80" name="packages_price" id="packages_price_<?php echo $package_data->id ?>" value="<?php echo $package_data->program_price; ?>" /></p>
			</div>
			
			<p><strong>Package Description</strong></p>
				<?php
					$package_desc_data = $package_data->program_desc;
					wp_editor( $package_desc_data, 'packages_discription_name_'.$package_data->id, $editor_settings);
					
				?>

			
			<p><strong>Inclusion</strong></p>
				<?php
					wp_editor( $package_data->program_inclusion, 'packages_inclusion_name_'.$package_data->id, $editor_settings );
					
				?>
				
				
			<p><strong>Package Rates</strong></p>
				<?php
					$package_rates = $package_data->rate;
					wp_editor( $package_rates, 'packages_rate_'.$package_data->id, $editor_settings );
					
				?>
				
			<div class="meta-box">	
				<p><strong>Package Dates</strong></p>
				<p><input type="text" size="80" name="package_date" id="packages_date_<?php echo $package_data->id ?>" value="<?php echo $package_data->date; ?>" /></p>
			</div>
			<br/>	
			<p class="add-new-btn"><input type="button" class="button-style yachtPackageBtn" name="yachtPackageBtn" id="<?php echo $package_data->id ?>" value="Update"></p>
		</div>
			<?php } ?>
			
			
		<div class="package-night" style="border: 1px solid #e2e2e2; margin: 25px 0; padding: 25px;">
		
		<p class="add-new-btn add-night"><input type="button"  id="packageNight" class="button-style" value="Add New Night"></p>
		
		<div class="night-added-content" id="retreatPackageNightForm" style="display:none;"> 
			<div class="meta-box">	
				<p><strong>Night Title</strong></p>
				<p><input type="text" size="80" name="night_title" id="night_title" value="" /></p>
			</div>
			
			<p><strong>Night Content</strong></p>
			<?php
				wp_editor( $_night_content, 'night_content', $editor_settings );
				
			?>
			
			<p><strong>Please Select Package</strong></p>
			<select id="id_package" name="packages_all">
				<?php foreach ($programs_data as $package_data){ ?>
					<option value="<?php echo $package_data->id ?>"><?php echo $package_data->program_title; ?></option>
				<?php } ?>
			</select>
			
			<p class="add-new-btn"><input type="button" class="button-style nightPackageBtn" name="nightPackageBtn" id="nightPackageBtn" value="Save"></p>
		</div>
		
		<?php 
				global $wpdb;
				
				$table_name = $wpdb->prefix . "night";
				
				
				//$night_data = $wpdb->get_results( "SELECT wp_night.id, wp_night.post_id, wp_night.night_title, wp_night.night_content, wp_night.package_id , wp_package.package_title, FROM $table_name, wp_package Where wp_night. = " .$retreat->ID  );
				$nights_data = $wpdb->get_results( "SELECT * FROM $table_name Where post_id = " .$yacht->ID  );
				 ?>
				
					<table style="text-align:left; color: #000; width:100%">
						<tr>
							<th>Package</th>
							<th>Nights</th>
							<th>Edit</th>
							<th>Delete</th>		
							
						</tr>
					<?php foreach($nights_data as $night_data){ ?>
						<tr>
							<?php 
								global $wpdb;
								
								$table_name = $wpdb->prefix . "program";
								
								
								$packages_dat = $wpdb->get_results( "SELECT * FROM $table_name Where id = " .$night_data->program_id  );
								foreach($packages_dat as $selected){ ?>
								<td><?php echo $selected->program_title; ?></td>
							<?php } ?>
							<td><?php echo $night_data->night_title;?></td>
							<td><img class="editNight" src="<?php echo plugins_url( 'images/edit.png', __FILE__ )?>" title="Edit Night" class="editNight" id="<?php echo $night_data->id; ?>" style="cursor:pointer;"/></td>		
							<td><img class="deleteNightPackage" src="<?php echo plugins_url( 'images/cross.png', __FILE__ )?>" title="Delete Night" id="<?php echo $night_data->id; ?>" style="cursor:pointer;"/></td>	
							
						</tr>
						<p></p>
						
				<?php } ?>
					</table>
					
					<?php foreach($nights_data as $night_data){ ?>
						<div class="editNightForm" id="editNightForm_<?php echo $night_data->id; ?>" style="display:none;">
							<div class="package-night" style="border: 1px solid #e2e2e2; margin: 25px 0; padding: 25px;">
		
							
								<div class="meta-box">	
									<p><strong>Night Title</strong></p>
									<p><input type="text" size="80" name="nights_title" id="nights_title_<?php echo $night_data->id ?>" value="<?php echo $night_data->night_title;?>" /></p>
								</div>
								
								<p><strong>Night Content</strong></p>
								<?php
									$night_content = $night_data->night_content;
									wp_editor( $night_content, 'nights_content_'.$night_data->id, $editor_settings );
									
								?>
								
								
								
								<p><strong>Please Select Package</strong></p>
								<select id="id_packages_<?php echo $night_data->id ?>" name="package_all">
									<?php 
										global $wpdb;
										
										$table_name = $wpdb->prefix . "program";
										
										
										$packages_dat = $wpdb->get_results( "SELECT * FROM $table_name Where id = " .$night_data->package_id  );
										foreach($packages_dat as $selected){ ?>
										<option value="<?php echo $selected->id ?>"><?php echo $selected->program_title; ?></option>
									<?php }
									?>
								
									<?php foreach ($programs_data as $package_data){ ?>
										<option value="<?php echo $package_data->id ?>"><?php echo $package_data->program_title; ?></option>
									<?php } ?>
								</select>
								
								<p class="add-new-button"><input type="button" class="button-style updatePackageNightBtn" name="nightPackageBtn" id="<?php echo $night_data->id ?>" value="Update"></p>
							
						</div>
						</div>
					<?php } ?>
		</div>
			
			
			</div>
			
			<p><strong>Facilities</strong></p>
			<?php
				 wp_editor( $_facilities, 'facilities_name' );
				
			?>
			
			<p><strong>Specifications & Equipment</strong></p>
			<?php
				 wp_editor( $_specification, 'specification_name' );
				
			?>
		<div class="yacht-video-award">
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
				<p class="add-new-btn"><input class="button-style" type="button" id="yachtAwardBtn" value="Save"></p>
			</div>
		</div>
		
		
		<div class="awards-list">
			<?php 
				global $wpdb;
				
				$table_name = $wpdb->prefix . "award";
				
				$awards_data = $wpdb->get_results( "SELECT * FROM $table_name Where post_id = " .$yacht->ID  );
				 ?>
				
					<table style="text-align:left; color: #000; width:100%">
						<tr>
							<th>Award Title</th>
							<th>Edit</th>
							<th>Delete</th>		
							
						</tr>
					<?php foreach($awards_data as $award_data){ ?>
						<tr>
							<td><?php echo $award_data->award_title;?></td>
							<td><img class="editAward" src="<?php echo plugins_url( 'images/edit.png', __FILE__ )?>" title="Edit Award" id="<?php echo $award_data->id; ?>" style="cursor:pointer;"/></td>		
							<td><img class="yachtDeleteAward" src="<?php echo plugins_url( 'images/cross.png', __FILE__ )?>" title="Delete Award" id="<?php echo $award_data->id; ?>" style="cursor:pointer;"/></td>	
							
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
								<p class="add-new-btn"><input class="button-style yachtAwardUpdateBtn" type="button" id="<?php echo $award_data->id ?>" value="Update"></p>
							</div>
						
					<?php } ?>
					</div>
		</div>
		</div>
		
		
			<p><strong>Cabin Overview</strong></p>
			<?php
				$editor_settings = array(
				'textarea_rows' => 8,
				  'tabindex' => 4,
				  'tinymce' => array(
					'theme_advanced_buttons1' => 'bold, italic, ul, pH, temp',
				  ),
				);
				wp_editor( $_cabin_overview, 'cabin_overview_name', $editor_settings );
			?>
			
			<div class="cabin-section">
			<p><input type="button" id="yachtCabin" Value="New cabin" class="button-style"></p>
				<div class="review" id="yachtCabinForm" style="display:none;">
			<input type="hidden" name="this_yacht_id" id="this_yacht_id" size="80" value="<?php echo $yacht->ID; ?>" />
			
			<div class="meta-box">	
				<p><strong>cabin Title</strong></p>
				<p><input type="text" size="80" name="cabin_title" id="cabin_title" value="<?php echo $_cabin_title; ?>" /></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>cabin image first</strong></p>
				<p><input type="text" size="80" name="cabin_image_first" id="cabin_image_first" placeholder="Upload Cabin Image" value="" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>cabin image second</strong></p>
				<p><input type="text" size="80" name="cabin_image_second" id="cabin_image_second" placeholder="Upload Cabin Image" value="" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>cabin image third</strong></p>
				<p><input type="text" size="80" name="cabin_image_third" id="cabin_image_third" placeholder="Upload Cabin Image" value="" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>cabin image fourth</strong></p>
				<p><input type="text" size="80" name="cabin_image_fourth" id="cabin_image_fourth" placeholder="Upload Cabin Image" value="" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>
			
			<div class="meta-box">	
				<p><strong>cabin image fifth</strong></p>
				<p><input type="text" size="80" name="cabin_image_fifth" id="cabin_image_fifth" placeholder="Upload Cabin Image" value="" />
				<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
			</div>

			<p><strong>cabin Description</strong></p>
				<?php
					wp_editor( $_cabin_discription, 'cabin_discription_name', $editor_settings );
				?>
			<p><input type="button" class="button-style" name="yachtcabinBtn" id="yachtCabinBtn" value="Save"></p>	
		</div>
		
		
		
		<?php 
		global $wpdb;
		
		$table_name = $wpdb->prefix . "cabin";
		
		
		$cabins_data = $wpdb->get_results( "SELECT * FROM $table_name Where post_id = " .$yacht->ID  );
		?>
		
		<table style="text-align:left; color: #000; width:100%">
			<tr>
				<th>Title</th>
				<th>Edit</th>
				<th>Delete</th>	
			</tr>
			<?php foreach ($cabins_data as $cabin_data){ ?>
				
			<tr>
				<td><?php echo $cabin_data->cabin_title;?></td>
				
				<td><input type="hidden" class="toggle"  id="toggle" value="<?php echo $cabin_data->id; ?>"><img src="<?php echo plugins_url( 'images/edit.png', __FILE__ )?>" title="Edit cabin" id="<?php echo $cabin_data->id; ?>" class="editCabin"></td><td><input type="hidden" class="delete_cabin_id" name="delete_cabin_id" id="delete_cabin_id" value="<?php echo $cabin_data->id;?>"><img src="<?php echo plugins_url( 'images/cross.png', __FILE__ )?>" title="Delete" id="<?php echo $cabin_data->id;?>" class="deleteCabin"/></td>	
			</tr>
			<?php 
			}
			?>
		</table>
			
			<?php foreach ($cabins_data as $cabin_data){ ?>
			
			<div class="editcabinForm" id="editCabinForm_<?php echo $cabin_data->id; ?>" style="display:none;">
			
				<input type="hidden" name="cabinRet_id" id="cabinRet_id" size="80" value="<?php echo $yacht->ID; ?>" />
				<div class="meta-box">	
					<p><strong>cabin Title</strong></p>
					<p><input type="text" size="80" name="cabins_title" id="cabins_title_<?php echo $cabin_data->id ?>" value="<?php echo $cabin_data->cabin_title; ?>" /></p>
				</div>
				
				
				<div class="meta-box">	
					<p><strong>cabin image first</strong></p>
					<p><input type="text" size="80" name="cabin_image" id="cabins_image_<?php echo $cabin_data->id ?>" value="<?php echo $cabin_data->cabin_image_first; ?>" />
					<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
				</div>
				
				<div class="meta-box">	
					<p><strong>cabin image second</strong></p>
					<p><input type="text" size="80" name="cabin_image" id="cabins_image_second_<?php echo $cabin_data->id ?>" value="<?php echo $cabin_data->cabin_image_second; ?>" />
					<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
				</div>
				
				<div class="meta-box">	
					<p><strong>cabin image third</strong></p>
					<p><input type="text" size="80" name="cabin_image" id="cabins_image_third_<?php echo $cabin_data->id ?>" value="<?php echo $cabin_data->cabin_image_third; ?>" />
					<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
				</div>
				
				<div class="meta-box">	
					<p><strong>cabin image fourth</strong></p>
					<p><input type="text" size="80" name="cabin_image" id="cabins_image_fourth_<?php echo $cabin_data->id ?>" value="<?php echo $cabin_data->cabin_image_fourth; ?>" />
					<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
				</div>
				
				<div class="meta-box">	
					<p><strong>cabin image fifth</strong></p>
					<p><input type="text" size="80" name="cabin_image" id="cabins_image_fifth_<?php echo $cabin_data->id ?>" value="<?php echo $cabin_data->cabin_image_fifth; ?>" />
					<img class="upload_image_button" src="<?php echo plugins_url( 'images/Instagram.png', __FILE__ )?>" style="cursor:pointer; margin:0 0 -10px 10px;"/></p>
				</div>
				
				<p><strong>cabin Description</strong></p>
					<?php
						$cabin_desc_data = $cabin_data->cabin_desc;
						wp_editor( $cabin_desc_data, 'cabin_discription_name_'.$cabin_data->id, $editor_settings);
						
					?>

					<br/>	
				<p><input type="button" class="editCabinBtn button-style" name="editcabinBtn" id="<?php echo $cabin_data->id ?>" value="Update"></p>
			</div>
			<?php } ?>
			</div>
			<p><strong>Quick Facts</strong></p>
			<?php
				 wp_editor( $_quick_fact, 'quick_fact_name' );
				
			?>
			
			
		<div class="meta-box">
			<p><strong>Cruises</strong></p>
			<p>
				<select name="cruises_name">
				  <?php if(empty($_cruises)){ ?>
					<option value="0">-Select-</option>
				  <?php } ?>
					<option value="private yacht charter" <?php if($_cruises=="private yacht charter") echo 'selected="selected"'; ?> >Private Yacht Charter</option>
					<option value="cruise packages" <?php if($_cruises=="cruise packages") echo 'selected="selected"'; ?> >Cruise Packages</option>
					<option value="day cruises" <?php if($_cruises=="day cruises") echo 'selected="selected"'; ?> >Day Cruises</option>	
				</select>
			</p>
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
			<p><input type="text" size="80" id="latitude_name" name="latitude_name" value="<?php echo $_latitude; ?>" onkeyup="yachtMapFunction()"/></p>
		</div>
		
		<div class="meta-box">	
			<p><strong>Longitude</strong></p>
			<p><input type="text" size="80" id="longitude_name" name="longitude_name" value="<?php echo $_longitude; ?>" onkeyup="yachtMapFunction()"/></p>
		</div>
		
		<div class="meta-box">
			<p><strong>Location & Map</strong></p>
			<p><input type="text" size="80" placeholder="Type to search" name="address_name" id="address" value="<?php echo $_address ;?>"   /></p>
		</div> 
			<div id="yachtMap" style="width: 100%; height: 400px;"></div>
			<iframe onload="yachtMapFunction();" style="display:none;"></iframe>
		
		<p><strong>Location Description</strong></p>
			<?php
				 wp_editor( $_location_description, 'location_desc_name', $settings );
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
		<div class="review-box">
			<strong>Review Section</strong>
			<div class="review" id="reviewForm">
			<p><strong>Name</strong></p>
			<input type="hidden" name="post_id" id="post_id" size="80" value="<?php echo $_post_id; ?>" />
			<p><input type="text" name="review_author_name" id="review_author_name" size="80" value="" /></p>
			<p><strong>Title</strong></p>
			<p><input type="text" name="review_title" id="review_title" size="80" value="" /></p>
			<p><strong>Country(optional)</strong></p>
			<p><input type="text" name="country" id="country" size="80" value="" /></p>
			<p><strong>Publish Date(optional)</strong></p>
			<p><input type="text" name="publish_date" id="publish_date" size="80" value="" placeholder="<?php echo date(' F Y');  ?>"/></p>
			<p><strong>Email</strong></p>
			<p><input type="text" name="review_author_email_address" id="review_author_email_address" size="80" value="" /></p>
			<p><strong>Rating</strong></p>
			<p><input type="text" name="review_rating" id="review_rating" size="80" value="" /></p>
			<p><strong>Review</strong></p>
			<p><textarea name="villa_review" id="yacht_review" rows="4" cols="60" style="width:49%;"></textarea></p>
			<p><input type="button" name="review"  class="button-style" id="add_yacht_review" value="Save"></p>
			</div>
			
		</div>
		
		<div class="review-box">	
			<input type="hidden" name="show_yacht_id" id="show_yacht_id" size="80" value="<?php echo $_post_id; ?>" />
			<?php 
		global $wpdb;
		
		$table_name = $wpdb->prefix . "reviews";
	
		$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name Where post_id = " .$_post_id  );
		?>
			<table style="text-align:left; color: #000; width:100%">
				<tr>
				<th>Author</th>
				<th>Country</th>
				<th>Review Rating</th>		
				<th>Review</th>		
				<th>Icon</th>
				<th>Active</th>
				<th>Action</th>
			</tr>
		<?php foreach ($retrieve_data as $retrieved_data){ ?>
			
		<tr>
			<td><?php echo  stripslashes($retrieved_data->author_name);?></td>
			<td><?php echo  stripslashes($retrieved_data->country);?></td>		
			
			<?php $nb_stars = $retrieved_data->review_rating;?>
			<td><?php for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
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
			<input type="checkbox" class="btnapproveRetreat" id="<?php echo $id;?>"  <?php if ($approved == 1){?> checked="checked" <?php } ?>/></td>
			<td><input type="hidden" class="delete_id" name="delete_id" id="delete_id" value="<?php echo $id;?>"><img src="<?php echo plugins_url( 'images/edit.png', __FILE__ )?>" title="Edit" id="<?php echo $id;?>" class="editYachtReview"><img src="<?php echo plugins_url( 'images/cross.png', __FILE__ )?>" title="Delete" id="<?php echo $id;?>" class="delete_yacht"/></td>	
			
		</tr>
			
			
		<?php 
		}
		?>
		</table>
		
			<p><span id="yachtReviewEditForm" style="color: #fff;"></span></p>
		</div>
		
		
		<div id="confirmation-box-review" class="confirmation-box" style="border: 1px solid #e2e2e2; padding: 15px; display:none;">
		<div class="popupConfirmation" id="popupConfirmation">
		<span onclick="RPopUpHide()" class="close-btnR">&times;</span>
			<p>Are you sure you want to delete this?</p>
			<input type="hidden" id="confirmationR_id" value="" />
			<input class="button-style" type="button" id="delete_yacht_review" Value="Yes"/>
			<input class="button-style" type="button" id="no_delete_review" Value="No"/>
		</div>
	</div>
	
	<?php
		
}

function display_yacht_meta_box_thumb( $yacht ) {
	$_first_gallery_img = '';
	
	$_second_gallery_img = '';
	
	$_third_gallery_img = '';
	
	$_fourth_gallery_img = '';
	
	$_fifth_gallery_img = '';
	
	$_six_gallery_img = '';
	
	$_seven_gallery_img = '';
	
	$_eight_gallery_img = '';
	
	$_nine_gallery_img = '';
	
	$_first_gallery_img =  get_post_meta( $yacht->ID, 'first_gallery_img', true );
	
	$_second_gallery_img =  get_post_meta( $yacht->ID, 'second_gallery_img', true );
	
	$_third_gallery_img =  get_post_meta( $yacht->ID, 'third_gallery_img', true );
	
	$_fourth_gallery_img =  get_post_meta( $yacht->ID, 'fourth_gallery_img', true );
	
	$_fifth_gallery_img =  get_post_meta( $yacht->ID, 'fifth_gallery_img', true );
	
	$_six_gallery_img =  get_post_meta( $yacht->ID, 'six_gallery_img', true );
	
	$_seven_gallery_img =  get_post_meta( $yacht->ID, 'seven_gallery_img', true );
	
	$_eight_gallery_img =  get_post_meta( $yacht->ID, 'eight_gallery_img', true );
	
	$_nine_gallery_img =  get_post_meta( $yacht->ID, 'nine_gallery_img', true );
	
	$_first_thumb_title =  get_post_meta( $yacht->ID, 'first_thumb_title', true );
	
	$_first_thumb_alt =  get_post_meta( $yacht->ID, 'first_image_thumb_alt', true );
	
	$_second_thumb_title =  get_post_meta( $yacht->ID, 'second_thumb_title', true );
	
	$_second_thumb_alt =  get_post_meta( $yacht->ID, 'second_image_thumb_alt', true );
	
	$_third_thumb_title =  get_post_meta( $yacht->ID, 'third_thumb_title', true );
	
	$_third_thumb_alt =  get_post_meta( $yacht->ID, 'third_image_thumb_alt', true );
	
	$_fourth_thumb_title =  get_post_meta( $yacht->ID, 'fourth_thumb_title', true );
	
	$_fourth_thumb_alt =  get_post_meta( $yacht->ID, 'fourth_image_thumb_alt', true );
	
	$_fifth_thumb_title =  get_post_meta( $yacht->ID, 'fifth_thumb_title', true );
	
	$_fifth_thumb_alt =  get_post_meta( $yacht->ID, 'fifth_image_thumb_alt', true );
	
	$_six_thumb_title =  get_post_meta( $yacht->ID, 'six_thumb_title', true );
	
	$_six_thumb_alt =  get_post_meta( $yacht->ID, 'six_image_thumb_alt', true );
	
	$_seven_thumb_title =  get_post_meta( $yacht->ID, 'seven_thumb_title', true );
	
	$_seven_thumb_alt =  get_post_meta( $yacht->ID, 'seven_image_thumb_alt', true );
	
	$_eight_thumb_title =  get_post_meta( $yacht->ID, 'eight_thumb_title', true );
	
	$_eight_thumb_alt =  get_post_meta( $yacht->ID, 'eight_image_thumb_alt', true );
	
	$_nine_thumb_title =  get_post_meta( $yacht->ID, 'nine_thumb_title', true );
	
	$_nine_thumb_alt =  get_post_meta( $yacht->ID, 'nine_image_thumb_alt', true );
	
	
	
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
		<span class="thumb-heading"><h3>Three Thumbnails above to "On Board"</h3></span>
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
		<span class="thumb-heading"><h3>Three Thumbnail above to "Specifications"</h3></span>
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

function display_yacht_meta_box_slider( $yacht ) {
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
	
	$_first_image =  get_post_meta( $yacht->ID, 'first_image', true );
	
	$_first_image_title =  get_post_meta( $yacht->ID, 'first_image_title', true );
	
	$_first_image_alternate =  get_post_meta( $yacht->ID, 'first_image_alternate', true );
	
	$_second_image =  get_post_meta( $yacht->ID, 'second_image', true );
	
	$_second_image_title =  get_post_meta( $yacht->ID, 'second_image_title', true );
	
	$_second_image_alternate =  get_post_meta( $yacht->ID, 'second_image_alternate', true );
	
	$_third_image =  get_post_meta( $yacht->ID, 'third_image', true );
	
	$_third_image_title =  get_post_meta( $yacht->ID, 'third_image_title', true );
	
	$_third_image_alternate =  get_post_meta( $yacht->ID, 'third_image_alternate', true );
	
	$_fourth_image =  get_post_meta( $yacht->ID, 'fourth_image', true );
	
	$_fourth_image_title =  get_post_meta( $yacht->ID, 'fourth_image_title', true );
	
	$_fourth_image_alternate =  get_post_meta( $yacht->ID, 'fourth_image_alternate', true );
	
	$_fifth_image =  get_post_meta( $yacht->ID, 'fifth_image', true );
	
	$_fifth_image_title =  get_post_meta( $yacht->ID, 'fifth_image_title', true );
	
	$_fifth_image_alternate =  get_post_meta( $yacht->ID, 'fifth_image_alternate', true );
	
	$_six_image =  get_post_meta( $yacht->ID, 'six_image', true );
	
	$_six_image_title =  get_post_meta( $yacht->ID, 'six_image_title', true );
	
	$_six_image_alternate =  get_post_meta( $yacht->ID, 'six_image_alternate', true );
	
	$_seven_image =  get_post_meta( $yacht->ID, 'seven_image', true );
	
	$_seven_image_title =  get_post_meta( $yacht->ID, 'seven_image_title', true );
	
	$_seven_image_alternate =  get_post_meta( $yacht->ID, 'seven_image_alternate', true );
	
	$_eight_image =  get_post_meta( $yacht->ID, 'eight_image', true );
	
	$_eight_image_title =  get_post_meta( $yacht->ID, 'eight_image_title', true );
	
	$_eight_image_alternate =  get_post_meta( $yacht->ID, 'eight_image_alternate', true );
	
	
	
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

add_action( 'save_post','add_yacht_fields', 10, 2 );


function add_yacht_fields( $yacht_id,$yacht ) {
	// Check post type for bali-yachts
	if ( $yacht->post_type == 'yachts' ) {
		// Store data in post meta table if present in post data
		if ( isset( $_POST['upload_first_image'] ) && $_POST['upload_first_image'] != '' ) {
			update_post_meta( $yacht_id, 'first_image', $_POST['upload_first_image'] );
		}
		if ( isset( $_POST['first_image_title_name'] ) && $_POST['first_image_title_name'] != '' ) {
			update_post_meta( $yacht_id, 'first_image_title', $_POST['first_image_title_name'] );
		}
		if ( isset( $_POST['first_alternate'] ) && $_POST['first_alternate'] != '' ) {
			update_post_meta( $yacht_id, 'first_image_alternate', $_POST['first_alternate'] );
		}
		if ( isset( $_POST['upload_second_image'] ) && $_POST['upload_second_image'] != '' ) {
			update_post_meta( $yacht_id, 'second_image', $_POST['upload_second_image'] );
		}
		if ( isset( $_POST['second_image_title_name'] ) && $_POST['second_image_title_name'] != '' ) {
			update_post_meta( $yacht_id, 'second_image_title', $_POST['second_image_title_name'] );
		}
		if ( isset( $_POST['second_alternate'] ) && $_POST['second_alternate'] != '' ) {
			update_post_meta( $yacht_id, 'second_image_alternate', $_POST['second_alternate'] );
		}
		if ( isset( $_POST['upload_third_image'] ) && $_POST['upload_third_image'] != '' ) {
			update_post_meta( $yacht_id, 'third_image', $_POST['upload_third_image'] );
		}
		if ( isset( $_POST['third_image_title_name'] ) && $_POST['third_image_title_name'] != '' ) {
			update_post_meta( $yacht_id, 'third_image_title', $_POST['third_image_title_name'] );
		}
		if ( isset( $_POST['third_alternate'] ) && $_POST['third_alternate'] != '' ) {
			update_post_meta( $yacht_id, 'third_image_alternate', $_POST['third_alternate'] );
		}
		if ( isset( $_POST['upload_fourth_image'] ) && $_POST['upload_fourth_image'] != '' ) {
			update_post_meta( $yacht_id, 'fourth_image', $_POST['upload_fourth_image'] );
		}
		if ( isset( $_POST['fourth_image_title_name'] ) && $_POST['fourth_image_title_name'] != '' ) {
			update_post_meta( $yacht_id, 'fourth_image_title', $_POST['fourth_image_title_name'] );
		}
		if ( isset( $_POST['fourth_alternate'] ) && $_POST['fourth_alternate'] != '' ) {
			update_post_meta( $yacht_id, 'fourth_image_alternate', $_POST['fourth_alternate'] );
		}
		if ( isset( $_POST['upload_fifth_image'] ) && $_POST['upload_fifth_image'] != '' ) {
			update_post_meta( $yacht_id, 'fifth_image', $_POST['upload_fifth_image'] );
		}
		if ( isset( $_POST['fifth_image_title_name'] ) && $_POST['fifth_image_title_name'] != '' ) {
			update_post_meta( $yacht_id, 'fifth_image_title', $_POST['fifth_image_title_name'] );
		}
		if ( isset( $_POST['fifth_alternate'] ) && $_POST['fifth_alternate'] != '' ) {
			update_post_meta( $yacht_id, 'fifth_image_alternate', $_POST['fifth_alternate'] );
		}
		if ( isset( $_POST['upload_six_image'] ) ) {
			update_post_meta( $yacht_id, 'six_image', $_POST['upload_six_image'] );
		}
		if ( isset( $_POST['six_image_title_name'] ) ) {
			update_post_meta( $yacht_id, 'six_image_title', $_POST['six_image_title_name'] );
		}
		if ( isset( $_POST['six_alternate'] ) ) {
			update_post_meta( $yacht_id, 'six_image_alternate', $_POST['six_alternate'] );
		}
		if ( isset( $_POST['upload_seven_image'] ) ) {
			update_post_meta( $yacht_id, 'seven_image', $_POST['upload_seven_image'] );
		}
		if ( isset( $_POST['seven_image_title_name'] ) ) {
			update_post_meta( $yacht_id, 'seven_image_title', $_POST['seven_image_title_name'] );
		}
		if ( isset( $_POST['seven_alternate'] ) ) {
			update_post_meta( $yacht_id, 'seven_image_alternate', $_POST['seven_alternate'] );
		}
		if ( isset( $_POST['upload_eight_image'] ) ) {
			update_post_meta( $yacht_id, 'eight_image', $_POST['upload_eight_image'] );
		}
		if ( isset( $_POST['eight_image_title_name'] )  ) {
			update_post_meta( $yacht_id, 'eight_image_title', $_POST['eight_image_title_name'] );
		}
		if ( isset( $_POST['eight_alternate'] )  ) {
			update_post_meta( $yacht_id, 'eight_image_alternate', $_POST['eight_alternate'] );
		}
		if ( isset( $_POST['gallery_link'] ) ) {
			update_post_meta( $yacht_id, 'gallery', $_POST['gallery_link'] );
		}
		if ( isset( $_POST['price_from_name'] ) ) {
			update_post_meta( $yacht_id, 'price_from', $_POST['price_from_name'] );
		}
		if ( isset( $_POST['price_high'] ) ) {
			update_post_meta( $yacht_id, 'price_to', $_POST['price_high'] );
		}
		if ( isset( $_POST['overview_name'] ) ) {
			update_post_meta( $yacht_id, 'overview', $_POST['overview_name'] );
		}
		if ( isset( $_POST['rates_name'] )) {
			update_post_meta( $yacht_id, 'rates', $_POST['rates_name'] );
		}
		if ( isset( $_POST['wording_name'] ) ) {
			update_post_meta( $yacht_id, 'wording', $_POST['wording_name'] );
		}
		if ( isset( $_POST['vibe_name'] )) {
			update_post_meta( $yacht_id, 'vibe', $_POST['vibe_name'] );
		}
		if ( isset( $_POST['package_overview_name'] )) {
			update_post_meta( $yacht_id, 'package_overview', $_POST['package_overview_name'] );
		}
		if ( isset( $_POST['specification_name'] )) {
			update_post_meta( $yacht_id, 'specification', $_POST['specification_name'] );
		}
		if ( isset( $_POST['cabin_overview_name'] )) {
			update_post_meta( $yacht_id, 'cabin_overview', $_POST['cabin_overview_name'] );
		}
		if ( isset( $_POST['on_board_name'] )) {
			update_post_meta( $yacht_id, 'on_board', $_POST['on_board_name'] );
		}
		if ( isset( $_POST['quick_fact_name'] )) {
			update_post_meta( $yacht_id, 'quick_fact', $_POST['quick_fact_name'] );
		}
		if ( isset( $_POST['facilities_name'] )) {
			update_post_meta( $yacht_id, 'facilities', $_POST['facilities_name'] );
		}
		if ( isset( $_POST['cruises_name'] )  ) {
			update_post_meta( $yacht_id, 'cruises', $_POST['cruises_name'] );
		}
		if ( isset( $_POST['hot_deal_name'] ) ) {
			update_post_meta( $yacht_id, 'hot_deal', $_POST['hot_deal_name'] );
		}
		if ( isset( $_POST['location_name'] ) ) {
			update_post_meta( $yacht_id, 'location', $_POST['location_name'] );
		}
		if ( isset( $_POST['longitude_name'] )) {
			update_post_meta( $yacht_id, 'longitude', $_POST['longitude_name'] );
		}
		if ( isset( $_POST['latitude_name'] )) {
			update_post_meta( $yacht_id, 'latitude', $_POST['latitude_name'] );
		}
		if ( isset( $_POST['address_name'] ) ) {
			update_post_meta( $yacht_id, 'address', $_POST['address_name'] );
		}
		if ( isset( $_POST['location_desc_name'] ) ) {
			update_post_meta( $yacht_id, 'location_desc', $_POST['location_desc_name'] );
		}
		if ( isset( $_POST['low_season_name'] )) {
			update_post_meta( $yacht_id, 'low_season', $_POST['low_season_name'] );
		}
		if ( isset( $_POST['high_season_name'] )) {
			update_post_meta( $yacht_id, 'high_season', $_POST['high_season_name'] );
		}
		if ( isset( $_POST['peak_season_name'] )) {
			update_post_meta( $yacht_id, 'peak_season', $_POST['peak_season_name'] );
		}
		if ( isset( $_POST['facebook_name'] ) ) {
			update_post_meta( $yacht_id, 'facebook', $_POST['facebook_name'] );
		}
		if ( isset( $_POST['twitter_name'] ) ) {
			update_post_meta( $yacht_id, 'twitter', $_POST['twitter_name'] );
		}
		if ( isset( $_POST['short_desc'] )) {
			update_post_meta( $yacht_id, 'short_text', $_POST['short_desc'] );
		}
		if ( isset( $_POST['video_image_name'] ) ) {
			update_post_meta( $yacht_id, 'video_image', $_POST['video_image_name'] );
		}
		if ( isset( $_POST['video_title_name'] ) ) {
			update_post_meta( $yacht_id, 'video_title', $_POST['video_title_name'] );
		}
		if ( isset( $_POST['video_name'] ) ) {
			update_post_meta( $yacht_id, 'video', $_POST['video_name'] );
		}
		if ( isset( $_POST['first_gallery_image'] ) ) {
			update_post_meta( $yacht_id, 'first_gallery_img', $_POST['first_gallery_image'] );
		}
		if ( isset( $_POST['first_thumb_title_name'] ) ) {
			update_post_meta( $yacht_id, 'first_thumb_title', $_POST['first_thumb_title_name'] );
		}
		if ( isset( $_POST['first_thumb_alt'] ) ) {
			update_post_meta( $yacht_id, 'first_image_thumb_alt', $_POST['first_thumb_alt'] );
		}
		if ( isset( $_POST['second_gallery_image'] ) ) {
			update_post_meta( $yacht_id, 'second_gallery_img', $_POST['second_gallery_image'] );
		}
		if ( isset( $_POST['second_thumb_title_name'] ) ) {
			update_post_meta( $yacht_id, 'second_thumb_title', $_POST['second_thumb_title_name'] );
		}
		if ( isset( $_POST['second_thumb_alt'] ) ) {
			update_post_meta( $yacht_id, 'second_image_thumb_alt', $_POST['second_thumb_alt'] );
		}
		if ( isset( $_POST['third_gallery_image'] ) ) {
			update_post_meta( $yacht_id, 'third_gallery_img', $_POST['third_gallery_image'] );
		}
		if ( isset( $_POST['third_thumb_title_name'] ) ) {
			update_post_meta( $yacht_id, 'third_thumb_title', $_POST['third_thumb_title_name'] );
		}
		if ( isset( $_POST['third_thumb_alt'] ) ) {
			update_post_meta( $yacht_id, 'third_image_thumb_alt', $_POST['third_thumb_alt'] );
		}
		if ( isset( $_POST['fourth_gallery_image'] ) ) {
			update_post_meta( $yacht_id, 'fourth_gallery_img', $_POST['fourth_gallery_image'] );
		}
		if ( isset( $_POST['fourth_thumb_title_name'] ) ) {
			update_post_meta( $yacht_id, 'fourth_thumb_title', $_POST['fourth_thumb_title_name'] );
		}
		if ( isset( $_POST['fourth_thumb_alt'] ) ) {
			update_post_meta( $yacht_id, 'fourth_image_thumb_alt', $_POST['fourth_thumb_alt'] );
		}
		if ( isset( $_POST['fifth_gallery_image'] ) ) {
			update_post_meta( $yacht_id, 'fifth_gallery_img', $_POST['fifth_gallery_image'] );
		}
		if ( isset( $_POST['fifth_thumb_title_name'] ) ) {
			update_post_meta( $yacht_id, 'fifth_thumb_title', $_POST['fifth_thumb_title_name'] );
		}
		if ( isset( $_POST['fifth_thumb_alt'] ) ) {
			update_post_meta( $yacht_id, 'fifth_image_thumb_alt', $_POST['fifth_thumb_alt'] );
		}
		if ( isset( $_POST['six_gallery_image'] ) ) {
			update_post_meta( $yacht_id, 'six_gallery_img', $_POST['six_gallery_image'] );
		}
		if ( isset( $_POST['six_thumb_title_name'] ) ) {
			update_post_meta( $yacht_id, 'six_thumb_title', $_POST['six_thumb_title_name'] );
		}
		if ( isset( $_POST['six_thumb_alt'] ) ) {
			update_post_meta( $yacht_id, 'six_image_thumb_alt', $_POST['six_thumb_alt'] );
		}
		if ( isset( $_POST['seven_gallery_image'] ) ) {
			update_post_meta( $yacht_id, 'seven_gallery_img', $_POST['seven_gallery_image'] );
		}
		if ( isset( $_POST['seven_thumb_title_name'] )) {
			update_post_meta( $yacht_id, 'seven_thumb_title', $_POST['seven_thumb_title_name'] );
		}
		if ( isset( $_POST['seven_thumb_alt'] ) ) {
			update_post_meta( $yacht_id, 'seven_image_thumb_alt', $_POST['seven_thumb_alt'] );
		}
		if ( isset( $_POST['eight_gallery_image'] ) ) {
			update_post_meta( $yacht_id, 'eight_gallery_img', $_POST['eight_gallery_image'] );
		}
		if ( isset( $_POST['eight_thumb_title_name'] ) ) {
			update_post_meta( $yacht_id, 'eight_thumb_title', $_POST['eight_thumb_title_name'] );
		}
		if ( isset( $_POST['eight_thumb_alt'] ) ) {
			update_post_meta( $yacht_id, 'eight_image_thumb_alt', $_POST['eight_thumb_alt'] );
		}
		if ( isset( $_POST['nine_gallery_image'] ) ) {
			update_post_meta( $yacht_id, 'nine_gallery_img', $_POST['nine_gallery_image'] );
		}
		if ( isset( $_POST['nine_thumb_title_name'] ) ) {
			update_post_meta( $yacht_id, 'nine_thumb_title', $_POST['nine_thumb_title_name'] );
		}
		if ( isset( $_POST['nine_thumb_alt'] ) ) {
			update_post_meta( $yacht_id, 'nine_image_thumb_alt', $_POST['nine_thumb_alt'] );
		}
	}
}

add_action( 'admin_enqueue_scripts', 'yacht_ajax_enqueue_script' );
function yacht_ajax_enqueue_script() {
	wp_enqueue_script('yacht-review', plugins_url( '/js/yacht-reviews.js' , __FILE__ ) , array( 'jquery' ));
}

$is_ajax = "";
if(isset($_POST['is_ajax'])){
		$is_ajax=$_POST["is_ajax"];
	}
if($is_ajax == "save_yacht_review"){

	$review_post_id = $_POST['post_id'];
	$author_name = $_POST['review_author_name'];
	$review_title = $_POST['review_title'];
	$country = $_POST['country'];
	$review_author_email = $_POST['review_author_email_address'];
	$review_rating = $_POST['review_rating'];
	$yacht_review = $_POST['yacht_review'];
	$review_date = $_POST['review_date'];
	if($review_date == ""){
		$date = "";
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
			'review' => $yacht_review,
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
	
	if($is_ajax=="approve_Yreview"){
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

	if($is_ajax=="delete_yacht_review"){
		$id = $_POST['delete_id'];
		$wpdb->delete( 'wp_reviews', array( 'id' => $id ), array( '%d' ) );
		
	}
	
	if($is_ajax=="edit_actionYacht"){
		 $edit_id = $_POST['edit_id'];
		global $wpdb;
		
		$table_name = $wpdb->prefix . "reviews";
		
		
		$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name Where id = " .$edit_id  );
		?>
			
		<?php foreach ($retrieve_data as $retrieved_data){ ?>
		<?php 
		$date = "";
			$yacht_date = $retrieved_data->review_date;
			if($yacht_date != "0000-00-00" ){ $date = date('F Y',strtotime( $yacht_date ) ); }
		 ?>
			<div class="review" id="updateReviewForm" style="color: #000;">
				<p><strong>Name</strong></p>
				<input type="hidden" name="id" id="id" size="80" value="<?php echo $retrieved_data->id;?>" />
				<input type="hidden" name="post_id" id="post_id" size="80" value="<?php echo $retrieved_data->post_id;?>" />
				<p><input type="text" name="review_author_name1" id="review_author_name1" size="80" value="<?php echo  stripslashes($retrieved_data->author_name);?>" /></p>
				<p><strong>Title</strong></p>
				<p><input type="text" name="review_title1" id="review_title1" size="80" value="<?php echo  stripslashes($retrieved_data->review_title);?>" /></p>
				<p><strong>Country(optional)</strong></p>
				<p><input type="text" name="country1" id="country1" size="80" value="<?php echo  stripslashes($retrieved_data->country);?>" /></p>
				<p><strong>Email</strong></p>
				<p><input type="text" name="yacht_author_email_address1" id="yacht_author_email_address1" size="80" value="<?php echo  stripslashes($retrieved_data->author_email);?>" /></p>
				<p><strong>Publish Date(optional)</strong></p>
				<p><input type="text" name="publish_date1" id="publish_date1" size="80" value="<?php  echo $date ; ?>" /></p>
				<p><strong>Rating</strong></p>
				<p><input type="text" name="review_rating1" id="review_rating1" size="80" value="<?php echo $retrieved_data->review_rating;?>" /></p>
				<p><strong>Review</strong></p>
				<p><textarea name="yacht_review1" id="yacht_review1" rows="4" cols="60" style="width:49%;"><?php echo  stripslashes($retrieved_data->review);?></textarea></p>
				<span id="message" style="color:red;"></span>
				<p><input type="button" name="updateReview" id="updateYachtReview" value="Update"></p>
			</div>
			
			
		<?php 
		}
		
	}
	
	if($is_ajax == "updateyachtReviews"){
		$id = $_POST['id'];
		$review_post_id = $_POST['post_id'];
		$name = $_POST['review_author_name'];
		$review_title1 = $_POST['review_title1'];
		$country1 = $_POST['country1'];
		$review_author_email = $_POST['yacht_author_email_address'];
		$review_rating = $_POST['review_rating'];
		$yacht_review = $_POST['yacht_review'];
		$publish_date1 = $_POST['publish_date1'];
		if($publish_date1 == ""){
			$new_date = "";
		}else{
			$old_date_timestamp = strtotime($publish_date1);
			$new_date = date('Y-m-d', $old_date_timestamp);
		}
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
				'review' => $yacht_review,
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
	
	if($is_ajax == "packageSave"){

		$this_yacht_id = $_POST['this_yacht_id'];
		$package_title = $_POST['package_title'];
		$package_address = $_POST['package_address'];
		$package_price = $_POST['package_price'];
		$package_image = $_POST['package_image'];
		$package_inclusion = $_POST['package_inclusion_name'];
		$package_rate = $_POST['package_rate'];
		$package_date = $_POST['package_date'];
		echo $package_desc = $_POST['package_discription_name'];
		
		global $wpdb;
		$wpdb->insert( 
			'wp_program', 
			array( 
				'post_id' => $this_yacht_id,
				'program_title' => $package_title,
				'program_address' => $package_address,
				'program_price' => $package_price,
				'program_image' => $package_image,
				'rate' => $package_rate,
				'date' => $package_date,
				'program_desc' => $package_desc,
				'program_inclusion' => $package_inclusion,
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
				'%s'
			)
		);
		echo "success";
		die();
		
		return true;
	}
	
	if($is_ajax == "packageUpdate"){

		$id = $_POST['this_package_id'];
		$this_yacht_id = $_POST['this_yacht_id'];
		$packages_title = $_POST['packages_title'];
		$packages_address = $_POST['packages_address'];
		$packages_price = $_POST['packages_price'];
		$packages_discription = $_POST['packages_discription_name'];
		$packages_inclusion = $_POST['packages_inclusion_name'];
		$packages_rate = $_POST['packages_rate'];
		$packages_image = $_POST['packages_image'];
		$packages_date = $_POST['packages_date'];


		global $wpdb;
		$wpdb->update( 
			'wp_program', 
			array( 
				'post_id' => $this_yacht_id,
				'program_title' => $packages_title,
				'program_address' => $packages_address,
				'program_price' => $packages_price,
				'rate' => $packages_rate,
				'date' => $packages_date,
				'program_image' => $packages_image,
				'program_inclusion' => $packages_inclusion,
				'program_desc' => $packages_discription,
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
				'%s'
			),
				array( '%d' )
		);
		die();
		return true;
	}
	
	if($is_ajax == "yachtAwardSave"){

		$this_yacht_id = $_POST['this_yacht_id'];
		$award_title = $_POST['award_title'];
		$award_content = $_POST['award_content'];
		
		
		global $wpdb;
		$wpdb->insert( 
			'wp_award', 
			array( 
				'post_id' => $this_yacht_id,
				'award_title' => $award_title,
				'award_content' => $award_content,
				
			),
			array( 
				'%d',
				'%s',
				'%s'
			)
		);
	
		die();
		return true;
	}
	
	
	if($is_ajax == "yachtAwardUpdate"){
		$this_yacht_id = $_POST['this_yacht_id'];
		$award_id = $_POST['this_award_id'];
		$awards_title = $_POST['awards_title'];
		$awards_content = $_POST['awards_content'];
		
		global $wpdb;
		$wpdb->update( 
			'wp_award', 
			array( 
				'post_id' => $this_yacht_id,
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
	
	if($is_ajax=="yachtDeleteAward"){
		$id = $_POST['this_award_id'];
		$wpdb->delete( 'wp_award', array( 'id' => $id ), array( '%d' ) );
	}
	
	if($is_ajax == "packageNightSave"){

		echo $this_yacht_id = $_POST['this_yacht_id'];
		echo $night_title = $_POST['night_title'];
		$night_content = $_POST['night_content'];
		$night_condition = $_POST['night_condition'];
		$id_package = $_POST['id_package'];
		
		global $wpdb;
		$wpdb->insert( 
			'wp_night', 
			array( 
				'post_id' => $this_yacht_id,
				'program_id' => $id_package,
				'night_title' => $night_title,
				'night_content' => $night_content,
				
			),
			array( 
				'%d',
				'%d',
				'%s',
				'%s'
			)
		);
		echo "success";
		die();
		return true;
	}
	
	if($is_ajax == "packageNightUpdate"){
		$this_yacht_id = $_POST['this_yacht_id'];
		$night_id = $_POST['this_night_id'];
		$packages_id = $_POST['packages_id'];
		echo $nights_title = $_POST['nights_title'];
		$nights_content = $_POST['nights_content'];
		$nights_condition = $_POST['nights_condition'];
		
		global $wpdb;
		$wpdb->update( 
			'wp_night', 
			array( 
				'post_id' => $this_yacht_id,
				'program_id' => $packages_id,
				'night_title' => $nights_title,
				'night_content' => $nights_content,
				
			),
				array( 'ID' => $night_id ),
			array( 
				'%d',
				'%d',
				'%s',
				'%s'
			),
				array( '%d' )
		);
		die();
		return true;
	}
	
	if($is_ajax=="yachtDeleteNight"){
		$id = $_POST['this_night_id'];
		$wpdb->delete( 'wp_night', array( 'id' => $id ), array( '%d' ) );
	}
	
	if($is_ajax=="yachtDeletepackage"){
		$id = $_POST['this_package_id'];
		$wpdb->delete( 'wp_program', array( 'id' => $id ), array( '%d' ) );
	}
	
	
	/*
	 * yacht cabins
	 */	
	
	if($is_ajax == "cabinSave"){

		$this_yacht_id = $_POST['this_yacht_id'];
		$cabin_title = $_POST['cabin_title'];
		$cabin_image_first = $_POST['cabin_image_first'];
		$cabin_image_second = $_POST['cabin_image_second'];
		$cabin_image_third = $_POST['cabin_image_third'];
		$cabin_image_fourth = $_POST['cabin_image_fourth'];
		$cabin_image_fifth = $_POST['cabin_image_fifth'];
		$cabin_discription = $_POST['cabin_discription_name'];
		
		global $wpdb;
		$wpdb->insert( 
			'wp_cabin', 
			array( 
				'post_id' => $this_yacht_id,
				'cabin_title' => $cabin_title,
				'cabin_image_first' => $cabin_image_first,
				'cabin_image_second' => $cabin_image_second,
				'cabin_image_third' => $cabin_image_third,
				'cabin_image_fourth' => $cabin_image_fourth,
				'cabin_image_fifth' => $cabin_image_fifth,
				'cabin_desc' => $cabin_discription,
				'cabin_date' => date('y-m-d'),
				
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
		echo "Success";
		die();
		return true;
	}

	if($is_ajax == "cabinUpdate"){

		$id = $_POST['this_cabin_id'];
		$this_yacht_id = $_POST['this_yacht_id'];
		$cabins_title = $_POST['cabins_title'];
		$cabins_image_first = $_POST['cabins_image'];
		$cabins_image_second = $_POST['cabins_image_second'];
		$cabins_image_third = $_POST['cabins_image_third'];
		$cabins_image_fourth = $_POST['cabins_image_fourth'];
		$cabins_image_fifth = $_POST['cabins_image_fifth'];
		$cabins_discription = $_POST['cabins_discription_name'];
		
		global $wpdb;
		$wpdb->update( 
			'wp_cabin', 
			array( 
				'post_id' => $this_yacht_id,
				'cabin_title' => $cabins_title,
				'cabin_image_first' => $cabins_image_first,
				'cabin_image_second' => $cabins_image_second,
				'cabin_image_third' => $cabins_image_third,
				'cabin_image_fourth' => $cabins_image_fourth,
				'cabin_image_fifth' => $cabins_image_fifth,
				'cabin_desc' => $cabins_discription,
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
	
	
	if($is_ajax=="deleteCabin"){
		$id = $_POST['delete_cabin'];
		$wpdb->delete( 'wp_cabin', array( 'id' => $id ), array( '%d' ) );
	}
	
function yacht_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('image-upload', plugins_url( '/js/media-upload.js' , __FILE__ ), array('jquery','media-upload','thickbox')); 
	wp_enqueue_script('image-upload');
	wp_enqueue_script( 'jquery-ui' );
	wp_enqueue_script( 'yacht-map', plugins_url( '/js/yacht_map.js', __FILE__ ));
	wp_register_script( 'maps', 'http://maps.google.com/maps/api/js?sensor=false', array(), null, false );
    wp_enqueue_script('maps');
}
function yacht_styles() {
	wp_enqueue_style('thickbox');
	wp_enqueue_style( 'custom-yacht', plugins_url('css/custom-yacht.css', __FILE__) );
}


add_action('admin_print_scripts', 'yacht_scripts');
add_action('admin_print_styles', 'yacht_styles');
?>
 
