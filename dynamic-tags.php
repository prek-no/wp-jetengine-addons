<?php
/**
 * Register Dynamic Tahs
 *
 * @param \Elementor\Core\DynamicTags\Manager $dynamic_tags_manager Elementor dynamic tags manager.
 *
 * @return void
 * @since 1.0.0
 */

function prek_dynamic_tag_group($dynamic_tags): void
{
    $dynamic_tags->register_group('prek', [
        'title' => esc_html__('Prek Addons', 'prek-jetengine-addons')
    ]);
}

add_action('elementor/dynamic_tags/register_tags', 'prek_dynamic_tag_group');

add_action('elementor/dynamic_tags/register', function ($dynamic_tags_manager) {
    require_once(__DIR__ . '/dynamic-tags/tag-cookie.php');
    require_once(__DIR__ . '/dynamic-tags/tag-current-url.php');
    require_once(__DIR__ . '/dynamic-tags/repeater/tag-text.php');
    require_once(__DIR__ . '/dynamic-tags/repeater/tag-gallery.php');
    require_once(__DIR__ . '/dynamic-tags/repeater/tag-image.php');

    $dynamic_tags_manager->register(new Prek_Dynamic_Tag_Cookie());
    $dynamic_tags_manager->register(new Prek_Dynamic_Tag_Current_Url());
    $dynamic_tags_manager->register(new Prek_Dynamic_Tag_Jet_Engine_Repeater_Text());
    $dynamic_tags_manager->register(new Prek_Dynamic_Tag_Jet_Engine_Repeater_Gallery());
    $dynamic_tags_manager->register(new Prek_Dynamic_Tag_Jet_Engine_Repeater_Image());

});