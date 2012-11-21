<p><?php echo __('Use this page to set up the connection details for your LDAP or Active Directory server. It is highly recommended that you read the online help before use, as misconfiguration may prevent you from accessing configuration pages to rectify issues.'); ?></p>
<p><b><?php echo link_tag('http://issues.thebuggenie.com/wiki/Category%3ATheBugGenie%3AUserGuide%3AModules%3ALDAP', __('View the online documentation')); ?></b></p>

<div class="rounded_box yellow" style="margin-top: 5px">
	<div class="header">Your security key: <?php echo $module->getSetting('sharedkey'); ?></div>
	<p>please bla bla</p>

</div>
<form accept-charset="<?php echo TBGContext::getI18n()->getCharset(); ?>" action="<?php echo make_url('configure_module', array('config_module' => $module->getName())); ?>" enctype="multipart/form-data" method="post">
	<div class="rounded_box borderless mediumgrey<?php if ($access_level == TBGSettings::ACCESS_FULL): ?> cut_bottom<?php endif; ?>" style="margin: 10px 0 0 0; width: 700px;<?php if ($access_level == TBGSettings::ACCESS_FULL): ?> border-bottom: 0;<?php endif; ?>">
		<div class="header"><?php echo __('Connection details'); ?></div>
		<table style="width: 680px;" class="padded_table" cellpadding=0 cellspacing=0 id="sso_settings_table">
			<tr>
				<td style="padding: 5px;"><label for="remoteloginurl">Remote Login URL</label></td>
				<td><input type="text" name="remoteloginurl" id="remoteloginurl" value="<?php echo $module->getSetting('remoteloginurl'); ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td class="config_explanation" colspan="2">the URL which will be called when users attempt to login. The remote page should handle the authentication and return the Email Address and Name of the user after validation.</td>
			</tr>
			<tr>
				<td style="padding: 5px;"><label for="remotelogouturl">Remote logout URL</label></td>
				<td><input type="text" name="remotelogouturl" id="remotelogouturl" value="<?php echo $module->getSetting('remotelogouturl'); ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td class="config_explanation" colspan="2">the URL to which users need to be redirected after they log out.</td>
			</tr>
			
		</table>
	</div>
<?php if ($access_level == TBGSettings::ACCESS_FULL): ?>
	<div class="rounded_box iceblue borderless cut_top" style="margin: 0 0 5px 0; width: 700px; border-top: 0; padding: 8px 5px 2px 5px; height: 25px;">
		<div style="float: left; font-size: 13px; padding-top: 2px;"><?php echo __('Click "%save%" to save the settings', array('%save%' => __('Save'))); ?></div>
		<input type="submit" id="submit_settings_button" style="float: right; padding: 0 10px 0 10px; font-size: 14px; font-weight: bold;" value="<?php echo __('Save'); ?>">
	</div>
<?php endif; ?>
</form>

<form accept-charset="<?php echo TBGContext::getI18n()->getCharset(); ?>" action="<?php echo make_url('sso_test'); ?>" method="post">
	<div class="rounded_box borderless mediumgrey cut_bottom" style="margin: 10px 0 0 0; width: 700px; padding: 5px;">
		<div class="header"><?php echo __('Test connection'); ?></div>
		<div class="content"><?php echo __('After configuring and saving your connection settings, you should test your connection to the LDAP server. This test does not check whether the DN and attributes can allow The Bug Genie to correctly find users, but it will give an indication if The Bug Genie can talk to your LDAP server, and if any groups you specify exist.'); ?></div>
	</div>
	<div class="rounded_box iceblue borderless cut_top" style="margin: 0 0 5px 0; width: 700px; border-top: 0; padding: 8px 5px 2px 5px; height: 25px;">
		<input type="submit" id="test_button" style="float: right; padding: 0 10px 0 10px; font-size: 13px; font-weight: bold;" value="<?php echo __('Test connection'); ?>">
	</div>
</form>

<form accept-charset="<?php echo TBGContext::getI18n()->getCharset(); ?>" action="<?php echo make_url('sso_import'); ?>" method="post">
	<div class="rounded_box borderless mediumgrey cut_bottom" style="margin: 10px 0 0 0; width: 700px; padding: 5px;">
		<div class="header"><?php echo __('Import all users'); ?></div>
		<div class="content"><?php echo __('You can import all users who can log in from LDAP into The Bug Genie with this tool. This will not let them log in without switching to LDAP Authentication. We recomemnd you do this before switching over, and make at least one of the new users an administrator. Already existing users with the same username will be updated.'); ?></div>
	</div>
	<div class="rounded_box iceblue borderless cut_top" style="margin: 0 0 5px 0; width: 700px; border-top: 0; padding: 8px 5px 2px 5px; height: 25px;">
		<input type="submit" id="import_button" style="float: right; padding: 0 10px 0 10px; font-size: 13px; font-weight: bold;" value="<?php echo __('Import users'); ?>">
	</div>
</form>

<form accept-charset="<?php echo TBGContext::getI18n()->getCharset(); ?>" action="<?php echo make_url('sso_prune'); ?>" method="post">
	<div class="rounded_box borderless mediumgrey cut_bottom" style="margin: 10px 0 0 0; width: 700px; padding: 5px;">
		<div class="header"><?php echo __('Prune users'); ?></div>
		<div class="content"><?php echo __('To remove the data from The Bug Genie of users who can no longer log in via LDAP, run this tool. These users would not be able to log in anyway, but it will keep your user list clean. The guest user is not affected, but it may affect your current user - if this is deleted you will be logged out.'); ?></div>
	</div>
	<div class="rounded_box red borderless cut_top" style="margin: 0 0 5px 0; width: 700px; border-top: 0; padding: 8px 5px 2px 5px; height: 25px;">
		<input type="submit" id="prune_button" style="float: right; padding: 0 10px 0 10px; font-size: 13px; font-weight: bold;" value="<?php echo __('Prune users'); ?>">
	</div>
</form>