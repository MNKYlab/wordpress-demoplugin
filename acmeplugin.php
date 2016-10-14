<?php

/**
 * @wordpress-plugin
 * Plugin Name:			Demo Plugin
 * Plugin URI:			https://acme.com/demo-plugin
 * Description:			Demonstrate ... what exactly? Max 140 characters.
 * Version:					1.0.0
 * Author:					ACME
 * Author URI:			https://acme.com
 * License:					GPL-2.0+
 * License URI:			http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:			acme-demo
 * Domain Path:			/languages
 */

namespace ACME\Demo;

// If called directly, abort.
if ( ! defined('WPINC'))
	die;

// Global variables, as few as possible
define('ACME_DEMO_VERSION', '1.0.0');
define('ACME_DEMO_PATH', plugin_dir_path(__FILE__));

// autoloader
spl_autoload_register(function($className){
	static $namespaceLength;

	// we only care about classes inside namespace of this file
	if (strpos($className, __NAMESPACE__) !== 0)
	{
		return;
	}

	// remove namespace of this file so we can build proper path
	if ($namespaceLength === NULL)
	{
		$namespaceLength = strlen(__NAMESPACE__) + 1;
	}
	$className = substr($className, $namespaceLength);

	// build path where file is supposed to be
	$classPath = sprintf('%1$s%2$s%3$s',
		ACME_DEMO_PATH,
		str_replace('\\', DIRECTORY_SEPARATOR, $className),
		'.php'
	);

	require_once $classPath;
});

// activation
register_activation_hook(__FILE__, array('\\ACME\\Demo\\Tool\\Activator', 'init'));

// deactivation
register_deactivation_hook(__FILE__, array('\\ACME\\Demo\\Tool\\Deactivator', 'init'));

// main plugin
Plugin::init();
