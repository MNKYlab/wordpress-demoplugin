<?php

namespace ACME\Demo\Front;

// If called directly, abort.
if ( ! defined('ACME_DEMO_VERSION'))
	exit;

class Plugin 
{
	protected $loader;

	public static function init($loader)
	{
		return new self($loader);
	}

	public function __construct($loader)
	{
		$this->loader = $loader;
	}
}
