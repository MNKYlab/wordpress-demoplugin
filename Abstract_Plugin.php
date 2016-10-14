<?php

namespace ACME\Demo;

// If called directly, abort.
if ( ! defined('ACME_DEMO_VERSION'))
	exit;

abstract class Abstract_Plugin 
{
	protected $loader;
	protected $folder_name;

	public function __construct($loader, $folder_name)
	{
		$this->loader = $loader;
		$this->folder_name = $folder_name;

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

	public function get_asset_url()
	{
		return sprintf('%2$s%3$s%1$s%4$s%1$s',
			DIRECTORY_SEPARATOR,
			ACME_DEMO_URL,
			$this->folder_name,
			'assets'
		);
	}

	public function get_template_path()
	{
		return sprintf('%2$s%3$s%1$s%4$s%1$s',
			DIRECTORY_SEPARATOR,
			ACME_DEMO_PATH,
			$this->folder_name,
			'templates'
		);
	}
}
