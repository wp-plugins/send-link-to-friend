<?php
	session_start();
	
	$gSendtofriend_abspath = dirname(__FILE__);
	$gSendtofriend_abspath_1 = str_replace('wp-content/plugins/send-link-to-friend', '', $gSendtofriend_abspath);
	$gSendtofriend_abspath_1 = str_replace('wp-content\plugins\send-link-to-friend', '', $gSendtofriend_abspath_1);
	
	require_once($gSendtofriend_abspath_1 .'wp-config.php');
	
	$gSendtofriend_fromemail = get_option('gSendtofriend_fromemail');
	$txt_captcha = $_POST['txt_captcha'];
	
	if( $_SESSION['sendlinktofriend_code'] == mysql_real_escape_string(trim($txt_captcha)) && !empty($_SESSION['sendlinktofriend_code'] ) ) 
	{
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= "From: $gSendtofriend_fromemail";
		$to_email = $_POST['txt_friendemail'];
		$site_name = get_option('blogname');
		$to_message = "A friend has sent you a link to ". $site_name . ".<br><br>";
		$to_message = $to_message . $_POST['sendlink'];
		$to_message = $to_message ."<br><br>";
		$to_message = $to_message . mysql_real_escape_string($_POST['txt_friendmessage']);
		$to_message = $to_message ."<br><br>";
		$to_message = $to_message ."Thanks";
		$to_message = $to_message ."<br>";
		$to_message = $to_message . $site_name;
		if($to_email <> "")	
		{
			@wp_mail($to_email, "Recommended Link", $to_message, $headers);
			//unset($_SESSION['sendlinktofriend_code']);
			echo "Mail sent successfully.";
		}
		else
		{
			echo "There was a problem with the request.";
		}
	}
	else 
	{
		echo "Invalid security code.";
	}
?>