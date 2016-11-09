
<?php
/*
Plugin Name: Custom Reviews
Description: Declares a plugin that will create a custom reviews
Version: 1.0
*/

	register_activation_hook( __FILE__, 'reviews_plugin_tables' );

	function reviews_plugin_tables(){
		global $wpdb;

		$table_name = $wpdb->prefix . 'reviews';

		$sql = "CREATE TABLE $table_name (
		 `id` int(10) NOT NULL AUTO_INCREMENT,
		`post_id` int(10) NOT NULL,
		`author_name` varchar(50) NOT NULL,
		`review_title` varchar(500) NOT NULL,
		`country` varchar(50) NOT NULL,
		`author_email` varchar(50) NOT NULL,
		`review_rating` int(10) NOT NULL,
		`review` text NOT NULL,
		`review_date` date NOT NULL,
		`review_approved` tinyint NOT NULL,
		PRIMARY KEY (`id`)
		);";
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}
	?>
	
	<?php
	add_action('admin_init','reviews_meta_init');
	function reviews_meta_init($post_type){
   
		$args = array(
		   'public'   => true,
		   '_builtin' => false
		);

		$output = 'names'; // names or objects, note names is the default
		$operator = 'and'; // 'and' or 'or'

		$post_types = get_post_types( $args, $output, $operator ); 
			
		foreach ($post_types as $type){
			add_meta_box('reviews_meta_box', 'Reviews Meta Box', 'add_new_review', $type, 'normal', 'high');
		}
	}
	
	
	add_action( 'admin_menu', 'custom_reviews_admin_menu' );
 
	function custom_reviews_admin_menu() {
		add_options_page(
			'Custom Reviews',
			'Custom Reviews Menu Item',
			'manage_options',
			'custom-reviews',
			'reviews_options_page'
		);
	}

	function reviews_options_page() {
		?>
		<div class="wrap">
			<h2>My Plugin Options</h2>
			your form goes here
			
			<?php

			$args = array(
			   'public'   => true,
			   '_builtin' => false
			);

			$output = 'names'; // names or objects, note names is the default
			$operator = 'and'; // 'and' or 'or'

			$post_types = get_post_types( $args, $output, $operator ); 
			echo $_words = "'".implode("','", $post_types)."'";
			print_r($post_types);
			foreach ( $post_types  as $post_type ) {

			   echo '<p>' . $post_type . '</p>';
			}
			
			?>
		</div>
		<?php
	}
	
	function add_new_review(){
		global $post;
		$id = $post->ID;
		$review_form = '';
		$review_form .= '<div class="review-box">';
		$review_form .= '<p class="add-review"><input type="button"  id="newReview" value="Add New Review"></p>';
		$review_form .=	'<div class="review" id="reviewForm" style="display:none;">';
		$review_form .=	'<p><strong>Name</strong></p>';
		$review_form .=	'<input type="hidden" name="post_id" id="post_id" size="80" value="' .$id. '" />';
		$review_form .=	'<p><input type="text" name="review_author_name1" id="review_author_name1" size="80" value="" /></p>';
		$review_form .=	'<p><strong>Title</strong></p>';
		$review_form .=	'<p><input type="text" name="review_title" id="review_title" size="80" value="" /></p>';
		$review_form .=	'<p><strong>Country</strong></p>';
		$review_form .=	'<p><input type="text" name="country" id="country" size="80" value="" /></p>';
		$review_form .=	'<p><strong>Publish Date</strong></p>';
		$review_form .=	'<p><input type="text" name="publish_date" id="publish_date" size="80" value="" placeholder="yyyy-mm-dd"/></p>';
		$review_form .=	'<p><strong>Email</strong></p>';
		$review_form .=	'<p><input type="text" name="review_author_email_address1" id="review_author_email_address1" size="80" value="" /></p>';
		$review_form .=	'<p><strong>Rating</strong></p>';
		$review_form .=	'<p><input type="text" name="review_rating1" id="review_rating1" size="80" value="" /></p>';
		$review_form .=	'<p><strong>Review</strong></p>';
		$review_form .=	'<p><textarea name="custom_review1" id="custom_review1" rows="4" cols="60" style="width:49%;"></textarea></p>';
		$review_form .=	'<span id="message" style="color:red;"></span>';
		$review_form .=	'<p><input type="button" name="review" id="review" value="Save"></p>';
		$review_form .=	'</div>';
				
		$review_form .=	'</div>';
		
		$review_form .= '<div class="review-box">';	
		$review_form .=	'<input type="hidden" name="show_post_id" id="show_post_id" size="80" value="' .$id. '" />';
		$review_form .=	'<p class="display-review"><span id="showReview">Recent Reviews</span></p>';
		$review_form .=	'<p><span id="reviewContent" style="color: #fff;"></span></p>';
		$review_form .=	'<p><span id="reviewEditForm" style="color: #fff;"></span></p>';
		$review_form .= '</div>';
		
		echo $review_form; 
	} ?>
	
	
	<?php
	
	function reviews_saved($review_post_id){

		$review_post_id = $_POST['post_id'];
		$author_name = $_POST['review_author_name1'];
		$review_title = $_POST['review_title'];
		$country = $_POST['country'];
		$review_author_email = $_POST['review_author_email_address1'];
		$review_rating = $_POST['review_rating1'];
		$custom_review = $_POST['custom_review1'];
		$review_date = $_POST['review_date'];
		if($review_date == ""){
			echo $date = date('y-m-d');
		}else{
			$date = $review_date;
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
				'review' => $custom_review,
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
	add_action('wp_ajax_reviews_saved', 'reviews_saved');
	add_action('wp_ajax_nopriv_reviews_saved', 'reviews_saved');
	add_action('wp_ajax_get_custom_review', 'get_custom_review');
	add_action('wp_ajax_nopriv_get_custom_review', 'get_custom_review');


	function get_custom_review(){
	
		$_post_id = $_POST['post_id'];
		global $wpdb;
		
		$table_name = $wpdb->prefix . "reviews";
		
		$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name Where post_id = " .$_post_id  );
		?>
		<table style="text-align:left; color: #000; width:100%">
			<tr>
			<th>Author</th>
			<th>Email</th>
			<th>Review Rating</th>		
			<th>Review</th>		
			<th>Active</th>
			<th>Action</th>
		</tr>
		<?php foreach ($retrieve_data as $retrieved_data){ ?>
			
		<tr>
			<td style="width: 120px;"><?php echo $retrieved_data->author_name;?></td>
			<td style="width: 100px;"><?php echo $retrieved_data->author_email;?></td>		
			
			<?php $nb_stars = $retrieved_data->review_rating;?>
			<td style="width: 115px;"><?php for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
					if ( $star_counter <= $nb_stars ) {?>
						<i class="fa fa-star active-review"></i>
					<?php } else { ?>
						<i class="fa fa-star-o"></i>
				<?php	}
				} ?></td>
			<td style="width: 750px;"><?php echo $retrieved_data->review;?></td>
			
				<?php $id = $retrieved_data->id;?>
				<?php $approved = $retrieved_data->review_approved; ?>
			<td><input type="hidden" class="active" name="active" id="active" value="<?php echo $id;?>">
			<input type="checkbox" class="btnapprove" id="<?php echo $id;?>"  <?php if ($approved == 1){?> checked="checked" <?php } ?>/></td>
			<td><input type="hidden" class="delete_id" name="delete_id" id="delete_id" value="<?php echo $id;?>"><img src="<?php echo plugins_url( 'images/edit.png', __FILE__ )?>" title="Edit" id="<?php echo $id;?>" class="edit"><img src="<?php echo plugins_url( 'images/cross.png', __FILE__ )?>" title="Delete" id="<?php echo $id;?>" class="delete"/></td>	
			
		</tr>
			
			
		<?php 
		}
		?>
		</table>
		<?php
	}	
	$is_ajax=$_POST["is_ajax"];
	$id = $_POST['active'];
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
	
	$is_ajax=$_POST["is_ajax"];
	$id = $_POST['delete_id'];
	if($is_ajax==1){
		$id = $_POST['delete_id'];
		$wpdb->delete( 'wp_reviews', array( 'id' => $id ), array( '%d' ) );
	}
	
	$is_ajax=$_POST["is_ajax"];
 $edit_id = $_POST['edit_id'];
	if($is_ajax=="edit_actionVillas"){
		 $edit_id = $_POST['edit_id'];
		global $wpdb;
		
		$table_name = $wpdb->prefix . "reviews";
		
		
		$retrieve_data = $wpdb->get_results( "SELECT * FROM $table_name Where id = " .$edit_id  );
		?>
			
		<?php foreach ($retrieve_data as $retrieved_data){ ?>
			
			<div class="review" id="updateReviewForm" style="color: #000;">
				<p><strong>Name</strong></p>
				<input type="hidden" name="id" id="id" size="80" value="<?php echo $retrieved_data->id;?>" />
				<input type="hidden" name="post_id" id="post_id" size="80" value="<?php echo $retrieved_data->post_id;?>" />
				<p><input type="text" name="review_author_name" id="review_author_name" size="80" value="<?php echo $retrieved_data->author_name;?>" /></p>
				<p><strong>Title</strong></p>
				<p><input type="text" name="review_title1" id="review_title1" size="80" value="<?php echo $retrieved_data->review_title;?>" /></p>
				<p><strong>Email</strong></p>
				<p><input type="text" name="retreat_author_email_address" id="retreat_author_email_address" size="80" value="<?php echo $retrieved_data->author_email;?>" /></p>
				<p><strong>Rating</strong></p>
				<p><input type="text" name="review_rating" id="review_rating" size="80" value="<?php echo $retrieved_data->review_rating;?>" /></p>
				<p><strong>Review</strong></p>
				<p><textarea name="custom_review" id="custom_review" rows="4" cols="60" style="width:49%;"><?php echo $retrieved_data->review;?></textarea></p>
				<span id="message" style="color:red;"></span>
				<p><input type="button" name="updateReview" id="updateReview" value="Update"></p>
			</div>
			
			
		<?php 
		}
		
	}
	
	$is_ajax=$_POST["is_ajax"];
	if($is_ajax == "updatecustomReviews"){

		$id = $_POST['id'];
		$review_post_id = $_POST['post_id'];
		$name = $_POST['review_author_name'];
		$review_title1 = $_POST['review_title1'];
		$review_author_email = $_POST['retreat_author_email_address'];
		$review_rating = $_POST['review_rating'];
		$custom_review = $_POST['custom_review'];


		global $wpdb;
		$wpdb->update( 
			'wp_reviews', 
			array( 
				'post_id' => $review_post_id,
				'author_name' => $name,
				'review_title' => $review_title1,
				'author_email' => $review_author_email,
				'review_rating' => $review_rating,
				'review' => $custom_review,
				'review_date' => date('y-m-d'),
			),
				array( 'ID' => $id ),
			array( 
				'%d',
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
	
	?>
	
	<?php 
	
		function review_scripts(){
			
			wp_enqueue_script('inkthemes', plugins_url( 'js/review.js' , __FILE__ ) , array( 'jquery' ));	

			wp_localize_script( 'inkthemes', 'ReviewAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));
	
		}
		
		add_action('admin_print_scripts', 'review_scripts');
	?>