<?php

namespace ACME\Demo;

// If called directly, abort.
if ( ! defined('ACME_DEMO_VERSION'))
	exit;

abstract class Abstract_Plugin 
{
	protected $loader;

	public static function init($loader)
	{
		return new self($loader);
	}

	public function __construct($loader)
	{
		$this->loader = $loader;

		$this->add_actions();
		$this->add_filters();
	}

	public function register_enqueue()
	{
		$this->register_scripts();
		$this->enqueue_scripts();
		$this->register_styles();
		$this->enqueue_styles();
	}

	protected function register_scripts()
	{
		// wp_register_script
		// https://developer.wordpress.org/reference/functions/wp_register_script/
	}

	protected function enqueue_scripts()
	{
		// wp_enqueue_script
		// https://developer.wordpress.org/reference/functions/wp_enqueue_script/
	}

	protected function register_styles()
	{
		// wp_register_style
		// https://developer.wordpress.org/reference/functions/wp_register_style/
	}

	protected function enqueue_styles()
	{
		// wp_enqueue_style
		// https://developer.wordpress.org/reference/functions/wp_enqueue_style/
	}

}
