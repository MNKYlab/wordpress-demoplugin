<?php

/**
 * @wordpress-plugin
 * Plugin Name:	Demo Plugin
 * Plugin URI:	https://acme.com/demo-plugin
 * Description:	Demonstrate ... what exactly? Max 140 characters.
 * Version:	1.0.0
 * Author:	ACME
 * Author URI:	https://acme.com
 * License:	GPL-2.0+
 * License URI:	http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:	acme-demo
 * Domain Path:	/languages
 */

namespace ACME\Demo;

// If called directly, abort.
if ( ! defined('WPINC'))
  die;

// Global variables, as few as possible
define('ACME_DEMO_VERSION', '1.0.0');
define('ACME_DEMO_PATH', plugin_dir_path(__FILE__));
define('ACME_DEMO_URL', plugin_dir_url(__FILE__));
define('ACME_DEMO_BASENAME', plugin_basename(__FILE__));

// autoloader
spl_autoload_register(function($className){
});

// activation
register_activation_hook(__FILE__, array('\\ACME\\Demo\\Tool\\Activator', 'run'));

// deactivation
register_deactivation_hook(__FILE__, array('\\ACME\\Demo\\Tool\\Deactivator', 'run'));

// uninstall 
register_uninstall_hook(__FILE__, array('\\ACME\\Demo\\Tool\\Uninstaller', 'run'));

// main plugin
add_action('init', array('\\ACME\\Demo\\Plugin', 'init'));
