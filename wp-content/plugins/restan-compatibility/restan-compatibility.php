<?php
/**
 * Plugin Name: Restan Compatibility Layer
 * Plugin URI: https://localhost
 * Description: Compatibility layer for the Restan theme.
 * Version: 1.0.1
 * Author: Max Sole
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit;
}

/*
|--------------------------------------------------------------------------
| Feature Flags
|--------------------------------------------------------------------------
*/

define('RESTAN_DEBUG', true);

define('RESTAN_FIX_URLS', true);

define('RESTAN_FIX_LOGO', false);

define('RESTAN_FIX_SWIPER', false);

define('RESTAN_FIX_BACKGROUNDS', false);

define('RESTAN_FIX_ELEMENTOR', false);



function restan_log($message)
{
    if (!RESTAN_DEBUG) {
        return;
    }

    ?>
    <script>
    console.log("[Restan Compatibility] <?php echo esc_js($message); ?>");
    </script>
    <?php
}


add_action('wp_footer', function () {

    restan_log("Plugin Loaded");

    if (class_exists('Elementor\Plugin')) {

        restan_log("Elementor detected");

    } else {

        restan_log("Elementor NOT detected");

    }

    if (wp_get_theme()->get('Name')) {

        restan_log("Theme: " . wp_get_theme()->get('Name'));

    }

});


add_action('wp_enqueue_scripts', function () {

    wp_enqueue_script(
        'restan-utilities',
        plugin_dir_url(__FILE__) . 'assets/js/utilities.js',
        array(),
        '1.0.1',
        true
    );

    wp_enqueue_script(
        'restan-compatibility',
        plugin_dir_url(__FILE__) . 'assets/js/compatibility.js',
        array(),
        '1.0.1',
        true
    );

    wp_enqueue_script(
        'restan-image-repair',
        plugin_dir_url(__FILE__) . 'assets/js/modules/image-repair.js',
        array('restan-compatibility'),
        '1.0.1',
        true
    );

    wp_enqueue_script(
        'restan-logo-repair',
        plugin_dir_url(__FILE__) . 'assets/js/modules/logo-repair.js',
        array(
            'restan-compatibility',
            'restan-image-repair'
        ),
        '1.0.1',
        true
    );

    wp_enqueue_script(
        'restan-breadcrumb-repair',
        plugin_dir_url(__FILE__) . 'assets/js/modules/breadcrumb-repair.js',
        array(
            //'restan-utilities',
            'restan-compatibility',
            'restan-image-repair'
        ),
        '1.0.1',
        true
    );

    wp_enqueue_script(
        'restan-mobile-menu-repair',
        plugin_dir_url(__FILE__) . 'assets/js/modules/mobile-menu-repair.js',
        array('jquery'),
        '1.0.1',
        true
    );

    wp_enqueue_script(
        'restan-logo-over-menu-repair',
        plugin_dir_url(__FILE__) .
        'assets/js/modules/logo-over-menu-repair.js',
        array(),
        '1.0.1',
        true
    );

});