<?php

if (!defined('MOODLE_INTERNAL')) {
	exit('This is not the way to call me!');
}

require_once $CFG->libdir.'/authlib.php';

class auth_plugin_atloginoutredirect extends auth_plugin_base
{
    
    public function __construct()
    {
        $this->authtype = 'atloginoutredirect';
        $this->config = get_config('auth/atloginoutredirect');
    }

    function user_authenticated_hook(&$user, $username, $password)
    {
        global $CFG;

        // Login Redirect URL is not set or valid.
        if (!filter_var($this->config->loginredirecturl, FILTER_VALIDATE_URL)) {
            return true;
        }

        //Custom security nonce.
        $GLOBALS['_atActionsNonce'] = date('Y/m/d'); 

        $SESSION->wantsurl = $CFG->wwwroot . '/auth/atloginoutredirect/atActions.php/?atAction=loginRedirect&atLoginRedirectUrl='.urlencode($this->config->loginredirecturl);
        
        return true;
    }

    public function logoutpage_hook()
    {
        global $redirect;
        
        // Redirect URL is a valid URL.
        if (filter_var($this->config->logoutredirecturl, FILTER_VALIDATE_URL)) {
            $redirect = $this->config->logoutredirecturl;
        }
    }
    
    public function config_form($config, $err, $user_fields)
    {
        include 'config.php';
    }

    public function process_config($config)
    {
        $logoutredirecturl = (isset($config->logoutredirecturl) && !empty($config->logoutredirecturl)) ? $config->logoutredirecturl : '';
        $loginredirecturl = (isset($config->loginredirecturl) && !empty($config->loginredirecturl)) ? $config->loginredirecturl : '';

        set_config('sharedsecret', $sharedsecret, 'auth/atloginoutredirect');
        set_config('logoutredirecturl', $logoutredirecturl, 'auth/atloginoutredirect');
        set_config('loginredirecturl', $loginredirecturl, 'auth/atloginoutredirect');

        return true;
    }
}
