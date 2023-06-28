<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Dynamic Tag - Cookie
 *
 * Elementor dynamic tag that returns a cookie.
 *
 * @since 1.0.0
 */
class Elementor_Dynamic_Tag_Cookie extends \Elementor\Core\DynamicTags\Tag
{
    /**
     * Get dynamic tag name.
     *
     * Retrieve the name of the cookie tag.
     *
     * @return string Dynamic tag name.
     * @since 1.0.0
     * @access public
     */
    public function get_name()
    {
        return 'cookie';
    }

    /**
     * Get dynamic tag title.
     *
     * Returns the title of the cookie tag.
     *
     * @return string Dynamic tag title.
     * @since 1.0.0
     * @access public
     */
    public function get_title()
    {
        return esc_html__('Cookie', 'prek-jetengine-addons');
    }

    /**
     * Get dynamic tag groups.
     *
     * Retrieve the list of groups the cookie tag belongs to.
     *
     * @return array Dynamic tag groups.
     * @since 1.0.0
     * @access public
     */
    public function get_group()
    {
        return ['prek'];
    }

    /**
     * Get dynamic tag categories.
     *
     * Retrieve the list of categories the cookie tag belongs to.
     *
     * @return array Dynamic tag categories.
     * @since 1.0.0
     * @access public
     */
    public function get_categories()
    {
        return [\Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY];
    }

    /**
     * Register dynamic tag controls.
     *
     * Add input fields to allow the user to customize the cookie tag settings.
     *
     * @return void
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->add_control(
            'cookie_name',
            [
                'label' => esc_html__('Cookie Name', 'prek-jetengine-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control('cookie_is_json',
            [
                'label' => esc_html__('JSON Object?', 'prek-jetengine-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'textdomain'),
                'label_off' => esc_html__('No', 'textdomain'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control('cookie_path',
            [
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
        );
    }

    /**
     * Render tag output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @return void
     * @since 1.0.0
     * @access public
     */
    public function render()
    {
        $name = $this->get_settings('cookie_name');
        $isJson = $this->get_settings('cookie_is_json') === 'yes';
        $path = $this->get_settings('cookie_path');

        if (!isset($_COOKIE[$name]) || empty($_COOKIE[$name])) {
            echo 'No cookie found';
            return;
        }

        if ($isJson) {
            echo $this->readArray(json_decode(stripslashes($_COOKIE[$name]), true), $path);
            return;
        }

        echo esc_html($_COOKIE[ $name ]);
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