<?php

/**
 * @wordpress-plugin
 * Plugin Name: Demo Plugin
 * Plugin URI:  https://acme.com/demo-plugin
 * Description: Demonstrate ... what exactly? Max 140 characters.
 * Version:     1.0.0
 * Author:      ACME
 * Author URI:  https://acme.com
 * License:     GPL-3.0+
 * License URI: https://opensource.org/licenses/GPL-3.0
 * Text Domain: acme-demo
 * Domain Path: /languages
 */

use ACME\Demo\Tool\Activator;
use ACME\Demo\Tool\Deactivator;
use ACME\Demo\Tool\Uninstaller;
use ACME\Demo\Plugin;

// If called directly, abort.
if (!defined('WPINC')) {
    die;
}

// global variables, as few as possible
define('ACME_DEMO_VERSION', '1.0.0');
define('ACME_DEMO_PATH', plugin_dir_path(__FILE__));
define('ACME_DEMO_URL', plugin_dir_url(__FILE__));
define('ACME_DEMO_BASENAME', plugin_basename(__FILE__));

// composer autoloading
require_once ACME_DEMO_PATH . 'vendor/autoload.php';

// activation hook
register_activation_hook(__FILE__, [Activator::class, 'run']);

// deactivation hook
register_deactivation_hook(__FILE__, [Deactivator::class, 'run']);

// uninstall hook
register_uninstall_hook(__FILE__, [Uninstaller::class, 'run']);

// start plugin execution
add_action('plugins_loaded', [Plugin::class, 'plugins_loaded']);
