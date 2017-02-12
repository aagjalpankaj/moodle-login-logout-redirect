<?php

require '../../config.php';

global $CFG, $USER, $SESSION, $DB;

// Safely redirect to root.
function atRedirectToRoot()
{
    if(isset($GLOBALS['_atActionsNonce'])) {
        unset($GLOBALS['_atActionsNonce']);
    };

    $SESSION->wantsurl = $CFG->wwwroot;
    redirect($SESSION->wantsurl);
}

// 
if (!isset($GLOBALS['_atActionsNonce']) || $GLOBALS['_atActionsNonce'] !== date('Y/m/d')) {
    // This is not the way to call this script.
    atRedirectToRoot();
}

//
if (isset($_GET['atAction']) && $_GET['atAction'] === 'loginRedirect') {
    if (!isloggedin()) {
        atRedirectToRoot();
    }

    if (!isset($_GET['atLoginRedirectUrl']) || !filter_var($_GET['atLoginRedirectUrl'], FILTER_VALIDATE_URL)) {
        atRedirectToRoot();
    }

    //All checks are passed.
    redirect($_GET['atLoginRedirectUrl']);
}

atRedirectToRoot();
