<?php

// Blocking direct access to
if (!defined('ABSPATH')) {
   exit();
}

/**
 * Plugin Name: Restan Core
 * Description: This is a helper plugin of restan theme
 * Version:     1.0
 * Author:      Validthemes
 * Author URI:  https://themeforest.net/user/validthemes/portfolio
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: restan-core
 */

// Define Constant
define('RESTAN_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('RESTAN_PLUGIN_INC_PATH', plugin_dir_path(__FILE__) . 'inc/');
define('RESTAN_PLUGIN_CMB2EXT_PATH', plugin_dir_path(__FILE__) . 'cmb2-ext/');
define('RESTAN_PLUGIN_WIDGET_PATH', plugin_dir_path(__FILE__) . 'inc/widgets/');
define('RESTAN_PLUGIN_WIDGET_STYLE_PATH', plugin_dir_path(__FILE__) . 'addons/widgets/widgets-style/');
define('RESTAN_PLUGDIRURI', plugin_dir_url(__FILE__));
define('RESTAN_ADDONS', plugin_dir_path(__FILE__) . 'addons/');
define('RESTAN_CORE_PLUGIN_TEMP', plugin_dir_path(__FILE__) . 'restan-template/');

// load textdomain
load_plugin_textdomain('restan-core', false, basename(dirname(__FILE__)) . '/languages');

//include file.
require_once RESTAN_PLUGIN_INC_PATH . 'restancore-functions.php';
require_once RESTAN_PLUGIN_INC_PATH . 'MCAPI.class.php';
require_once RESTAN_PLUGIN_INC_PATH . 'restan-ajax.php';
require_once RESTAN_PLUGIN_INC_PATH . 'builder/builder.php';
require_once RESTAN_PLUGIN_INC_PATH . 'restan-icons.php';
require_once RESTAN_PLUGIN_INC_PATH . 'megamenu.php';
require_once RESTAN_PLUGIN_CMB2EXT_PATH . 'cmb2ext-init.php';


//Widget
require_once RESTAN_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';

//addons
require_once RESTAN_ADDONS . 'addons.php';
