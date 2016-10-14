<?php

namespace ACME\Demo;

use ACME\Demo\Tool\Loader as Loader;
use ACME\Demo\Tool\I18n as I18n;

// If called directly, abort.
if ( ! defined('ACME_DEMO_VERSION'))
	exit;

class Plugin 
{
	protected $loader;

	public static function init()
	{
		$me = new self;
		return $me->run();
	}

	public function __construct()
	{
		$this->loader = new Loader;
		$this->set_locale();
		$this->init_hooks();
	}

	protected function set_locale()
	{
		$I18n = new I18n;
		$this->loader->add_action('plugins_loaded', $I18n, 'load_plugin_textdomain');
	}

	protected function init_hooks()
	{
		if (is_admin())
		{
			Back\Plugin::init($this->loader);
		}
		Front\Plugin::init($this->loader);
	}

	public function run()
	{
		$this->loader->run();
		return $this;
	}
}
