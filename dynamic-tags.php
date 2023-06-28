<?php
/**
 * Register Dynamic Tahs
 *
 * @param \Elementor\Core\DynamicTags\Manager $dynamic_tags_manager Elementor dynamic tags manager.
 *
 * @return void
 * @since 1.0.0
 */

add_action( 'elementor/dynamic_tags/register', function ( $dynamic_tags_manager ) {
    require_once( __DIR__ . '/dynamic-tags/tag-cookie.php' );

    $dynamic_tags_manager->register( new \Elementor_Dynamic_Tag_Cookie() );
} );