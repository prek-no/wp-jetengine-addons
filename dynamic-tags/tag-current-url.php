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
class Elementor_Dynamic_Tag_Current_Url extends \Elementor\Core\DynamicTags\Tag
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
        return 'current-url';
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
        return esc_html__('Current URL', 'prek-jetengine-addons');
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
        return [
            \Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY,
            \Elementor\Modules\DynamicTags\Module::URL_CATEGORY,
        ];
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
        global $wp;
        echo home_url( $wp->request );
    }
}