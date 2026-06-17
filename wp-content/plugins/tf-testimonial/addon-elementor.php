<?php
/*
Plugin Name: TF Testimonial Addon For Elementor
Description: The theme's components
Author: Themesflat
Author URI: https://codecanyon.net/user/themesflat
Version: 1.0.1
Text Domain: tf-addon-for-elementer
Domain Path: /languages
License: GNU General Public License v3.0
*/

if (!defined('ABSPATH'))
    exit;

final class TFTestimonial_Addon_Elementor {

    const VERSION = '1.0.1';
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION = '5.2';

    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );

        if (!defined('URL_THEMESFLAT_ADDONS_ELEMENTOR')) {
            define('URL_THEMESFLAT_ADDONS_ELEMENTOR', plugins_url('/', __FILE__));
        }
        
        add_action( 'elementor/frontend/after_register_styles', [ $this, 'widget_styles' ] , 100 );
        add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ], 100 );
    }

    public function i18n() {
        load_plugin_textdomain( 'tf-addon-for-elementer', false, basename( dirname( __FILE__ ) ) . '/languages' );
    }

    public function init() {
        // Check if Elementor installed and activated        
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'tf_admin_notice_missing_main_plugin' ] );
            return;
        }

        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        // Add Plugin actions
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
        add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );

        add_action( 'elementor/elements/categories_registered', function () {
            $elementsManager = \Elementor\Plugin::instance()->elements_manager;
            $elementsManager->add_category(
                'themesflat_addons',
                array(
                  'title' => 'THEMESFLAT ADDONS',
                  'icon'  => 'fonts',
            ));
        });
    }    

    public function tf_admin_notice_missing_main_plugin() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'tf-addon-for-elementer' ),
            '<strong>' . esc_html__( 'TF Testimonial Addon For Elementor', 'tf-addon-for-elementer' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'tf-addon-for-elementer' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    public function admin_notice_minimum_elementor_version() {
        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'tf-addon-for-elementer' ),
            '<strong>' . esc_html__( 'TF Testimonial Addon For Elementor', 'tf-addon-for-elementer' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'tf-addon-for-elementer' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'tf-addon-for-elementer' ),
            '<strong>' . esc_html__( 'TF Testimonial Addon For Elementor', 'tf-addon-for-elementer' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'tf-addon-for-elementer' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    public function init_widgets() {
        require_once( __DIR__ . '/widgets/widget-testimonial-carousel.php' );
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \TFTestimonialCarousel_Widget() );
    }

    public function init_controls() {}    

    public function widget_styles() {
        wp_register_style('font-awesome', ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/font-awesome.min.css', __FILE__);
        wp_register_style('regular', ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/regular.min.css', __FILE__);
        wp_register_style( 'owl-carousel', plugins_url( '/assets/css/owl.carousel.css', __FILE__ ) );
        wp_register_style( 'tf-testimonial-style', plugins_url( '/assets/css/tf-testimonial-style.css', __FILE__ ) );       
    }

    public function widget_scripts() {
        wp_register_script( 'owl-carousel', plugins_url( '/assets/js/owl.carousel.min.js', __FILE__ ), [ 'jquery' ], false, true );
        wp_register_script( 'tf-testimonial-main', plugins_url( '/assets/js/tf-testimonial-main.js', __FILE__ ), [ 'jquery' ], false, true );
    }

}
TFTestimonial_Addon_Elementor::instance();