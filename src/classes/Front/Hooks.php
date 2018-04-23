<?php

namespace ACME\Demo\Front;

// If called directly, abort.
if ( ! defined('ACME_DEMO_VERSION')) {
	exit;
}

class Hooks 
{

	protected static $instance;
	protected $loader;

	public static function getInstance($loader)
	{
		if (self::$instance === NULL)
		{
			self::$instance = new self($loader);
		}
		return self::$instance;
	}

	protected function __construct($loader)
	{
		$this->loader = $loader;
	}

	public function run()
	{
		$this->add_actions();
		$this->add_filters();
	}

	protected function add_actions()
	{

	}

	protected function add_filters()
	{

	}

}
