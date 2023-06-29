<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Dynamic Tag - Server Variable
 *
 * Elementor dynamic tag that returns a server variable.
 *
 * @since 1.1.0
 */
class Prek_Dynamic_Tag_Jet_Engine_Repeater_Image extends \Elementor\Core\DynamicTags\Tag
{

    /**
     * Get dynamic tag name.
     *
     * Retrieve the name of the tag.
     *
     * @return string Dynamic tag name.
     * @since 1.1.0
     * @access public
     */
    public function get_name()
    {
        return 'prek-repeater-value-image';
    }

    /**
     * Get dynamic tag title.
     *
     * Returns the title of the tag.
     *
     * @return string Dynamic tag title.
     * @since 1.1.0
     * @access public
     */
    public function get_title()
    {
        return esc_html__('Repeater Field (Image, Media)', 'prek-jetengine-addons');
    }

    /**
     * Get dynamic tag groups.
     *
     * Retrieve the list of groups the tag belongs to.
     *
     * @return array Dynamic tag groups.
     * @since 1.1.0
     * @access public
     */
    public function get_group()
    {
        return ['prek'];
    }

    /**
     * Get dynamic tag categories.
     *
     * Retrieve the list of categories the tag belongs to.
     *
     * @return array Dynamic tag categories.
     * @since 1.1.0
     * @access public
     */
    public function get_categories()
    {
        return [
            \Elementor\Modules\DynamicTags\Module::IMAGE_CATEGORY,
            \Elementor\Modules\DynamicTags\Module::MEDIA_CATEGORY,
        ];
    }

    /**
     * Register dynamic tag controls.
     *
     * Add input fields to allow the user to customize the tag settings.
     *
     * @return void
     * @since 1.1.0
     * @access protected
     */
    protected function register_controls()
    {
        $this->add_control(
            'repeater_key',
            [
                'type' => \Elementor\Controls_Manager::TEXT,
                'label' => esc_html__('Repeater Key', 'prek-jetengine-addons'),
            ]
        );
    }

    /**
     * Return the value
     *
     * @return void
     * @since 1.1.0
     * @access public
     */
    public function get_value(array $options = [])
    {
        $field = $this->get_settings('repeater_key');

        if (!$field) {
            return;
        }

        if ($field) {
            $value = jet_engine()->listings->data->get_meta($field);
        }

        if (empty($value)) {
            return;
        }

        // wp_die("<pre>" . print_r(Jet_Engine_Tools::get_attachment_image_data_array( $value ),true) . "</pre>");
        return Jet_Engine_Tools::get_attachment_image_data_array($value);
    }

}