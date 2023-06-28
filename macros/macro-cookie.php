<?php

class Macro_CookieValue extends \Jet_Engine_Base_Macros {

    /**
     * Macros tag - this macro will look like %current_user_prop|ID% if typed manually
     */
    public function macros_tag() {
        return 'cookie_value';
    }

    /**
     * Macros name in UI
     */
    public function macros_name() {
        return 'Cookie value';
    }

    /**
     * Macros arguments - see this https://developers.elementor.com/docs/controls/regular-control/ for reference
     * An empty array may be returned if the macro has no arguments
     */
    public function macros_args() {
        return array(
            'cookie_name'    => array(
                'label'   => 'Cookie name',
                'type'    => 'text',
                'default' => '',
            ),
        );
    }

    /**
     * Macros callback - gets existing cookie value
     */
    public function macros_callback( $args = array() ) {
        $cookieName = ! empty( $args['cookie_name'] ) ? $args['cookie_name'] : null;

        if (!empty($_COOKIE[$cookieName])) {
            return esc_html($_COOKIE[$cookieName]);
        }

        return '';
    }
}