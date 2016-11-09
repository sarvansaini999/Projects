 <?php
/*
Template Name: Program-Booking
*/ 


    wp_enqueue_style( 'ui-datepicker', get_stylesheet_directory_uri() . './css/jquery-ui-1.8.9.custom.css');
 
?>
		<?php
	$message='';
	$name='';
	$error=false;
if (!empty($_POST)) {
	
	$email='';
	$country='';
	$phone='';
	$arrival_date='';
	$departure_date='';
	$night='';
	$adults='';
	$guests='';
	$infants='';
	$occasions='';
	$about_us='';
	$msg='';
	
	
	
	
	
	if(isset($_POST['post_title']) && $_POST['post_title'] !=''){
		$post_title=$_POST['post_title'];
	}else{
		$error=true;
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
	}else{
		$error=true;
	}


	if(isset($_POST['arrival_date']) && $_POST['arrival_date'] !=''){
		$arrival_date=$_POST['arrival_date'];
	}else{
		$error=true;
	}

	if(isset($_POST['departure_date']) && $_POST['departure_date'] !=''){
		$departure_date=$_POST['departure_date'];
	}else{
		$error=true;
	}
	
	if(isset($_POST['stay']) && $_POST['stay'] !=''){
		$stay=$_POST['stay'];
	}else{
		$error=true;
	}


	if(isset($_POST['adults']) && $_POST['adults'] !=''){
		$adults=$_POST['adults'];
	}else{
		$error=true;
	}

	if(isset($_POST['guests']) && $_POST['guests'] !=''){
		$guests=$_POST['guests'];
	}else{
		$error=true;
	}
	
	if(isset($_POST['infants']) && $_POST['infants'] !=''){
		$infants=$_POST['infants'];
	}else{
		$error=true;
	}


	if(isset($_POST['occasions']) && $_POST['occasions'] !=''){
		$occasions=$_POST['occasions'];
	}else{
		$error=true;
	}

	if(isset($_POST['about_us']) && $_POST['about_us'] !=''){
		$about_us=$_POST['about_us'];
	}else{
		$error=true;
	}
	
	if(isset($_POST['msg']) && $_POST['msg'] !=''){
		$msg=$_POST['msg'];
	}else{
		$error=true;
	}

	
	if($error ==false){
		$body='<table width="600px">';
			$body .='<tr>';
				$body .='<td colspan="2">Booking form filled on Ultimat Bali website. Please find details below.</td>';
			$body .='</tr>';

			$body .='<tr>';
				$body .='<td colspan="2">&nbsp;</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Retreat Program Name</td>';
				$body .='<td>' . $post_title .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Name</td>';
				$body .='<td>' . $name .'</td>';
			$body .='</tr>';

			
			if($email !=''){
				$body .='<tr>';
					$body .='<td>Email</td>';
					$body .='<td>' . $email .'</td>';
				$body .='</tr>';
			}
			
			$body .='<tr>';
				$body .='<td>Country</td>';
				$body .='<td>' . $country .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Phone</td>';
				$body .='<td>' . $phone .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Arrival Date</td>';
				$body .='<td>' . $arrival_date .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Departure Date</td>';
				$body .='<td>' . $departure_date .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Night</td>';
				$body .='<td>' . $stay .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Adults</td>';
				$body .='<td>' . $adults .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>guests</td>';
				$body .='<td>' . $guests .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Infants</td>';
				$body .='<td>' . $infants .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Occasions</td>';
				$body .='<td>' . $occasions .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>About Us</td>';
				$body .='<td>' . $about_us .'</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td>Message</td>';
				$body .='<td>' . $msg .'</td>';
			$body .='</tr>';
			
		$body .='</table>';


		
		$to='rammigill@hotmail.com';
		$subject='Booking form filled at Ultimate Bali website';


		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'To: Rammi Gill <' . $to.'>' . "\r\n";
		$headers .= 'From: ultimatebali.com <info@ultimatebali.com>' . "\r\n";
		$headers .= 'Cc: info@ultimatebali.com' . "\r\n";
		
		mail($to, $subject, $body, $headers);	
		
	}
	
	
	if($error==false){
		$message='Thanks for contacting us, we will get back to you soon';
	}else{
		$message='Please fill in all fields.';
	}	

	

}

?>
<?php
global $wp_query;
$id = $wp_query->get_queried_object_id();
get_header();

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
$home_url = home_url( '/' );
?>
	
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
			
		<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
			<script>
			var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
			</script>
		<?php } ?>
		
	<div class="title_outer title_without_animation" data-height="220">
		<div class="title title_size_small  position_left" style="height:325px;background-color:#F6F6F6;">
			<div class="image not_responsive"></div>
			<div class="title_holder retreat-title-holder" style="padding-top:134px;height:225px !important;background:url('<?php echo get_stylesheet_directory_uri(). '/img/retreats-h1.jpg'; ?>');">
				<div class="container">
					<div class="container_inner clearfix">
						<div class="title_subtitle_holder">
							<div class="title_subtitle_holder_inner">
								<h1><span class="breadcrumb_title">Programme Booking <?php //post_type_archive_title(); ?></span></h1>
								<div class="breadcrumb"> <div class="breadcrumbs"><div class="breadcrumbs_inner"><!--<a href="<?php //echo home_url(); ?>">Home</a><span class="delimiter">&nbsp;&gt;&nbsp;</span><span class="current"><?php //post_type_archive_title(); ?></span>--></div></div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
		
		<div class="container"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
		<div class="container_inner<?php echo $container_class; ?> default_template_holder clearfix">
				<div class="contact_detail">
					<?php if($show_section == "yes") { ?>
						<div class="contact_section<?php echo $map_form_section_position_class; ?>">
							<h2><?php if(isset( $qode_options_proya['contact_section_above_form_title']) && $qode_options_proya['contact_section_above_form_title'] != "") { 
							echo $qode_options_proya['contact_section_above_form_title'];  } else { ?><?php _e('Ultimate Bali - Program Booking Inquiry - ', 'qode'); ?><?php echo $_GET['title']; ?><?php } ?></h2>
							<div class="separator small <?php echo $map_form_section_position; ?>"></div>
							<h4><?php if(isset( $qode_options_proya['contact_section_above_form_subtitle']) && $qode_options_proya['contact_section_above_form_subtitle'] != "") { 
							echo $qode_options_proya['contact_section_above_form_subtitle'];  } else { ?><?php _e('', 'qode'); ?><?php } ?></h4>
						</div>
					<?php } ?>
					
					<div class="two_columns_75_25 clearfix grid2">
						<div class="column1">
							<div class="column_inner">
								<div class="contact_form">
									
									<form id="booking_form" action="" method="POST">
											
												
												<div class="vc_col-sm-3"><label for='program_name' >Venue Name: </label></div>
												<div class="vc_col-sm-9"><strong><?php echo $venue_title = $_GET['venue_title']; ?></strong></div><br/><br/>
												
												<div class="vc_col-sm-3"><label for='program_name' >Programme Name: </label></div>
												  
													<div class="vc_col-sm-9"><strong><?php echo $title = $_GET['title']; ?></strong></div><br/><br/>
													<input type="hidden" name="post_title" value="<?php echo $title; ?>"/>
											   <div class="vc_col-sm-3"><label for='customer_name' >Your Full Name <span class="requeired">*</span></label></div>
												<div class="vc_col-sm-9"><input type='text' name='customer_name' id='customer_name' value="<?php echo $name; ?>" size="50" /></div>
											 
												<div class="vc_col-sm-3"><label for='email' >Email Address <span class="requeired">*</span></label></div>
												<div class="vc_col-sm-9"><input type='text' name='email' id='email' value="<?php echo $email; ?>" size="50" /></div>
												
												<div class="vc_col-sm-3"><label for='country' >Country <span class="requeired">*</span></label></div>
												<div class="vc_col-sm-9"><select name='country' id='country'>
													<option value="">-Select-</option>
													<option value="AF">Afghanistan</option>
													<option value="AX">Åland Islands</option>
													<option value="AL">Albania</option>
													<option value="DZ">Algeria</option>
													<option value="AS">American Samoa</option>
													<option value="AD">Andorra</option>
													<option value="AO">Angola</option>
													<option value="AI">Anguilla</option>
													<option value="AQ">Antarctica</option>
													<option value="AG">Antigua and Barbuda</option>
													<option value="AR">Argentina</option>
													<option value="AM">Armenia</option>
													<option value="AW">Aruba</option>
													<option value="AU">Australia</option>
													<option value="AT">Austria</option>
													<option value="AZ">Azerbaijan</option>
													<option value="BS">Bahamas</option>
													<option value="BH">Bahrain</option>
													<option value="BD">Bangladesh</option>
													<option value="BB">Barbados</option>
													<option value="BY">Belarus</option>
													<option value="BE">Belgium</option>
													<option value="BZ">Belize</option>
													<option value="BJ">Benin</option>
													<option value="BM">Bermuda</option>
													<option value="BT">Bhutan</option>
													<option value="BO">Bolivia, Plurinational State of</option>
													<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
													<option value="BA">Bosnia and Herzegovina</option>
													<option value="BW">Botswana</option>
													<option value="BV">Bouvet Island</option>
													<option value="BR">Brazil</option>
													<option value="IO">British Indian Ocean Territory</option>
													<option value="BN">Brunei Darussalam</option>
													<option value="BG">Bulgaria</option>
													<option value="BF">Burkina Faso</option>
													<option value="BI">Burundi</option>
													<option value="KH">Cambodia</option>
													<option value="CM">Cameroon</option>
													<option value="CA">Canada</option>
													<option value="CV">Cape Verde</option>
													<option value="KY">Cayman Islands</option>
													<option value="CF">Central African Republic</option>
													<option value="TD">Chad</option>
													<option value="CL">Chile</option>
													<option value="CN">China</option>
													<option value="CX">Christmas Island</option>
													<option value="CC">Cocos (Keeling) Islands</option>
													<option value="CO">Colombia</option>
													<option value="KM">Comoros</option>
													<option value="CG">Congo</option>
													<option value="CD">Congo, the Democratic Republic of the</option>
													<option value="CK">Cook Islands</option>
													<option value="CR">Costa Rica</option>
													<option value="CI">Côte d'Ivoire</option>
													<option value="HR">Croatia</option>
													<option value="CU">Cuba</option>
													<option value="CW">Curaçao</option>
													<option value="CY">Cyprus</option>
													<option value="CZ">Czech Republic</option>
													<option value="DK">Denmark</option>
													<option value="DJ">Djibouti</option>
													<option value="DM">Dominica</option>
													<option value="DO">Dominican Republic</option>
													<option value="EC">Ecuador</option>
													<option value="EG">Egypt</option>
													<option value="SV">El Salvador</option>
													<option value="GQ">Equatorial Guinea</option>
													<option value="ER">Eritrea</option>
													<option value="EE">Estonia</option>
													<option value="ET">Ethiopia</option>
													<option value="FK">Falkland Islands (Malvinas)</option>
													<option value="FO">Faroe Islands</option>
													<option value="FJ">Fiji</option>
													<option value="FI">Finland</option>
													<option value="FR">France</option>
													<option value="GF">French Guiana</option>
													<option value="PF">French Polynesia</option>
													<option value="TF">French Southern Territories</option>
													<option value="GA">Gabon</option>
													<option value="GM">Gambia</option>
													<option value="GE">Georgia</option>
													<option value="DE">Germany</option>
													<option value="GH">Ghana</option>
													<option value="GI">Gibraltar</option>
													<option value="GR">Greece</option>
													<option value="GL">Greenland</option>
													<option value="GD">Grenada</option>
													<option value="GP">Guadeloupe</option>
													<option value="GU">Guam</option>
													<option value="GT">Guatemala</option>
													<option value="GG">Guernsey</option>
													<option value="GN">Guinea</option>
													<option value="GW">Guinea-Bissau</option>
													<option value="GY">Guyana</option>
													<option value="HT">Haiti</option>
													<option value="HM">Heard Island and McDonald Islands</option>
													<option value="VA">Holy See (Vatican City State)</option>
													<option value="HN">Honduras</option>
													<option value="HK">Hong Kong</option>
													<option value="HU">Hungary</option>
													<option value="IS">Iceland</option>
													<option value="IN">India</option>
													<option value="ID">Indonesia</option>
													<option value="IR">Iran, Islamic Republic of</option>
													<option value="IQ">Iraq</option>
													<option value="IE">Ireland</option>
													<option value="IM">Isle of Man</option>
													<option value="IL">Israel</option>
													<option value="IT">Italy</option>
													<option value="JM">Jamaica</option>
													<option value="JP">Japan</option>
													<option value="JE">Jersey</option>
													<option value="JO">Jordan</option>
													<option value="KZ">Kazakhstan</option>
													<option value="KE">Kenya</option>
													<option value="KI">Kiribati</option>
													<option value="KP">Korea, Democratic People's Republic of</option>
													<option value="KR">Korea, Republic of</option>
													<option value="KW">Kuwait</option>
													<option value="KG">Kyrgyzstan</option>
													<option value="LA">Lao People's Democratic Republic</option>
													<option value="LV">Latvia</option>
													<option value="LB">Lebanon</option>
													<option value="LS">Lesotho</option>
													<option value="LR">Liberia</option>
													<option value="LY">Libya</option>
													<option value="LI">Liechtenstein</option>
													<option value="LT">Lithuania</option>
													<option value="LU">Luxembourg</option>
													<option value="MO">Macao</option>
													<option value="MK">Macedonia, the former Yugoslav Republic of</option>
													<option value="MG">Madagascar</option>
													<option value="MW">Malawi</option>
													<option value="MY">Malaysia</option>
													<option value="MV">Maldives</option>
													<option value="ML">Mali</option>
													<option value="MT">Malta</option>
													<option value="MH">Marshall Islands</option>
													<option value="MQ">Martinique</option>
													<option value="MR">Mauritania</option>
													<option value="MU">Mauritius</option>
													<option value="YT">Mayotte</option>
													<option value="MX">Mexico</option>
													<option value="FM">Micronesia, Federated States of</option>
													<option value="MD">Moldova, Republic of</option>
													<option value="MC">Monaco</option>
													<option value="MN">Mongolia</option>
													<option value="ME">Montenegro</option>
													<option value="MS">Montserrat</option>
													<option value="MA">Morocco</option>
													<option value="MZ">Mozambique</option>
													<option value="MM">Myanmar</option>
													<option value="NA">Namibia</option>
													<option value="NR">Nauru</option>
													<option value="NP">Nepal</option>
													<option value="NL">Netherlands</option>
													<option value="NC">New Caledonia</option>
													<option value="NZ">New Zealand</option>
													<option value="NI">Nicaragua</option>
													<option value="NE">Niger</option>
													<option value="NG">Nigeria</option>
													<option value="NU">Niue</option>
													<option value="NF">Norfolk Island</option>
													<option value="MP">Northern Mariana Islands</option>
													<option value="NO">Norway</option>
													<option value="OM">Oman</option>
													<option value="PK">Pakistan</option>
													<option value="PW">Palau</option>
													<option value="PS">Palestinian Territory, Occupied</option>
													<option value="PA">Panama</option>
													<option value="PG">Papua New Guinea</option>
													<option value="PY">Paraguay</option>
													<option value="PE">Peru</option>
													<option value="PH">Philippines</option>
													<option value="PN">Pitcairn</option>
													<option value="PL">Poland</option>
													<option value="PT">Portugal</option>
													<option value="PR">Puerto Rico</option>
													<option value="QA">Qatar</option>
													<option value="RE">Réunion</option>
													<option value="RO">Romania</option>
													<option value="RU">Russian Federation</option>
													<option value="RW">Rwanda</option>
													<option value="BL">Saint Barthélemy</option>
													<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
													<option value="KN">Saint Kitts and Nevis</option>
													<option value="LC">Saint Lucia</option>
													<option value="MF">Saint Martin (French part)</option>
													<option value="PM">Saint Pierre and Miquelon</option>
													<option value="VC">Saint Vincent and the Grenadines</option>
													<option value="WS">Samoa</option>
													<option value="SM">San Marino</option>
													<option value="ST">Sao Tome and Principe</option>
													<option value="SA">Saudi Arabia</option>
													<option value="SN">Senegal</option>
													<option value="RS">Serbia</option>
													<option value="SC">Seychelles</option>
													<option value="SL">Sierra Leone</option>
													<option value="SG">Singapore</option>
													<option value="SX">Sint Maarten (Dutch part)</option>
													<option value="SK">Slovakia</option>
													<option value="SI">Slovenia</option>
													<option value="SB">Solomon Islands</option>
													<option value="SO">Somalia</option>
													<option value="ZA">South Africa</option>
													<option value="GS">South Georgia and the South Sandwich Islands</option>
													<option value="SS">South Sudan</option>
													<option value="ES">Spain</option>
													<option value="LK">Sri Lanka</option>
													<option value="SD">Sudan</option>
													<option value="SR">Suriname</option>
													<option value="SJ">Svalbard and Jan Mayen</option>
													<option value="SZ">Swaziland</option>
													<option value="SE">Sweden</option>
													<option value="CH">Switzerland</option>
													<option value="SY">Syrian Arab Republic</option>
													<option value="TW">Taiwan, Province of China</option>
													<option value="TJ">Tajikistan</option>
													<option value="TZ">Tanzania, United Republic of</option>
													<option value="TH">Thailand</option>
													<option value="TL">Timor-Leste</option>
													<option value="TG">Togo</option>
													<option value="TK">Tokelau</option>
													<option value="TO">Tonga</option>
													<option value="TT">Trinidad and Tobago</option>
													<option value="TN">Tunisia</option>
													<option value="TR">Turkey</option>
													<option value="TM">Turkmenistan</option>
													<option value="TC">Turks and Caicos Islands</option>
													<option value="TV">Tuvalu</option>
													<option value="UG">Uganda</option>
													<option value="UA">Ukraine</option>
													<option value="AE">United Arab Emirates</option>
													<option value="GB">United Kingdom</option>
													<option value="US">United States</option>
													<option value="UM">United States Minor Outlying Islands</option>
													<option value="UY">Uruguay</option>
													<option value="UZ">Uzbekistan</option>
													<option value="VU">Vanuatu</option>
													<option value="VE">Venezuela, Bolivarian Republic of</option>
													<option value="VN">Viet Nam</option>
													<option value="VG">Virgin Islands, British</option>
													<option value="VI">Virgin Islands, U.S.</option>
													<option value="WF">Wallis and Futuna</option>
													<option value="EH">Western Sahara</option>
													<option value="YE">Yemen</option>
													<option value="ZM">Zambia</option>
													<option value="ZW">Zimbabwe</option>
												</select></div>
												
												<div class="vc_col-sm-3"><label for='phone' >Phone Number <span class="requeired">*</span></label></div>
												<div class="vc_col-sm-9"><input type='text' name='phone' id='phone' value="<?php echo $phone; ?>" size="50" /></div>
												
												<div class="vc_col-sm-3"><label for='arrival_date' >Arrival Date <span class="requeired">*</span></label></div>
												<div class="vc_col-sm-9"><input type='text' name='arrival_date' id='arrival_date' value="<?php echo $arrival_date; ?>" size="50" class="date-picker"/></div>
												
												<div class="vc_col-sm-3"><label for='departure_date' >Departure Date <span class="requeired">*</span></label></div>
												<div class="vc_col-sm-9"><input type='text' name='departure_date' id='departure_date' value="<?php echo $departure_date; ?>" size="50"  class="date-picker"/></div>
												
												
												
												
												<div class="vc_col-sm-3"><label for='stay' >Length of Stay <span class="requeired">*</span></label></div>
													<div class="vc_col-sm-9"><select name="stay" id="stay">
													  <?php if(empty($stay)){ ?>
														<option value="">-Select-</option>
													  <?php } ?>
														<option value="1" <?php if($stay=="1") echo 'selected="selected"'; ?> >1</option>
														<option value="2" <?php if($stay=="2") echo 'selected="selected"'; ?> >2</option>
														<option value="3" <?php if($stay=="3") echo 'selected="selected"'; ?> >3</option>
														<option value="4" <?php if($stay=="4") echo 'selected="selected"'; ?> >4</option>
														<option value="5" <?php if($stay=="5") echo 'selected="selected"'; ?> >5</option>
														<option value="6" <?php if($stay=="6") echo 'selected="selected"'; ?> >6</option>
														<option value="7" <?php if($stay=="7") echo 'selected="selected"'; ?> >7</option>
														<option value="8" <?php if($stay=="8") echo 'selected="selected"'; ?> >8</option>
														<option value="9" <?php if($stay=="9") echo 'selected="selected"'; ?> >9</option>
														<option value="10" <?php if($stay=="10") echo 'selected="selected"'; ?> >10</option>
													</select></div>
												<div class="vc_col-sm-3"><label for='guests' >Number Of Guests <span class="requeired">*</span></label></div>
													<div class="vc_col-sm-9"><select name="guests" id="guests">
													  <?php if(empty($guests)){ ?>
														<option value="">-Select-</option>
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
												<div class="vc_col-sm-3"><label for='about_us' >How do you know about us? <span class="requeired">*</span></label></div>
													<div class="vc_col-sm-9"><select name="about_us" id="about_us">
													  <?php if(empty($about_us)){ ?>
														<option value="">-Select-</option>
													  <?php } ?>
														<option value="referral" <?php if($about_us=="referral") echo 'selected="selected"'; ?> >Referral</option>
														<option value="search_engine" <?php if($about_us=="search_engine") echo 'selected="selected"'; ?> >Search Engine</option>
														<option value="media" <?php if($about_us=="media") echo 'selected="selected"'; ?> >Media</option>
														<option value="agent" <?php if($about_us=="agent") echo 'selected="selected"'; ?> >Agent</option>
														<option value="others" <?php if($about_us=="others") echo 'selected="selected"'; ?> >Others</option>
													</select>
												</div>
												
												<div class="vc_col-sm-3"><label for='msg' >Message <span class="requeired">*</span></label></div>
												<div class="vc_col-sm-9"><textarea rows="4" cols="50" name='msg' id='msg'><?php echo $msg; ?></textarea></div>
												
												<input class="qbutton White program-form-btn" value="Submit" id="submit" name="submit" type="submit">
												<div id="message" style="color:red;">
													<?php if(isset($message) && $message !=''){ echo $message;} ?>
												</div>
											</form>	
								</div>
									
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="contact_info">
									<div id="sidebar-custom" class="portfolio_detail <?php echo $portfolio_text_follow; ?>">
							
							
										<div class="inquire-sidebar">
												<form action="<?php echo $home_url ?>contact/" method="POST">
													
													<input type="submit" class="qbutton" value="Ask a Question">
												</form>
										</div>
										
										<div class="call-sidebar"><span>Speak to a Specialist: +555 786 67 987</span></div>
										<div class="portfolio_social_holder">
											
											<img src="<?php echo $home_url ?>wp-content/themes/bridge-child/img/el_prod_share.gif" alt="" />
											<a href="https://www.facebook.com" title="Share this" target=" _blank"><span class="social"><i class="fa fa-facebook"></i></span></a>
											<a href="https://twitter.com/" title="Tweet this" target=" _blank"><span class="social"><i class="fa fa-twitter"></i></span></a>
											<a href="https://accounts.google.com/" title="Share this" target=" _blank"><span class="social"><i class="fa fa-google-plus"></i></span></a>
											<a href="https://in.pinterest.com/login/" title="Pin this" target=" _blank"><span class="social"><i class="fa fa-pinterest"></i></span></a>
											
										</div>
										
									</div>
								</div>
	
							</div>
						</div>
					</div>
					
				</div>	
		</div>	
	</div>	
		
<?php endwhile; ?>
<?php endif; ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery-ui-1.8.9.custom.css">

<?php get_footer(); ?>			
<script>
	jQuery(document).ready(function($){	
		
		var datePickerUrl = '<?php bloginfo('stylesheet_directory'); ?>';
		$(".date-picker").datepicker({
			dateFormat: 'yy-m-d',
			showOn: 'button',
			buttonImage: datePickerUrl+'/img/icon-datepicker.png' ,
			buttonImageOnly: true,
			 
			numberOfMonths: 1

		});
		
		
	
		$("#submit").click(function(){
			var name,phone,email,country,arrival_date,departure_date,stay,adults,guests,infants,about_us,msg;
			var emailPattern = /\S+@\S+\.\S+/;
			var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
			name=$("#customer_name").val();
			email=$("#email").val();
			country=$("#country").val();
			phone=$("#phone").val();
			arrival_date=$("#arrival_date").val();
			departure_date=$("#departure_date").val();
			stay=$("#stay").val();
			adults=$("#adults").val();
			guests=$("#guests").val();
			infants=$("#infants").val();
			about_us=$("#about_us").val();
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
			}else if(phone=='' ){
				$("#message").show().html('Please enter your phone number.');
				return false;
			} else if(!phone.match(phoneno)){
				$("#message").show().html('Phone Number should be only 10 Digit');
				return false;
			}else if(arrival_date=='' ){
				$("#message").show().html('Please Select Arrival Date.');
				return false;
			}else if(departure_date=='' ){
				$("#message").show().html('Please Select Departure Date.');
				return false;
			}else if(stay==''){
				$("#message").show().html('Please Select Number of stay.');
				return false;
			}else if(adults=='' ){
				$("#message").show().html('Please Select Number of Adults.');
				return false;
			}else if(guests=='' ){
				$("#message").show().html('Please Select Number of guests.');
				return false;
			} else if(infants==''){
				$("#message").show().html('Phone Select Number of Infants');
				return false;
			}else if(about_us=='' ){
				$("#message").show().html('Please Select About Us.');
				return false;
			}else if(msg=='' ){
				$("#message").show().html('Please enter your Message.');
				return false;
			} 
				
		});
	});
</script>						
									
			
			


