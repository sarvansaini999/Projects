<?php 
/*
Template Name: Retreat Program Booking
*/ 
?>
<?php
	global $qode_options_proya;
	$email_to = $qode_options_proya['receive_mail'];
	$email_from = $qode_options_proya['email_from'];
	wp_enqueue_style( 'ui-datepicker', get_stylesheet_directory_uri() . '/css/jquery-ui-1.8.9.custom.css');
	$message='';
	$name='';
	$error=false;
if (!empty($_POST)) {
	
	$email='';
	$country='';
	$phone='';
	$arrival_date='';
	$departure_date='';
	$stay_length='';
	$adults='';
	$guests='';
	$infants='';
	$occasions='';
	$about_us='';
	$msg='';
	
	if(isset($_POST['post_title']) && $_POST['post_title'] !=''){
		$post_title=$_POST['post_title'];
	}
	if(isset($_POST['post_url']) && $_POST['post_url'] !=''){
		$post_url=$_POST['post_url'];
	}
	
	if(isset($_POST['programme_name']) && $_POST['programme_name'] !=''){
		$programme_name=$_POST['programme_name'];
	}
	
	if(isset($_POST['customer_name']) && $_POST['customer_name'] !=''){
		$name=$_POST['customer_name'];
	}else{
		$error=true;
	}


	if(isset($_POST['email']) && $_POST['email'] !=''){
		$email=$_POST['email'];
	}else{
		$error=true;
	}

	if(isset($_POST['country']) && $_POST['country'] !=''){
		$country=$_POST['country'];
	}else{
		$error=true;
	}
	
	if(isset($_POST['phone']) && $_POST['phone'] !=''){
		$phone=$_POST['phone'];
	}
	if(isset($_POST['arrival_date']) && $_POST['arrival_date'] !=''){
		$arrival_date= date('d F Y',strtotime($_POST['arrival_date'] ) );
	}
	if(isset($_POST['departure_date']) && $_POST['departure_date'] !=''){
		$departure_date= date('d F Y',strtotime($_POST['departure_date'] ) );
	}
	
	if(isset($_POST['guests']) && $_POST['guests'] !=''){
		$guests=$_POST['guests'];
	}else{
		$error=true;
	}
	
	if(isset($_POST['budget']) && $_POST['budget'] !=''){
		$budget=$_POST['budget'];
	}
	if(isset($_POST['msg']) && $_POST['msg'] !=''){
		$msg=$_POST['msg'];
	}

	if($error ==false){
		$body='<table width="600px">';
			$body .='<tr>';
				$body .='<td colspan="2">Thank you for contacting Ultimate Bali, we will be in touch with you very shortly.</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td colspan="2">&nbsp;</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td colspan="2" style="font-size: 14px;font-weight: bold; color:#000;text-transform: uppercase;">BOOKING ENQUIRY - '.$post_title.'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td colspan="2">&nbsp;</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td style="vertical-align: top;width: 160px">Retreat Name</td>';
				$body .='<td><a href="'.$post_url.'">' . $post_title .'</a></td>';
			$body .='</tr>';
			if($programme_name != ''){
				$body .='<tr>';
					$body .='<td style="vertical-align: top;width: 160px">Programme Name</td>';
					$body .='<td>' . $programme_name .'</td>';
				$body .='</tr>';
			}
			$body .='<tr>';
				$body .='<td style="vertical-align: top;width: 160px">Name</td>';
				$body .='<td>' . $name .'</td>';
			$body .='</tr>';

			if($email !=''){
				$body .='<tr>';
					$body .='<td style="vertical-align: top;width: 160px">Email</td>';
					$body .='<td><a href="mailto:'.$email.'">' . $email .'</a></td>';
				$body .='</tr>';
			}
			
			$body .='<tr>';
				$body .='<td style="vertical-align: top;width: 160px">Country</td>';
				$body .='<td>' . $country .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td style="vertical-align: top;width: 160px">Phone</td>';
				$body .='<td><a href="tel:'.$phone.'">' . $phone .'</a></td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td style="vertical-align: top;width: 160px">Arrival Date</td>';
				$body .='<td>' . $arrival_date .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td style="vertical-align: top;width: 160px">Departure Date</td>';
				$body .='<td>' . $departure_date .'</td>';
			$body .='</tr>';
			
			
			$body .='<tr>';
				$body .='<td style="vertical-align: top;width: 160px">Guests</td>';
				$body .='<td>' . $guests .'</td>';
			$body .='</tr>';
			
			
			$body .='<tr style="vertical-align: top;width: 160px">';
				$body .='<td>Budget</td>';
				$body .='<td>' . $budget .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td style="vertical-align: top;width: 160px">Message</td>';
				$body .='<td>' . $msg .'</td>';
			$body .='</tr>';
			
		$body .='</table>';

		if($email_to != ""){
			$to = $email_to;
		}else{
			$to = 'info@ultimatebali.com';
		}
		if($email_from != ""){
			$from_email = $email_from;
		}else{
			$from_email = $email;
		}
		
		$subject='Booking Enquiry - '.$post_title;

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		//$headers .= 'To: Rammi Gill <' . $to.'>' . "\r\n";
		
		$headers .= 'From: '.$name.' <'.$from_email.'>' . "\r\n";
		$headers .= 'Cc: rammigill@hotmail.com' . "\r\n";
		//$headers .= 'Reply-To: '. $email . "\r\n";
		
		if(@mail($to, $subject, $body, $headers)){
			$headers = "";
			$headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Ultimate Bali <info@ultimatebali.com>' . "\r\n";
			mail($email, $subject, $body, $headers);
		}
	}
	
	
	if($error==false){
		$message='Thank you for contacting us <br/> we will be in touch with you very shortly.';
	}else{
		$message='Please fill in all fields.';
	}	

}
?>
<?php
global $wp_query;
$id = $wp_query->get_queried_object_id();
get_header('archive');

$hide_contact_form_website = "";
if (isset($qode_options_proya['hide_contact_form_website'])) $hide_contact_form_website = $qode_options_proya['hide_contact_form_website'];

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$background_color = get_post_meta($id, "qode_page_background_color", true);
}else{
	$background_color = "";
}

if($qode_options_proya['enable_google_map'] == "yes"){
	$container_class= " full_map";
} else {
	$container_class= "";
}
$show_section = "yes";
if(isset($qode_options_proya['section_between_map_form'])) {
	$show_section = $qode_options_proya['section_between_map_form'];
}
$map_form_section_position = "center";
$map_form_section_position_class = " contact_section_position_center";
if(isset($qode_options_proya['section_between_map_form_position']) && $qode_options_proya['section_between_map_form_position'] != "") {
	$map_form_section_position = $qode_options_proya['section_between_map_form_position'];
	$map_form_section_position_class = " contact_section_position_" . $qode_options_proya['section_between_map_form_position'];
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
	
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			<?php  
					session_start();
					if(isset($_POST['post_id'])){ 
						$post_id = $_POST['post_id'];
						$_SESSION['post_id'] = $_POST['post_id'];
						$_SESSION['title'] = $_POST['title'];
					}else{
						$post_id = $_SESSION['post_id'];
						$title = $_SESSION['title'];
					}
					
					
			?>
			<?php
				if(isset($_GET['title'])){
					$post_title = "";
					$post_title = $_GET['title'];
					$page = get_page_by_title( $post_title );
					$post_id = $page->ID;
					$post_id = wp_get_post_id($post_title);
				}
			?>
			<?php $venue_title = get_the_title( $post_id ); ?>
		<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
			<script>
			var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
			</script>
		<?php } ?>
		
		<div class="title_outer title_without_animation" data-height="550">
		<div class="title title_size_small  position_left " style="height:540px;">
			<div class="image not_responsive"></div>
					<div class="title_holder booking_holder" style="padding-top:100px;height:440px; background:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id ($id) ); ?>') !important;background-attachment: fixed !important;background-position: 0px -186px !important;">
					<h1 class="archive-page-title  booking-page-title"><span class="breadcrumb_title programme-venue">Booking Enquiry</span></h1>
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
		
		<div class="container"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
		<div class="container_inner<?php echo $container_class; ?> default_template_holder clearfix"  <?php qode_inline_style($content_style_spacing); ?>>
				<div class="contact_detail">
					<?php  if(isset($_POST['submit'])){ ?>
						<div class="contact-success contact_section<?php echo $map_form_section_position_class; ?>">
							
							<?php if(isset($message) && $message !=''){ echo "<h3>". $message ."</h3>";} ?>
										
							
							<div class="separator small <?php echo $map_form_section_position; ?>"></div>
						</div>
						<?php }else{ ?>
						<div class="contact_section<?php echo $map_form_section_position_class; ?>">
							
					
										
							<h2><?php echo $venue_title ; ?></h2>
							<div class="separator small <?php echo $map_form_section_position; ?>"></div>
						</div>
					<?php if($qode_options_proya['enable_contact_form'] == "yes"){ ?>
					<div class="two_columns_66_33 clearfix grid2">
						<div class="column1">
							
							<div class="column_inner">
								<div class="contact_form">
									<!--<h5>Programme Booking Form</h5>-->
									<form id="booking_form" action="" method="POST">
											
												
												<input type="hidden" name="post_title" value="<?php echo $venue_title; ?>"/>
												<input type="hidden" name="post_url" value="<?php echo get_permalink ( $post_id ) ?>"/>
												<?php $title = $_POST['title'];
												if($title != ""){
												?>
												<div class="column1">
													<div class="column_inner">
													<input type='hidden' name='programme_name' id='programme_name' value="<?php echo $title = $_POST['title']; ?>" class="placeholder" placeholder="Programme Name *"/>
													<input type='text' value="<?php echo $title = $_POST['title']; ?>" class="placeholder" placeholder="Programme Name *"/>
														
													</div>
												</div>
												<?php } ?>
												<div class="column2">
													<div class="column_inner">
														<input type='text' name='customer_name' id='customer_name' value="<?php echo $name; ?>" class="requiredField placeholder" placeholder="Your Name *"/>
													</div>
												</div>
											 
												<div class="column1">
													<div class="column_inner">
														<input type='text' name='email' id='email' value="<?php echo $email; ?>" class="requiredField email placeholder" placeholder="Email Address *"/>
													</div>
												</div>
												
												<div class="column2">
													<div class="column_inner">
														<select name='country' class="requiredField" id='country'>
															<option value="">Country *</option>
															<option value="Afganistan">Afghanistan</option>
															<option value="Albania">Albania</option>
															<option value="Algeria">Algeria</option>
															<option value="American Samoa">American Samoa</option>
															<option value="Andorra">Andorra</option>
															<option value="Angola">Angola</option>
															<option value="Anguilla">Anguilla</option>
															<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
															<option value="Argentina">Argentina</option>
															<option value="Armenia">Armenia</option>
															<option value="Aruba">Aruba</option>
															<option value="Australia">Australia</option>
															<option value="Austria">Austria</option>
															<option value="Azerbaijan">Azerbaijan</option>
															<option value="Bahamas">Bahamas</option>
															<option value="Bahrain">Bahrain</option>
															<option value="Bangladesh">Bangladesh</option>
															<option value="Barbados">Barbados</option>
															<option value="Belarus">Belarus</option>
															<option value="Belgium">Belgium</option>
															<option value="Belize">Belize</option>
															<option value="Benin">Benin</option>
															<option value="Bermuda">Bermuda</option>
															<option value="Bhutan">Bhutan</option>
															<option value="Bolivia">Bolivia</option>
															<option value="Bonaire">Bonaire</option>
															<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
															<option value="Botswana">Botswana</option>
															<option value="Brazil">Brazil</option>
															<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
															<option value="Brunei">Brunei</option>
															<option value="Bulgaria">Bulgaria</option>
															<option value="Burkina Faso">Burkina Faso</option>
															<option value="Burundi">Burundi</option>
															<option value="Cambodia">Cambodia</option>
															<option value="Cameroon">Cameroon</option>
															<option value="Canada">Canada</option>
															<option value="Canary Islands">Canary Islands</option>
															<option value="Cape Verde">Cape Verde</option>
															<option value="Cayman Islands">Cayman Islands</option>
															<option value="Central African Republic">Central African Republic</option>
															<option value="Chad">Chad</option>
															<option value="Channel Islands">Channel Islands</option>
															<option value="Chile">Chile</option>
															<option value="China">China</option>
															<option value="Christmas Island">Christmas Island</option>
															<option value="Cocos Island">Cocos Island</option>
															<option value="Colombia">Colombia</option>
															<option value="Comoros">Comoros</option>
															<option value="Congo">Congo</option>
															<option value="Cook Islands">Cook Islands</option>
															<option value="Costa Rica">Costa Rica</option>
															<option value="Cote DIvoire">Cote D'Ivoire</option>
															<option value="Croatia">Croatia</option>
															<option value="Cuba">Cuba</option>
															<option value="Curaco">Curacao</option>
															<option value="Cyprus">Cyprus</option>
															<option value="Czech Republic">Czech Republic</option>
															<option value="Denmark">Denmark</option>
															<option value="Djibouti">Djibouti</option>
															<option value="Dominica">Dominica</option>
															<option value="Dominican Republic">Dominican Republic</option>
															<option value="East Timor">East Timor</option>
															<option value="Ecuador">Ecuador</option>
															<option value="Egypt">Egypt</option>
															<option value="El Salvador">El Salvador</option>
															<option value="Equatorial Guinea">Equatorial Guinea</option>
															<option value="Eritrea">Eritrea</option>
															<option value="Estonia">Estonia</option>
															<option value="Ethiopia">Ethiopia</option>
															<option value="Falkland Islands">Falkland Islands</option>
															<option value="Faroe Islands">Faroe Islands</option>
															<option value="Fiji">Fiji</option>
															<option value="Finland">Finland</option>
															<option value="France">France</option>
															<option value="French Guiana">French Guiana</option>
															<option value="French Polynesia">French Polynesia</option>
															<option value="French Southern Ter">French Southern Ter</option>
															<option value="Gabon">Gabon</option>
															<option value="Gambia">Gambia</option>
															<option value="Georgia">Georgia</option>
															<option value="Germany">Germany</option>
															<option value="Ghana">Ghana</option>
															<option value="Gibraltar">Gibraltar</option>
															<option value="Great Britain">Great Britain</option>
															<option value="Greece">Greece</option>
															<option value="Greenland">Greenland</option>
															<option value="Grenada">Grenada</option>
															<option value="Guadeloupe">Guadeloupe</option>
															<option value="Guam">Guam</option>
															<option value="Guatemala">Guatemala</option>
															<option value="Guinea">Guinea</option>
															<option value="Guyana">Guyana</option>
															<option value="Haiti">Haiti</option>
															<option value="Hawaii">Hawaii</option>
															<option value="Honduras">Honduras</option>
															<option value="Hong Kong">Hong Kong</option>
															<option value="Hungary">Hungary</option>
															<option value="Iceland">Iceland</option>
															<option value="India">India</option>
															<option value="Indonesia">Indonesia</option>
															<option value="Iran">Iran</option>
															<option value="Iraq">Iraq</option>
															<option value="Ireland">Ireland</option>
															<option value="Isle of Man">Isle of Man</option>
															<option value="Israel">Israel</option>
															<option value="Italy">Italy</option>
															<option value="Jamaica">Jamaica</option>
															<option value="Japan">Japan</option>
															<option value="Jordan">Jordan</option>
															<option value="Kazakhstan">Kazakhstan</option>
															<option value="Kenya">Kenya</option>
															<option value="Kiribati">Kiribati</option>
															<option value="Korea North">Korea North</option>
															<option value="Korea Sout">Korea South</option>
															<option value="Kuwait">Kuwait</option>
															<option value="Kyrgyzstan">Kyrgyzstan</option>
															<option value="Laos">Laos</option>
															<option value="Latvia">Latvia</option>
															<option value="Lebanon">Lebanon</option>
															<option value="Lesotho">Lesotho</option>
															<option value="Liberia">Liberia</option>
															<option value="Libya">Libya</option>
															<option value="Liechtenstein">Liechtenstein</option>
															<option value="Lithuania">Lithuania</option>
															<option value="Luxembourg">Luxembourg</option>
															<option value="Macau">Macau</option>
															<option value="Macedonia">Macedonia</option>
															<option value="Madagascar">Madagascar</option>
															<option value="Malaysia">Malaysia</option>
															<option value="Malawi">Malawi</option>
															<option value="Maldives">Maldives</option>
															<option value="Mali">Mali</option>
															<option value="Malta">Malta</option>
															<option value="Marshall Islands">Marshall Islands</option>
															<option value="Martinique">Martinique</option>
															<option value="Mauritania">Mauritania</option>
															<option value="Mauritius">Mauritius</option>
															<option value="Mayotte">Mayotte</option>
															<option value="Mexico">Mexico</option>
															<option value="Midway Islands">Midway Islands</option>
															<option value="Moldova">Moldova</option>
															<option value="Monaco">Monaco</option>
															<option value="Mongolia">Mongolia</option>
															<option value="Montserrat">Montserrat</option>
															<option value="Morocco">Morocco</option>
															<option value="Mozambique">Mozambique</option>
															<option value="Myanmar">Myanmar</option>
															<option value="Nambia">Nambia</option>
															<option value="Nauru">Nauru</option>
															<option value="Nepal">Nepal</option>
															<option value="Netherland Antilles">Netherland Antilles</option>
															<option value="Netherlands">Netherlands (Holland, Europe)</option>
															<option value="Nevis">Nevis</option>
															<option value="New Caledonia">New Caledonia</option>
															<option value="New Zealand">New Zealand</option>
															<option value="Nicaragua">Nicaragua</option>
															<option value="Niger">Niger</option>
															<option value="Nigeria">Nigeria</option>
															<option value="Niue">Niue</option>
															<option value="Norfolk Island">Norfolk Island</option>
															<option value="Norway">Norway</option>
															<option value="Oman">Oman</option>
															<option value="Pakistan">Pakistan</option>
															<option value="Palau Island">Palau Island</option>
															<option value="Palestine">Palestine</option>
															<option value="Panama">Panama</option>
															<option value="Papua New Guinea">Papua New Guinea</option>
															<option value="Paraguay">Paraguay</option>
															<option value="Peru">Peru</option>
															<option value="Phillipines">Philippines</option>
															<option value="Pitcairn Island">Pitcairn Island</option>
															<option value="Poland">Poland</option>
															<option value="Portugal">Portugal</option>
															<option value="Puerto Rico">Puerto Rico</option>
															<option value="Qatar">Qatar</option>
															<option value="Republic of Montenegro">Republic of Montenegro</option>
															<option value="Republic of Serbia">Republic of Serbia</option>
															<option value="Reunion">Reunion</option>
															<option value="Romania">Romania</option>
															<option value="Russia">Russia</option>
															<option value="Rwanda">Rwanda</option>
															<option value="St Barthelemy">St Barthelemy</option>
															<option value="St Eustatius">St Eustatius</option>
															<option value="St Helena">St Helena</option>
															<option value="St Kitts-Nevis">St Kitts-Nevis</option>
															<option value="St Lucia">St Lucia</option>
															<option value="St Maarten">St Maarten</option>
															<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
															<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
															<option value="Saipan">Saipan</option>
															<option value="Samoa">Samoa</option>
															<option value="Samoa American">Samoa American</option>
															<option value="San Marino">San Marino</option>
															<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
															<option value="Saudi Arabia">Saudi Arabia</option>
															<option value="Senegal">Senegal</option>
															<option value="Serbia">Serbia</option>
															<option value="Seychelles">Seychelles</option>
															<option value="Sierra Leone">Sierra Leone</option>
															<option value="Singapore">Singapore</option>
															<option value="Slovakia">Slovakia</option>
															<option value="Slovenia">Slovenia</option>
															<option value="Solomon Islands">Solomon Islands</option>
															<option value="Somalia">Somalia</option>
															<option value="South Africa">South Africa</option>
															<option value="Spain">Spain</option>
															<option value="Sri Lanka">Sri Lanka</option>
															<option value="Sudan">Sudan</option>
															<option value="Suriname">Suriname</option>
															<option value="Swaziland">Swaziland</option>
															<option value="Sweden">Sweden</option>
															<option value="Switzerland">Switzerland</option>
															<option value="Syria">Syria</option>
															<option value="Tahiti">Tahiti</option>
															<option value="Taiwan">Taiwan</option>
															<option value="Tajikistan">Tajikistan</option>
															<option value="Tanzania">Tanzania</option>
															<option value="Thailand">Thailand</option>
															<option value="Togo">Togo</option>
															<option value="Tokelau">Tokelau</option>
															<option value="Tonga">Tonga</option>
															<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
															<option value="Tunisia">Tunisia</option>
															<option value="Turkey">Turkey</option>
															<option value="Turkmenistan">Turkmenistan</option>
															<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
															<option value="Tuvalu">Tuvalu</option>
															<option value="Uganda">Uganda</option>
															<option value="Ukraine">Ukraine</option>
															<option value="United Arab Erimates">United Arab Emirates</option>
															<option value="United Kingdom">United Kingdom</option>
															<option value="United States of America">United States of America</option>
															<option value="Uraguay">Uruguay</option>
															<option value="Uzbekistan">Uzbekistan</option>
															<option value="Vanuatu">Vanuatu</option>
															<option value="Vatican City State">Vatican City State</option>
															<option value="Venezuela">Venezuela</option>
															<option value="Vietnam">Vietnam</option>
															<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
															<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
															<option value="Wake Island">Wake Island</option>
															<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
															<option value="Yemen">Yemen</option>
															<option value="Zaire">Zaire</option>
															<option value="Zambia">Zambia</option>
															<option value="Zimbabwe">Zimbabwe</option> 
														</select>
													</div>
												</div>
												
												<div class="column1">
													<div class="column_inner">
														<input type='text' name='phone' id='phone' value="<?php echo $phone; ?>" class="placeholder" placeholder="Phone Number "/>
													</div>
												</div>
												
												<div class="column2">
													<div class="column_inner">
														<input type='text' name='arrival_date' id='arrival_date' value="<?php echo $arrival_date; ?>" class="requiredField date-picker" placeholder="Arrival Date *"/>
													</div>
												</div>
											 
												<div class="column1">
													<div class="column_inner">
														<input type='text' name='departure_date' id='departure_date' value="<?php echo $departure_date; ?>" class="requiredField date-picker" placeholder="Departure Date *"/>
														
													</div>
												</div>
												
												
											 
												<div class="column2">
													<div class="column_inner">
														<select name="guests" class="requiredField" id="guests">
													  <?php if(empty($guests)){ ?>
														<option value="">Number Of Guests *</option>
													  <?php } ?>
														<option value="0" <?php if($guests=="0") echo 'selected="selected"'; ?> >0</option>
														<option value="1" <?php if($guests=="1") echo 'selected="selected"'; ?> >1</option>
														<option value="2" <?php if($guests=="2") echo 'selected="selected"'; ?> >2</option>
														<option value="3" <?php if($guests=="3") echo 'selected="selected"'; ?> >3</option>
														<option value="4" <?php if($guests=="4") echo 'selected="selected"'; ?> >4</option>
														<option value="5" <?php if($guests=="5") echo 'selected="selected"'; ?> >5</option>
														<option value="6" <?php if($guests=="6") echo 'selected="selected"'; ?> >6</option>
														<option value="7" <?php if($guests=="7") echo 'selected="selected"'; ?> >7</option>
														<option value="8" <?php if($guests=="8") echo 'selected="selected"'; ?> >8</option>
														<option value="9" <?php if($guests=="9") echo 'selected="selected"'; ?> >9</option>
														<option value="10" <?php if($guests=="10") echo 'selected="selected"'; ?> >10</option>
													</select>
													</div>
												</div>
												
												<!--<div class="column1">
													<div class="column_inner">
														
														<input type='text' name='budget' id='budget' value="<?php //echo $budget; ?>" class="placeholder"placeholder="Budget"/>
													
													</div>
												</div>-->
												
												<textarea rows="10" name='msg' id='msg' placeholder="Message"><?php echo $msg; ?></textarea>
												<span class="submit_button_contact">
													<input class="qbutton contact_form_button" value="Submit Enquiry" id="submit" name="submit" type="submit">
												</span>
												<!--<input class="qbutton White program-form-btn" value="Submit" id="submit" name="submit" type="submit">-->
												<!--<div id="message" style="color:red;"></div>-->
												
											</form>	
								</div>
	
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="contact_info">
									<?php if($post_id != ""){ ?>
									<div class="projects_holder  clearfix portfolio_full_image">
											<?php	
												 
												$terms = wp_get_post_terms($post_id, 'category');
												$terms = wp_get_post_terms($post_id, 'villa_category');
												$bedrooms = get_post_meta($post_id, "bedrooms", true);
												$guests = get_post_meta($post_id, "guest", true);
												$address = get_post_meta($post_id, "address", true);
												
												$private_pool_villa = get_post_meta($post_id, "private_pool_villa", true);
												$beachfront = get_post_meta($post_id, "beachfront", true);
												$short_desc = get_post_meta($post_id, "short_text", true);
												$lowPrices = get_post_meta($post_id, "price_from", true);
												$highPrices = get_post_meta($post_id, "price_to", true);
												$rates = get_post_meta($post_id, "rates", true);
												
												$wording = get_post_meta($post_id, "wording", true);
												

											?>
						
											<article class="mix mix_all sidebar_right" style="display: inline-block;opacity: 1;">
												<div class="image_holder">
													<a class="portfolio_link_for_touch" href="<?php echo get_permalink( $post_id )?>" rel="bookmark" title="<?php echo get_the_title( $post_id ); ?>">
														<span class="image"><?php echo get_the_post_thumbnail( $post_id ); ?></span>
													</a>
													
													<span class="text_holder">
													<span class="text_outer">
													<span class="text_inner">
													<span class="feature_holder">
													<span class="feature_holder_icons">
													<p class="thumb-text villa-thumb-text"><?php echo $short_desc; ?></p>
													<a class="preview qbutton small white" href="<?php echo get_permalink ( $post_id ) ?>" target="_self">view</a>
													</span></span></span></span></span>
													
												</div>
											
											<div class="relatedcontent">
												<div class="portfolio_description "><h5 class="portfolio_title "> 
													<a href="<? echo get_permalink ( $post_id ); ?>" target="_self"><?php echo get_the_title( $post_id ); ?></a>
													</h5><?php
														if($wording != "" || $address != ""){
															$html .= '<p class="vinfo">';
															if($wording != ""){ 
																$html .= ''.$wording.' | '; 
															}
															if($address != ""){
															$html .=  $address;
															}
															$html .= '</p>';
															echo $html;
														}
													?>
													<?php if($rates != ""){ 
														echo '<p class="price-info" style="margin: 11px 0px 11px 0px !important;">'.$rates.'</p>';
													} 
													if($lowPrices != "" || $highPrices != ""){ ?>
														<p class="price-info" style="margin-bottom:0px !important;"><?php echo "$".$lowPrices ." - $". $highPrices; ?><span class="vinfo"> per night</span></p>
													<?php } ?>
													
												</div>
											</div>
											</article>
										
									
									</div>
									
									<br/>
									<?php } ?>
									<div class="sidebar-content">
										<?php the_content(); ?>
									</div>
								</div>	
							</div>
						</div>
					</div>
					<?php }  else { ?>
						<div class="contact_info">
							<?php the_content(); ?>
						</div>
					<?php } ?>
					<?php } ?>
				</div>	
		</div>	
	</div>	
		
<?php endwhile; ?>
<?php endif; ?>
<script>
	jQuery(document).ready(function($){	
		
		var datePickerUrl = '<?php bloginfo('stylesheet_directory'); ?>';
		$(".date-picker").datepicker({
			dateFormat: 'd-mm-yy',
			showOn: 'button',
			buttonImage: datePickerUrl+'/img/icon-datepicker.png' ,
			buttonImageOnly: true,
			showOn: 'both', 
			minDate: 0,
			numberOfMonths: 1

		});
		
		if (!$("#arrival_date").val()) { 
			
			$("#departure_date").attr("disabled", "disabled");
			$("#departure_date").next().css("pointer-events","none");
		}
		$("#arrival_date").change(function(){
			$("#departure_date").removeAttr("disabled", "disabled").attr("enabled", "enabled");
			$("#departure_date").next().css("pointer-events","auto");
		});
		
		$("#submit").click(function(){
		
			$('form#booking_form .contact-error').remove();
        var hasError = false;
		 $('form#booking_form .requiredField').each(function() {
            if(jQuery.trim($(this).val()) == '' || jQuery.trim($(this).val()) == jQuery.trim($(this).attr('placeholder'))){
                var labelText = $(this).prev('label').text();
                $(this).parent().append("<strong class='contact-error'><?php _e('This is a required field', 'qode'); ?></strong>");
                $(this).addClass('inputError');
                hasError = true;
            } else { //else 1 
                if($(this).hasClass('email')) { //if hasClass('email')
                    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
                    if(!emailReg.test(jQuery.trim($(this).val()))){
                        var labelText = $(this).prev('label').text();
                        $(this).parent().append("<strong class='contact-error'><?php _e('Please enter a valid email address.', 'qode'); ?></strong>");
                        $(this).addClass('inputError');
                        hasError = true;
                    } 
                } //end of if hasClass('email')

            } // end of else 1 
        }); //end of each()
		
			var name,phone,email,country,arrival_date,departure_date,stay_length,guests,budget,msg;
			var emailPattern = /\S+@\S+\.\S+/;
			var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
			name=$("#customer_name").val();
			email=$("#email").val();
			country=$("#country").val();
			phone=$("#phone").val();
			arrival_date=$("#arrival_date").val();
			departure_date=$("#departure_date").val();
			stay_length=$("#stay_length").val();
			adults=$("#adults").val();
			guests=$("#guests").val();
			infants=$("#infants").val();
			budget=$("#budget").val();
			msg=$("#msg").val();
			
			if(name=='' ){
				$("#message").show().html('Please enter your name.');
				return false;
			}else if(email=='' ){
				$("#message").show().html('Please enter your Email Address.');
				return false;
			}else if(!email.match(emailPattern)){
				$("#message").show().html('Please Enter a Valid Email.');
				return false;
			}else if(country=='' ){
				$("#message").show().html('Please Select your country.');
				return false;
			}else if(arrival_date=='' ){
				$("#message").show().html('Please Select Arrival Date.');
				return false;
			}else if(departure_date=='' ){
				$("#message").show().html('Please Select Departure Date.');
				return false;
			}else if(guests=='' ){
				$("#message").show().html('Please Select Number of guests.');
				return false;
			}
				
		});
	});
</script>	   
	
<?php get_footer(); ?>			