<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<div class="wrap">
  <div class="form-wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post"><br>
    </div>
    <h2><?php _e('Send link to friend', 'send-link-to-friend'); ?></h2>	
    <?php
	$gSendtofriend_title = get_option('gSendtofriend_title');
	$gSendtofriend_title_sm = get_option('gSendtofriend_title_sm');
	$gSendtofriend_fromname = get_option('gSendtofriend_fromname');
	$gSendtofriend_fromemail = get_option('gSendtofriend_fromemail');
	$gSendtofriend_On_Homepage = get_option('gSendtofriend_On_Homepage');
	$gSendtofriend_On_Posts = get_option('gSendtofriend_On_Posts');
	$gSendtofriend_On_Pages = get_option('gSendtofriend_On_Pages');
	$gSendtofriend_On_Search = get_option('gSendtofriend_On_Search');
	$gSendtofriend_On_Archives = get_option('gSendtofriend_On_Archives');
	
	if (isset($_POST['gSendtofriend_form_submit']) && $_POST['gSendtofriend_form_submit'] == 'yes')
	{
		//	Just security thingy that wordpress offers us
		check_admin_referer('gSendtofriend_form_setting');
	
		$gSendtofriend_title = stripslashes(trim($_POST['gSendtofriend_title']));
		$gSendtofriend_title_sm = stripslashes(trim($_POST['gSendtofriend_title_sm']));
		$gSendtofriend_fromname = stripslashes(trim($_POST['gSendtofriend_fromname']));
		$gSendtofriend_fromemail = stripslashes(trim($_POST['gSendtofriend_fromemail']));
		$gSendtofriend_On_Homepage = stripslashes(trim($_POST['gSendtofriend_On_Homepage']));
		$gSendtofriend_On_Posts = stripslashes(trim($_POST['gSendtofriend_On_Posts']));
		$gSendtofriend_On_Pages = stripslashes(trim($_POST['gSendtofriend_On_Pages']));
		//$gSendtofriend_On_Search = stripslashes(trim($_POST['gSendtofriend_On_Search']));
		//$gSendtofriend_On_Archives = stripslashes(trim($_POST['gSendtofriend_On_Archives']));
		
		update_option('gSendtofriend_title', $gSendtofriend_title );
		update_option('gSendtofriend_title_sm', $gSendtofriend_title_sm );
		update_option('gSendtofriend_fromname', $gSendtofriend_fromname );
		update_option('gSendtofriend_fromemail', $gSendtofriend_fromemail );
		update_option('gSendtofriend_On_Homepage', $gSendtofriend_On_Homepage );
		update_option('gSendtofriend_On_Posts', $gSendtofriend_On_Posts );
		update_option('gSendtofriend_On_Pages', $gSendtofriend_On_Pages );
		//update_option('gSendtofriend_On_Search', $gSendtofriend_On_Search );
		//update_option('gSendtofriend_On_Archives', $gSendtofriend_On_Archives );
		
		?>
		<div class="updated fade">
			<p><strong><?php _e('Details successfully updated.', 'send-link-to-friend'); ?></strong></p>
		</div>
		<?php
	}
	?>
	 <form name="cas_form" method="post" action="">
		<h3><?php _e('Plugin setting', 'send-link-to-friend'); ?></h3>
		
		<label for="tag-width"><?php _e('Widget title', 'send-link-to-friend'); ?></label>
		<input name="gSendtofriend_title" type="text" value="<?php echo $gSendtofriend_title; ?>"  id="gSendtofriend_title" size="50" maxlength="100">
		<p><?php _e('Please enter your widget title.', 'send-link-to-friend'); ?></p>
		
		<label for="tag-width"><?php _e('Small description', 'send-link-to-friend'); ?></label>
		<input name="gSendtofriend_title_sm" type="text" value="<?php echo $gSendtofriend_title_sm; ?>"  id="gSendtofriend_title_sm" size="100" maxlength="500">
		<p><?php _e('Please enter your small description.', 'send-link-to-friend'); ?></p>
		
		<label for="tag-width"><?php _e('From email name', 'send-link-to-friend'); ?></label>
		<input name="gSendtofriend_fromname" type="text" value="<?php echo $gSendtofriend_fromname; ?>"  id="gSendtofriend_fromname" size="50" maxlength="500">
		<p><?php _e('Please enter your email from name.', 'send-link-to-friend'); ?></p>
		
		<label for="tag-width"><?php _e('From email address', 'send-link-to-friend'); ?></label>
		<input name="gSendtofriend_fromemail" type="text" value="<?php echo $gSendtofriend_fromemail; ?>"  id="gSendtofriend_fromemail" size="50" maxlength="500">
		<p><?php _e('Please enter your from email address.', 'send-link-to-friend'); ?></p>
		
		<h3><?php _e('Display option', 'send-link-to-friend'); ?></h3>
		
		<label for="tag-width"><?php _e('Display on home page', 'send-link-to-friend'); ?></label>
		<select name="gSendtofriend_On_Homepage" id="gSendtofriend_On_Homepage">
			<option value='YES' <?php if($gSendtofriend_On_Homepage == 'YES') { echo "selected='selected'" ; } ?>>Yes</option>
			<option value='NO' <?php if($gSendtofriend_On_Homepage == 'NO') { echo "selected='selected'" ; } ?>>No</option>
		</select>
		<p><?php _e('Do you want to show this widget in home page?', 'send-link-to-friend'); ?></p>
		
	    <label for="tag-width"><?php _e('Display on posts', 'send-link-to-friend'); ?></label>
		<select name="gSendtofriend_On_Posts" id="gSendtofriend_On_Posts">
			<option value='YES' <?php if($gSendtofriend_On_Posts == 'YES') { echo "selected='selected'" ; } ?>>Yes</option>
			<option value='NO' <?php if($gSendtofriend_On_Posts == 'NO') { echo "selected='selected'" ; } ?>>No</option>
		</select>
		<p><?php _e('Do you want to show this widget in all posts?', 'send-link-to-friend'); ?></p>
		
		<label for="tag-width"><?php _e('Display on pages', 'send-link-to-friend'); ?></label>
		<select name="gSendtofriend_On_Pages" id="gSendtofriend_On_Pages">
			<option value='YES' <?php if($gSendtofriend_On_Pages == 'YES') { echo "selected='selected'" ; } ?>>Yes</option>
			<option value='NO' <?php if($gSendtofriend_On_Pages == 'NO') { echo "selected='selected'" ; } ?>>No</option>
		</select>
		<p><?php _e('Do you want to show this widget in all pages?', 'send-link-to-friend'); ?></p>
		
		<p class="submit">
		<input type="hidden" name="gSendtofriend_form_submit" value="yes"/>
		<input name="gSendtofriend_submit" id="gSendtofriend_submit" class="button" value="<?php _e('Submit', 'send-link-to-friend'); ?>" type="submit" />&nbsp;
		<a class="button" target="_blank" href="http://www.gopiplus.com/work/2010/07/18/send-link-to-friend/"><?php _e('Help', 'send-link-to-friend'); ?></a>
		</p>
		<?php wp_nonce_field('gSendtofriend_form_setting'); ?>
    </form>
	 </div>
  <p class="description"><?php _e('Check official website for more information', 'send-link-to-friend'); ?> 
  <a target="_blank" href="http://www.gopiplus.com/work/2010/07/18/send-link-to-friend/"><?php _e('click here', 'send-link-to-friend'); ?></a></p>
</div>