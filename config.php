
<?php
$logoutredirecturl = (isset($config->logoutredirecturl) && !empty($config->logoutredirecturl)) ? $config->logoutredirecturl : '';
$loginredirecturl = (isset($config->loginredirecturl) && !empty($config->loginredirecturl)) ? $config->loginredirecturl : '';
?>

<table cellspacing="0" cellpadding="5" border="0">

<tr valign="top">
    <td align="right"><label for="loginredirecturl"><?php print_string('auth_atloginoutredirect_loginredirecturl_lbl', 'auth_atloginoutredirect') ?></label></td>
    <td><input id="loginredirecturl" name="loginredirecturl" type="url" size="30" placeholder="e.g. http://mywpsite.com" value="<?php echo $loginredirecturl ?>" /></td>
    <td><i><?php print_string('auth_atloginoutredirect_loginredirecturl_desc', 'auth_atloginoutredirect') ?></i></td>
</tr>

<tr valign="top">
    <td align="right"><label for="logoutredirecturl"><?php print_string('auth_atloginoutredirect_logoutredirecturl_lbl', 'auth_atloginoutredirect') ?></label></td>
    <td><input id="logoutredirecturl" name="logoutredirecturl" type="url" size="30" placeholder="e.g. http://redirecttothis.com" value="<?php echo $logoutredirecturl ?>" /></td>
    <td><i><?php print_string('auth_atloginoutredirect_logoutredirecturl_desc', 'auth_atloginoutredirect') ?></i></td>
</tr>

</table>
