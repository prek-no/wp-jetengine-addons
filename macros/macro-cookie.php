<?php

class Macro_CookieValue extends Jet_Engine_Base_Macros {

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
        return [
            'cookie_name'    => [
                'label'   => 'Cookie name',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            ],
            'cookie_is_json'    => [
                'label' => esc_html__('JSON Object?', 'prek-jetengine-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'textdomain'),
                'label_off' => esc_html__('No', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'no',
            ],
            'cookie_path' => [
                'label' => esc_html__('Cookie Path', 'prek-jetengine-addons'),
                'description' => esc_html__('You can use dot notation. E.g: user.email', 'prek-jetengine-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'cookie_is_json' => 'yes',
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        ];
    }

    /**
     * Macros callback - gets existing cookie value
     */
    public function macros_callback( $args = []) {
        $name = !empty( $args['cookie_name'] ) ? $args['cookie_name'] : null;
        $isJson = (!empty($args['cookie_is_json']) && $args['cookie_is_json'] === 'yes');
        $path = !empty($args['cookie_path']) ? $args['cookie_path'] : null;

        if (!isset($_COOKIE[$name]) || empty($_COOKIE[$name])) {
            return '';
        }

        if ($isJson) {
            return $this->readArray(json_decode(stripslashes($_COOKIE[$name]), true), $path);
        }

        return esc_html($_COOKIE[ $name ]);
    }

    // Create a function for reading a multi-dimensional array using dot notation
    public function readArray($array, $path)
    {
        $path = explode('.', $path);
        $current = $array;
        foreach ($path as $key) {
            if (isset($current[$key])) {
                $current = $current[$key];
            } else {
                return null;
            }
        }
        return $current;
    }
}