<?php

namespace ACME\Demo;

// If called directly, abort.
if ( ! defined('ACME_DEMO_VERSION')) {
	exit;
}

class Plugin 
{

	protected $loader;

	public static function init()
	{
		$app = new self;
		$app->run();
		return $app;
	}

	protected function __construct()
	{
		$this->loader = new Tool\Loader;
		$this->set_locale();
		$this->init_hooks();
	}

	protected function set_locale()
	{
		$i18n = new Tool\I18n;
		$this->loader->add_action('plugins_loaded', $i18n, 'load_textdomain');
	}

	protected function init_hooks()
	{
		if (is_admin())
		{
			Back\Hooks::getInstance($this->loader)->run();
		}
		Front\Hooks::getInstance($this->loader)->run();
	}

	public function run()
	{
		$this->loader->run();
	}

	protected static function get_src_extra($base, array $dir, $file)
	{
		$path = $base . implode(DIRECTORY_SEPARATOR, $dir);
		$file = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $file);
		return $path . DIRECTORY_SEPARATOR . $file;
	}

	public static function get_assets_url($file)
	{
		return self::get_src_extra(ACME_DEMO_URL, ['assets'], $file);
	}

	public static function get_templates_path($file)
	{
		return self::get_src_extra(ACME_DEMO_PATH, ['src', 'templates'], $file . '.php');
	}

}
