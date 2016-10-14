<?php

namespace ACME\Demo\Front;

// If called directly, abort.
if ( ! defined('ACME_DEMO_VERSION'))
	exit;

class Plugin extends \ACME\Demo\Abstract_Plugin
{
	public static function init($loader)
	{
		return new self($loader);
	}

	protected function add_actions()
	{
		$this->loader->add_action('wp_enqueue_scripts', $this, 'register_enqueue');
		// + custom action hooks
	}

	protected function add_filters()
	{
		// custom filter hooks
	}

	protected function register_scripts() {}

	protected function enqueue_scripts() {}

	protected function register_styles() {}

	protected function enqueue_styles() {}
}
