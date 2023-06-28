<?php

/**
 * Note!
 * Register macros on jet-engine/register-macros action only,
 * as the base macro class \Jet_Engine_Base_Macros is not available before that action;
 * after it - all macros are registered already
 */

add_action( 'jet-engine/register-macros', function(){
    require_once( __DIR__ . '/macros/macro-cookie.php' );

    new Macro_CookieValue();
});