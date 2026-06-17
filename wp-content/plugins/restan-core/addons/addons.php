<?php

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

/**
 * Main restan Core Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class restan_Extention
{

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance()
	{

		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct()
	{
		add_action('plugins_loaded', [$this, 'init']);
	}


	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init()
	{

		// Check if Elementor installed and activated
		if (!did_action('elementor/loaded')) {
			add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);
			return;
		}

		// Check for required Elementor version
		if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);
			return;
		}

		// Check for required PHP version
		if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
			add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);
			return;
		}

		// Add Plugin actions
		add_action('elementor/widgets/register', [$this, 'init_widgets']);

		// Register widget scripts
		add_action('elementor/frontend/after_enqueue_scripts', [$this, 'widget_scripts']);

		// Register Widget Styles
		add_action('elementor/frontend/after_enqueue_styles', [$this, 'enqueue_widget_styles']);
		add_action('elementor/editor/before_enqueue_scripts', [$this, 'enqueue_widget_styles']);


		// category register
		add_action('elementor/elements/categories_registered', [$this, 'restan_elementor_widget_categories']);
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin()
	{

		if (isset($_GET['activate'])) unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'restan'),
			'<strong>' . esc_html__('restan Core', 'restan') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'restan') . '</strong>'
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version()
	{

		if (isset($_GET['activate'])) unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'restan'),
			'<strong>' . esc_html__('restan Core', 'restan') . '</strong>',
			'<strong>' . esc_html__('Elementor', 'restan') . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version()
	{

		if (isset($_GET['activate'])) unset($_GET['activate']);

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'restan'),
			'<strong>' . esc_html__('restan Core', 'restan') . '</strong>',
			'<strong>' . esc_html__('PHP', 'restan') . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
	}

	/**
	 * Register Widget Styles
	 *
	 * Register custom styles required to run Saasland Core.
	 *
	 * @since 1.7.0
	 * @since 1.7.1 The method moved to this class.
	 *
	 * @access public
	 */

	public function enqueue_widget_styles()
	{
		wp_enqueue_style('restan-flaticons', RESTAN_PLUGDIRURI . 'assets/fonts/flaticon-set.css');
	}



	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets()
	{

		require_once(RESTAN_ADDONS . '/widgets/restan-slider.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-partner.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-about.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-gallery.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-team.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-openhours.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-category.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-testimonial.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-food-menu.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-food-menu-tab.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-reservation.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-blog.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-team-details.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-feature.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-offer.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-choose-us.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-funfact.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-contact-form.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-shop.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-big-deal.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-download-app.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-copyright.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-service.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-deliverya-process.php');

		require_once(RESTAN_ADDONS . '/widgets/restan-footer-top.php');
		require_once(RESTAN_ADDONS . '/footer-widgets/restan-footer-about.php');
		require_once(RESTAN_ADDONS . '/footer-widgets/restan-footer-navmenu.php');
		require_once(RESTAN_ADDONS . '/footer-widgets/restan-footer-contact.php');
		require_once(RESTAN_ADDONS . '/footer-widgets/restan-newsletter.php');

		require_once(RESTAN_ADDONS . '/widgets/restan-header.php');
		require_once(RESTAN_ADDONS . '/widgets/restan-megamenu.php');

		// Register widget

		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Slider_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Partner_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_About_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Gallery_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Team_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Open_Hours_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Category_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Testomonial_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Food_Menu_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Food_Menu_Tab_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Reservation_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Blog_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Team_Deatils_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Feature_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Offer_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Funfactor_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Footer_About_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Footer_Navmenu_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Footer_Contact_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Footer_Newsletter_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Header_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Contact_Form_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Contact_Form_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Contact_Form_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Choose_Us_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Shop_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Big_Deal_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Download_App_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Copyright_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Service_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Footer_Top_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor_Restan_Delivery_Process_Widget());
		\Elementor\Plugin::instance()->widgets_manager->register(new \Megamenu_Widget());

		
	}

	public function widget_scripts()
	{
		wp_enqueue_script(
			'restan-frontend-script',
			RESTAN_PLUGDIRURI . 'assets/js/restan-frontend.js',
			array('jquery'),
			false,
			true
		);
	}


	function restan_elementor_widget_categories($elements_manager)
	{
		$elements_manager->add_category(
			'restan_elements',
			[
				'title' => __('restan', 'restan'),
				'icon' 	=> 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'restan_footer_elements',
			[
				'title' => __('restan Footer Elements', 'restan'),
				'icon' 	=> 'fa fa-plug',
			]
		);

		$elements_manager->add_category(
			'restan_header_elements',
			[
				'title' => __('restan Header Elements', 'restan'),
				'icon' 	=> 'fa fa-plug',
			]
		);

		$elements_manager->add_category(
			'restan_service_elements',
			[
				'title' => __('restan Service Elements', 'restan'),
				'icon' 	=> 'fa fa-plug',
			]
		);
	}
}

restan_Extention::instance();
