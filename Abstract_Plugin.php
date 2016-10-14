<?php

namespace ACME\Demo;

// If called directly, abort.
if ( ! defined('ACME_DEMO_VERSION'))
	exit;

abstract class Abstract_Plugin 
{
	protected $loader;

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
}
