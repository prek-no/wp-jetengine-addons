<?php
/**
 * Plugin Name: Prek - JetEngine Addons
 * Description: Macros, dynamic tags and other addons for JetEngine.
 * Plugin URI:  https://prek.no
 * Version:     1.0.4
 * Author:      Prek AS
 * Author URI:  https://prek.no
 * Text Domain: prek-jetengine-addons
 *
 * GitHub Plugin URI: prek-no/wp-jetengine-addons
 * GitHub Plugin URI: https://github.com/prek-no/wp-jetengine-addons
 *
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

require_once __DIR__ . '/dynamic-tags.php';
require_once __DIR__ . '/macros.php';

