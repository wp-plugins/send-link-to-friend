<?php
/*
Plugin Name: Send link to friend
Description: If the user thought the content is useful to their friend, they can use this form to send the URL instead of copy and paste the URL into email.
Author: Gopi Ramasamy
Version: 10.8
Plugin URI: http://www.gopiplus.com/work/2010/07/18/send-link-to-friend/
Author URI: http://www.gopiplus.com/work/2010/07/18/send-link-to-friend/
Donate link: http://www.gopiplus.com/work/2010/07/18/send-link-to-friend/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

function gSendtofriend()
{
	$display = "";
	if(is_home() && get_option('gSendtofriend_On_Homepage') == 'YES') {	$display = "show";	}
	if(is_single() && get_option('gSendtofriend_On_Posts') == 'YES') {	$display = "show";	}
	if(is_page() && get_option('gSendtofriend_On_Pages') == 'YES') {	$display = "show";	}
	if(is_archive() && get_option('gSendtofriend_On_Archives') == 'YES') {	$display = "show";	}
	if(is_search() && get_option('gSendtofriend_On_Search') == 'YES') {	$display = "show";	}
	
	$url = home_url();
	if($display == "show")
	{
		$sendlinks = "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
		$_sm = get_option('gSendtofriend_title_sm');
		?>
		<form action="#" name="sendtofriendform" id="sendtofriendform">
		<?php
		if($_sm <> "")
		{
			echo "<div class='gtitle'>";
			echo $_sm;    
			echo "</div>";
		}
		?>
		<div class='gsmpage'><span id="send-link-to-friend-result"></span></div>
		<div class='gtitle'><?php _e('Friend Email', 'send-link-to-friend'); ?></div>
		<div class='gtextbox'><input name="txt_friendemail" class="gtextbox" type="text" id="txt_friendemail" maxlength="120"></div>
		<div class='gtitle'><?php _e('Enter your message', 'send-link-to-friend'); ?></div>
		<div class='gtextbox'><textarea name="txt_friendmessage" class="gtextarea" rows="3" id="txt_friendmessage"></textarea></div>
		<div class='gtitle'><input type="button" name="button" value="Send Link" onclick="javascript:get(this.parentNode,'<?php echo $url; ?>');"></div>
		<input type="hidden" name="sendlink" id="sendlink" value="<?php echo $sendlinks; ?>"  />
		</form>
		<?php
	}
}

add_shortcode( 'send-link-to-friend', 'gSendtofriend_shortcode' );

function gSendtofriend_shortcode($atts) 
{
	//[send-link-to-friend]
	
	global $wpdb;
	$gSend = "";
	$sendlinks = "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
	$_sm = get_option('gSendtofriend_title_sm');
	$pluginlink = "'" . home_url() . "'";
	
	$gSend = $gSend . '<form action="#" name="sendtofriendform" id="sendtofriendform">';
	if($_sm <> "")
	{
		$gSend = $gSend . '<div class="gtitle">'.$_sm.'</div>';
	}
	
	$gSend = $gSend . '<div class="gsmpage"><span id="send-link-to-friend-result"></span></div>';
	$gSend = $gSend . '<div class="gtitle">'.__('Friend Email', 'send-link-to-friend').'</div>';
	$gSend = $gSend . '<div class="gtextbox"><input name="txt_friendemail" class="gtextboxpage" type="text" id="txt_friendemail" maxlength="120"></div>';
	$gSend = $gSend . '<div class="gtitle">'.__('Enter your message', 'send-link-to-friend').'</div>';
	$gSend = $gSend . '<div class="gtextbox"><textarea name="txt_friendmessage" class="gtextareapage" rows="3" id="txt_friendmessage"></textarea></div>';
	$gSend = $gSend . '<div class="gtitle"><input type="button" name="button" value="Send Link" onclick="javascript:get(this.parentNode,'.$pluginlink.');"></div>';
	$gSend = $gSend . '<input type="hidden" name="sendlink" id="sendlink" value="'. $sendlinks .'"  />';
	$gSend = $gSend . '</form>';
	return $gSend;
}


function gSendtofriend_install() 
{
	$admin_email = get_option('admin_email');
	$blogname = get_option('blogname');
	if($admin_email == "")
	{
		$admin_email = "admin@sendtofriend.com";
	}
	$contant = "Hi Friend, \r\n\r\nA friend has sent you a link to ###SITENAME###\r\n\r\n###SENDLINK###\r\n\r\n###MESSAGE###\r\n\r\nThank You";
	$url = home_url();
			
	add_option('gSendtofriend_title', "Send link to Friend");
	add_option('gSendtofriend_title_sm', "If you thought this page is useful to your friend, use this form to send.");
	add_option('gSendtofriend_fromname', "Admin");
	add_option('gSendtofriend_fromemail', $admin_email);
	add_option('gSendtofriend_On_Homepage', "YES");
	add_option('gSendtofriend_On_Posts', "YES");
	add_option('gSendtofriend_On_Pages', "YES");
	add_option('gSendtofriend_On_Archives', "NO");
	add_option('gSendtofriend_On_Search', "NO");
	add_option('gSendtofriend_homeurl', $url);
	add_option('gSendtofriend_mailcontent', $contant);
	add_option('gSendtofriend_subject', "Recommended Link");
}

function gSendtofriend_widget($args) 
{
	$display = "";
	if(is_home() && get_option('gSendtofriend_On_Homepage') == 'YES') {	$display = "show";	}
	if(is_single() && get_option('gSendtofriend_On_Posts') == 'YES') {	$display = "show";	}
	if(is_page() && get_option('gSendtofriend_On_Pages') == 'YES') {	$display = "show";	}
	if(is_archive() && get_option('gSendtofriend_On_Archives') == 'YES') {	$display = "show";	}
	if(is_search() && get_option('gSendtofriend_On_Search') == 'YES') {	$display = "show";	}
	
	if($display == "show")
	{
		extract($args);
		echo $before_widget . $before_title;
		echo get_option('gSendtofriend_title');
		echo $after_title;
		gSendtofriend();
		echo $after_widget;
	}
}
	
function gSendtofriend_control() 
{
	echo '<p><b>';
	_e('Send link to friend', 'send-link-to-friend');
	echo '.</b> ';
	_e('Check official website for more information', 'send-link-to-friend');
	?> <a target="_blank" href="http://www.gopiplus.com/work/2010/07/18/send-link-to-friend/"><?php _e('click here', 'send-link-to-friend'); ?></a></p><?php
}

function gSendtofriend_widget_init()
{
	if(function_exists('wp_register_sidebar_widget')) 
	{
		wp_register_sidebar_widget( __('Send link to friend', 'send-link-to-friend'), 
				__('Send link to friend', 'send-link-to-friend'), 'gSendtofriend_widget');
	}
	
	if(function_exists('wp_register_widget_control')) 
	{
		wp_register_widget_control( __('Send link to friend', 'send-link-to-friend'), 
				array( __('Send link to friend', 'send-link-to-friend'), 'widgets'), 'gSendtofriend_control');
	} 
}

function gSendtofriend_deactivation() 
{
	// No action required.
}

function gSendtofriend_admin_options()
{
	global $wpdb;
	include_once("content-setting.php");
}

function gSendtofriend_add_to_menu() 
{
	if (is_admin()) 
	{
		add_options_page( __('Send link to friend', 'send-link-to-friend'), 
				__('Send link to friend', 'send-link-to-friend'), 'manage_options', 'send-link-to-friend', 'gSendtofriend_admin_options' );
	}
}

function gSendtofriend_add_javascript_files() 
{
	if (!is_admin())
	{
		wp_enqueue_style( 'send-link-to-friend', get_option('siteurl').'/wp-content/plugins/send-link-to-friend/style.css');
		wp_enqueue_script( 'send-link-to-friend', get_option('siteurl').'/wp-content/plugins/send-link-to-friend/send-link-to-friend.js');
	}
}

function gSendtofriend_textdomain() 
{
	  load_plugin_textdomain( 'send-link-to-friend', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

function gSendtofriend_plugin_query_vars($vars) 
{
	$vars[] = 'sendtofriend';
	return $vars;
}

function gSendtofriend_plugin_parse_request($qstring)
{
	if (array_key_exists('sendtofriend', $qstring->query_vars)) 
	{
		$page = $qstring->query_vars['sendtofriend'];
		switch($page)
		{
			case 'send-mail':				
				$txt_friendemail = $_POST['txt_friendemail'];
				if($txt_friendemail <> "")
				{
					if (!filter_var($txt_friendemail, FILTER_VALIDATE_EMAIL))
					{
						echo "invalid-email";
					}
					else
					{
						$homeurl = get_option('gSendtofriend_homeurl');
						if($homeurl == "")
						{
							$homeurl = home_url();
						}
						
						$samedomain = strpos($_SERVER['HTTP_REFERER'], $homeurl);
						if (($samedomain !== false) && $samedomain < 5) 
						{
							$gSendtofriend_fromname = get_option('gSendtofriend_fromname');
							$gSendtofriend_fromemail = get_option('gSendtofriend_fromemail');
							$gSendtofriend_subject = get_option('gSendtofriend_subject');
							if($gSendtofriend_subject == "")
							{
								$gSendtofriend_subject = "Recommended Link";
							}
							
							$headers  = "From: \"" . $gSendtofriend_fromname . "\" <$gSendtofriend_fromemail>\n";
							$headers .= "Return-Path: <" . $gSendtofriend_fromemail . ">\n";
							$headers .= "Reply-To: \"" . $gSendtofriend_fromname . "\" <" . $gSendtofriend_fromemail . ">\n";
							$headers .= "X-Mailer: PHP" . phpversion() . "\n";
							$headers .= "MIME-Version: 1.0\n";
							$headers .= "Content-Type: " . get_bloginfo('html_type') . "; charset=\"". get_bloginfo('charset') . "\"\n";
							$headers .= "Content-type: text/html\r\n";
							
							$to_email = $txt_friendemail;
							$to_sendlink = $_POST['sendlink'];
							$site_name = get_option('blogname');
							$to_message = stripslashes(get_option('gSendtofriend_mailcontent'));		
							$to_friendmessage = stripslashes($_POST['txt_friendmessage']);
							$to_message = str_replace("###SITENAME###", $site_name, $to_message);
							$to_message = str_replace("###SENDLINK###", $to_sendlink, $to_message);
							$to_message = str_replace("###MESSAGE###", $to_friendmessage, $to_message);
							$to_message = str_replace("\r\n", "<br />", $to_message);
							
							@wp_mail($to_email, $gSendtofriend_subject, $to_message, $headers);
							echo "mail-sent-successfully";
						}
						else
						{
							echo "there-was-problem";
						}
					}
				}
				else
				{
					echo "empty-email";
				}
				die();
				break;		
		}
	}
}

add_action('parse_request', 'gSendtofriend_plugin_parse_request');
add_filter('query_vars', 'gSendtofriend_plugin_query_vars');
add_action('plugins_loaded', 'gSendtofriend_textdomain');
add_action('wp_enqueue_scripts', 'gSendtofriend_add_javascript_files');
add_action('admin_menu', 'gSendtofriend_add_to_menu');
add_action("plugins_loaded", "gSendtofriend_widget_init");
register_activation_hook(__FILE__, 'gSendtofriend_install');
register_deactivation_hook(__FILE__, 'gSendtofriend_deactivation');
add_action('init', 'gSendtofriend_widget_init');
?>