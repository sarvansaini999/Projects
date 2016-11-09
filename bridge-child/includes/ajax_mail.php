<?php

require_once('recaptchalib.php');
require('../../../../wp-blog-header.php');
global $qode_options_proya;

$publickey = $qode_options_proya['recaptcha_public_key'];
$privatekey = $qode_options_proya['recaptcha_private_key'];

if ($publickey == "") $publickey = "6Ld5VOASAAAAABUGCt9ZaNuw3IF-BjUFLujP6C8L";
if ($privatekey == "") $privatekey = "6Ld5VOASAAAAAKQdKVcxZ321VM6lkhBsoT6lXe9Z";

$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

$use_captcha = $qode_options_proya['use_recaptcha'];
if ($resp->is_valid || $use_captcha == "no") {
	$email_to = $qode_options_proya['receive_mail'];
	$email_from = $qode_options_proya['email_from'];
	$subject = $qode_options_proya['email_subject'];
	$email = $_POST["email"];
	
		$body='<table width="600px">';
			$body .='<tr>';
				$body .='<td colspan="2">Thank you for contacting Ultimate Bali, we will be in touch with you very shortly.</td>';
			$body .='</tr>';
			
			$body .='<tr>';
				$body .='<td colspan="2">&nbsp;</td>';
			$body .='</tr>';
			
			
			$body .='<tr>';
				$body .='<td style="vertical-align: top;width: 160px">Name</td>';
				$body .='<td>' . $_POST["name"] . " " . $_POST["lastname"] .'</td>';
			$body .='</tr>';

			if($email !=''){
				$body .='<tr>';
					$body .='<td style="vertical-align: top;width: 160px">Email</td>';
					$body .='<td><a href="mailto:'. $_POST["email"] .'">' . $_POST["email"] .'</a></td>';
				$body .='</tr>';
			}
			if($_POST["website"] != ""){
				$body .='<tr>';
					$body .='<td style="vertical-align: top;width: 160px">Website</td>';
					$body .='<td>' . $_POST["website"] .'</a></td>';
				$body .='</tr>';
			}
			if($_POST["subject"] != ""){
				$body .='<tr>';
					$body .='<td style="vertical-align: top;width: 160px">Subject</td>';
					$body .='<td>' . $_POST["subject"] .'</a></td>';
				$body .='</tr>';
			}
			$body .='<tr>';
				$body .='<td style="vertical-align: top;width: 160px">Message</td>';
				$body .='<td>' . $_POST["message"] .'</td>';
			$body .='</tr>';
			
		$body .='</table>';
	
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: '".$_POST['name']." ".$_POST['lastname']."' <".$_POST["email"]."> " . "\r\n";
	if( @mail($email_to, $subject, $body, $headers)){
			$headers = "";
			$headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Ultimate Bali <info@ultimatebali.com>' . "\r\n";
			mail($email, $subject, $body, $headers);
		echo "success";
	}

}
else {
	die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .  "(reCAPTCHA said: " . $resp->error . ")");
}
?>