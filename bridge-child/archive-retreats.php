<?php
get_header('archive'); ?>
<?php 
global $wp_query;
global $qode_template_name;
$page = get_page_by_path( 'bali-retreats');
$id = $page->ID;
$qode_template_name = get_page_template_slug($id);
$category = get_post_meta($id, "qode_choose-blog-category", true);
$post_number = get_post_meta($id, "qode_show-posts-per-page", true);
$page_object = get_post( $id );
$content = $page_object->post_content;
$content = apply_filters( 'the_content', $content );
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

$sidebar = get_post_meta($id, "qode_show-sidebar", true); 

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$background_color = get_post_meta($id, "qode_page_background_color", true);
}else{
	$background_color = "";
}

if($qode_options_proya['number_of_chars_large_image'] != "") {
	qode_set_blog_word_count($qode_options_proya['number_of_chars_large_image']);
}

$blog_content_position = "content_above_blog_list";
if(isset($qode_options_proya['blog_content_position'])){
	$blog_content_position = $qode_options_proya['blog_content_position'];
}

$content_style_spacing = "";
if(get_post_meta($id, "qode_margin_after_title", true) != ""){
	if(get_post_meta($id, "qode_margin_after_title_mobile", true) == 'yes'){
		$content_style_spacing = "padding-top:".esc_attr(get_post_meta($id, "qode_margin_after_title", true))."px !important";
	}else{
		$content_style_spacing = "padding-top:".esc_attr(get_post_meta($id, "qode_margin_after_title", true))."px";
	}
}

?>
<style>
#home { 
	background: url(<?php echo get_stylesheet_directory_uri(). '/img/Bali-Retreat-h1.jpg'; ?>) 50% 0 no-repeat fixed; 
	height: 770px;  
	margin: 0 auto; 
    width: 100%; 
	background-size: cover !important;
    position: relative;
}

</style>

	<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
		<script>
		var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
		</script>
	<?php } ?>

		<?php get_template_part( 'title-archive' ); ?>
	<div class="container">
		<div class="container_inner default_template_holder clearfix page_container_inner">
				
			<div class="wpb_wrapper" style="padding: 20px;text-align: center;">
				
				<div class="separator  transparent left  " style="margin-top: 10px;margin-bottom: 10px;"></div>

				<div class="wpb_text_column wpb_content_element ">
					<div class="wpb_wrapper listing-desc">
						<?php 
							$content = "";
							$gray_bar = "";
							$gray_bar_id = "";
							global $wp_query;
							global $qode_template_name;
							$gray_bar = get_page_by_path( 'bali-retreats');
							$gray_bar_id = $gray_bar->ID;
							$content_post = get_post($gray_bar_id);
							$content = $content_post->post_content;
							$content = apply_filters('the_content', $content);
							$content = str_replace(']]>', ']]&gt;', $content);
							echo $content;
						?>
					</div> 
				</div> 
			</div>
			<br/>
			<div class="wpb_row section vc_row-fluid" style=" text-align:left;">
				<div class=" full_section_inner clearfix">
					<div class="vc_span12 wpb_column column_container ">
						<div class="wpb_wrapper">
						
							<?php include_once('retreats-listing.php'); ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/rangeslider.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery-ui-1.8.9.custom.css">
<script>
	jQuery(document).ready(function($){
		var bgHeight = $('.has_background').height();
		var admin_bar = 32;
		var total_height = bgHeight + admin_bar + "px";
		var title_margin = $('.archive-page-title').css('marginTop').replace(/[^-\d\.]/g, '');
		var title_margins = admin_bar + (-68);
		
		//alert(admin_bar+title_margin+"px");
		//$('.has_background').css('height',total_height);
		if ( $('body').hasClass( "not-logged" ) ) {
		
			$('.has_background').css('height',total_height);
			$('.archive-page-title').css('marginTop', title_margins);
		}
	
		$('header').addClass('archive-page-header').removeClass('single-magazine-page-header');
		
		var datePickerUrl = '<?php bloginfo('stylesheet_directory'); ?>';
		$(".date-picker").datepicker({
			dateFormat: 'yy-m-d',
			showOn: 'button',
			buttonImage: datePickerUrl+'/img/icon-datepicker.png' ,
			buttonImageOnly: true,
			numberOfMonths: 1

		});

		
		$("#location").val("<?php echo $location; ?>");
		$("#slider").slider({
			disabled: false,
			step: 100,
			range: "min",
			value: '<?php echo $highPrice; ?>',
			min: 200,
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
