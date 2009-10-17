<div class="wrap">
  <h2><?php echo wp_specialchars( 'Send link to friend' ); ?></h2>
  <?php
global $wpdb, $wp_version;

include_once("extra.php");
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
	$gSendtofriend_title = stripslashes(trim($_POST['gSendtofriend_title']));
	$gSendtofriend_title_sm = stripslashes(trim($_POST['gSendtofriend_title_sm']));
	$gSendtofriend_fromemail = stripslashes(trim($_POST['gSendtofriend_fromemail']));
	$gSendtofriend_On_Homepage = stripslashes(trim($_POST['gSendtofriend_On_Homepage']));
	$gSendtofriend_On_Posts = stripslashes(trim($_POST['gSendtofriend_On_Posts']));
	$gSendtofriend_On_Pages = stripslashes(trim($_POST['gSendtofriend_On_Pages']));
	$gSendtofriend_On_Search = stripslashes(trim($_POST['gSendtofriend_On_Search']));
	$gSendtofriend_On_Archives = stripslashes(trim($_POST['gSendtofriend_On_Archives']));
	
	update_option('gSendtofriend_title', $gSendtofriend_title );
	update_option('gSendtofriend_title_sm', $gSendtofriend_title_sm );
	update_option('gSendtofriend_fromemail', $gSendtofriend_fromemail );
	update_option('gSendtofriend_On_Homepage', $gSendtofriend_On_Homepage );
	update_option('gSendtofriend_On_Posts', $gSendtofriend_On_Posts );
	update_option('gSendtofriend_On_Pages', $gSendtofriend_On_Pages );
	update_option('gSendtofriend_On_Search', $gSendtofriend_On_Search );
	update_option('gSendtofriend_On_Archives', $gSendtofriend_On_Archives );
}

echo '<table width="100%" border="0" cellspacing="5" cellpadding="0">';
echo '<tr>';
echo '<td align="left">';
echo '<form name="form_gSendtofriend" method="post" action="">';
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
echo '<input type="submit" id="gSendtofriend_submit" name="gSendtofriend_submit" lang="publish" class="button-primary" value="Update Setting" value="1" />';
echo '</form>';
echo '</td>';
echo '<td align="center">';
if (function_exists (timepass)) timepass();
echo '</td>';
echo '</tr>';
echo '</table>';

?>
  <h2><?php echo wp_specialchars( 'Paste the below code to your desired template location!' ); ?></h2>
  <div style="padding-top:7px;padding-bottom:7px;"> <code style="padding:7px;"> &lt;?php if (function_exists (gSendtofriend)) gSendtofriend(); ?&gt; </code></div>
  <br />
  <div align="left" style="padding-top:10px;padding-bottom:5px;"> 
  	<a href="options-general.php?page=send-link-to-friend/setting.php">Setting Page</a> 
  </div>
  <br>
  Plug-in created by <a target="_blank" href='http://gopi.coolpage.biz/demo/about/'>Gopi</a>.<br>
  <a target="_blank" href='http://gopi.coolpage.biz/demo/2009/08/14/send-link-to-friend/'>click here</a> to post suggestion or comments or how to improve this plugin.<br>
  <a target="_blank" href='http://gopi.coolpage.biz/demo/2009/08/14/send-link-to-friend/'>click here</a> to see my plugin demo.<br>
  <a target="_blank" href='http://gopi.coolpage.biz/demo/2009/08/14/send-link-to-friend/'>click here</a> To download my other plugins.<br>
  Clicking the above ad will not affect the site, to remove the ad simply remove this "timepass()" function from page!!<br>
  <br>
</div>
