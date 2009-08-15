<?php

/*
Plugin Name: Send link to friend
Description: If the user thought the page link is useful to their friend, he can send the page link via this plug-in.. 
Author: Gopi.R
Version: 1.0
Plugin URI: http://gopi.coolpage.biz/demo/2009/08/14/send-link-to-friend/
Author URI: http://gopi.coolpage.biz/demo/2009/08/14/send-link-to-friend/
Donate link: http://gopi.coolpage.biz/demo/2009/08/14/send-link-to-friend/
*/

function gSendtofriend()
{
	
	$sendlinks = "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];
	$_sm = get_option('gSendtofriend_title_sm');
	?>
	<style type="text/css">
    <!--
    .gtextbox {width:150px;}
    .gtextarea {width:180px;height:50px;}
    -->
    </style>
    <form action="#" name="sendtofriendform" id="sendtofriendform">
    <?php
	if($_sm <> "")
	{
		echo "<div style='padding-top:4px;'>";
    	echo $_sm;    
    	echo "</div>";
	}
	?>
    <div style='padding-top:4px;'>
    	<span id="send-link-to-friend-result"></span>
    </div>
    <div style='padding-top:4px;'>
    	Friend Email    
    </div>
    <div>
    	<input name="txt_friendemail" class="gtextbox" type="text" id="txt_friendemail" maxlength="120">
    </div>
    <div style='padding-top:4px;'>
    	Enter your message
    </div>
    <div>
    	<textarea name="txt_friendmessage" class="gtextarea" rows="3" id="txt_friendmessage"></textarea>
    </div>
    <div style="padding-top:4px;" >
    	<input type="button" name="button" value="Send Link" onclick="javascript:get(this.parentNode,'<?php echo get_option('siteurl'); ?>/wp-content/plugins/send-link-to-friend/');">
    </div>
    	<input type="hidden" name="sendlink" id="sendlink" value="<?php echo $sendlinks; ?>"  />
	</form>
    <script language="JavaScript" src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/send-link-to-friend/send-link-to-friend.js"></script>
    <?php

}

function gSendtofriend_install() 
{

	add_option('gSendtofriend_title', "Send link to Friend");
	add_option('gSendtofriend_title_sm', "If you thought this page is useful to your friend, use this form to send.");
	add_option('gSendtofriend_fromemail', "admin@sendtofriend.com");
	add_option('gSendtofriend_On_Homepage', "YES");
	add_option('gSendtofriend_On_Posts', "YES");
	add_option('gSendtofriend_On_Pages', "YES");
	add_option('gSendtofriend_On_Archives', "NO");
	add_option('gSendtofriend_On_Search', "NO");
}

function gSendtofriend_widget($args) 
{
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
	$gSendtofriend_title = get_option('gSendtofriend_title');
	$gSendtofriend_title_sm = get_option('gSendtofriend_title_sm');
	$gSendtofriend_fromemail = get_option('gSendtofriend_fromemail');
	$gSendtofriend_On_Homepage = get_option('gSendtofriend_On_Homepage');
	$gSendtofriend_On_Posts = get_option('gSendtofriend_On_Posts');
	$gSendtofriend_On_Pages = get_option('gSendtofriend_On_Pages');
	$gSendtofriend_On_Search = get_option('gSendtofriend_On_Search');
	$gSendtofriend_On_Archives = get_option('gSendtofriend_On_Archives');
	
	if ($_POST['gSendtofriend_submit']) 
	{
		$gSendtofriend_title = stripslashes($_POST['gSendtofriend_title']);
		$gSendtofriend_title_sm = stripslashes($_POST['gSendtofriend_title_sm']);
		$gSendtofriend_fromemail = stripslashes($_POST['gSendtofriend_fromemail']);
		$gSendtofriend_On_Homepage = stripslashes($_POST['gSendtofriend_On_Homepage']);
		$gSendtofriend_On_Posts = stripslashes($_POST['gSendtofriend_On_Posts']);
		$gSendtofriend_On_Pages = stripslashes($_POST['gSendtofriend_On_Pages']);
		$gSendtofriend_On_Search = stripslashes($_POST['gSendtofriend_On_Search']);
		$gSendtofriend_On_Archives = stripslashes($_POST['gSendtofriend_On_Archives']);
		
		update_option('gSendtofriend_title', $gSendtofriend_title );
		update_option('gSendtofriend_title_sm', $gSendtofriend_title_sm );
		update_option('gSendtofriend_fromemail', $gSendtofriend_fromemail );
		update_option('gSendtofriend_On_Homepage', $gSendtofriend_On_Homepage );
		update_option('gSendtofriend_On_Posts', $gSendtofriend_On_Posts );
		update_option('gSendtofriend_On_Pages', $gSendtofriend_On_Pages );
		update_option('gSendtofriend_On_Search', $gSendtofriend_On_Search );
		update_option('gSendtofriend_On_Archives', $gSendtofriend_On_Archives );
	}
	
	echo '<p>Title:<br><input  style="width: 350px;" type="text" value="';
	echo $gSendtofriend_title . '" name="gSendtofriend_title" id="gSendtofriend_title" /></p>';
	
	echo '<p>Small description:<br><input  style="width: 350px;" type="text" value="';
	echo $gSendtofriend_title_sm . '" name="gSendtofriend_title_sm" id="gSendtofriend_title_sm" /></p>';
	
	echo '<p>From Email address:<br><input  style="width: 350px;" type="text" value="';
	echo $gSendtofriend_fromemail . '" name="gSendtofriend_fromemail" id="gSendtofriend_fromemail" /></p>';
	
	echo '<p>Display Option:(YES/NO) </p>';
	
	echo '<p>On Homepage:&nbsp;<input  style="width: 100px;" type="text" value="';
	echo $gSendtofriend_On_Homepage . '" name="gSendtofriend_On_Homepage" id="gSendtofriend_On_Homepage" />';
	echo '&nbsp;On Posts:&nbsp;&nbsp;&nbsp;<input  style="width: 100px;" type="text" value="';
	echo $gSendtofriend_On_Posts . '" name="gSendtofriend_On_Posts" id="gSendtofriend_On_Posts" /></p>';

	echo '<p>On Pages:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  style="width: 100px;" type="text" value="';
	echo $gSendtofriend_On_Pages . '" name="gSendtofriend_On_Pages" id="gSendtofriend_On_Pages" />';
	echo '&nbsp;On Search:&nbsp;<input  style="width: 100px;" type="text" value="';
	echo $gSendtofriend_On_Search . '" name="gSendtofriend_On_Search" id="gSendtofriend_On_Search" /></p>';

	echo '<p>On Archives:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  style="width: 100px;" type="text" value="';
	echo $gSendtofriend_On_Archives . '" name="gSendtofriend_On_Archives" id="gSendtofriend_On_Archives" /></p>';

	echo '<input type="hidden" id="gSendtofriend_submit" name="gSendtofriend_submit" value="1" />';
	
}

function gSendtofriend_widget_init()
{
  	register_sidebar_widget(__('Send link to friend'), 'gSendtofriend_widget');   
	
	if(function_exists('register_sidebar_widget')) 
	{
		register_sidebar_widget('Send link to friend', 'gSendtofriend_widget');
	}
	
	if(function_exists('register_widget_control')) 
	{
		register_widget_control(array('Send link to friend', 'widgets'), 'gSendtofriend_control', 400, 400);
	} 
}

function gSendtofriend_deactivation() 
{
	delete_option('gSendtofriend_title');
	delete_option('gSendtofriend_title_sm');
	delete_option('gSendtofriend_fromemail');
	delete_option('gSendtofriend_On_Homepage');
	delete_option('gSendtofriend_On_Posts');
	delete_option('gSendtofriend_On_Pages');
	delete_option('gSendtofriend_On_Archives');
	delete_option('gSendtofriend_On_Search');
}

add_action("plugins_loaded", "gSendtofriend_widget_init");
register_activation_hook(__FILE__, 'gSendtofriend_install');
register_deactivation_hook(__FILE__, 'gSendtofriend_deactivation');
add_action('init', 'gSendtofriend_widget_init');
?>