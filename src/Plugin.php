<?php

namespace ACME\Demo;

class Plugin
{
    protected $loader;

    public static function plugins_loaded()
    {
        $app = new self;
        $app->run();
        return $app;
    }

    protected function __construct()
    {
        $this->loader = new Tool\Loader;
        $this->setLocale();
        $this->initHooks();
    }

    protected function setLocale()
    {
        $this->loader->addAction(
            'setup_theme',
            Tool\I18n::class,
            'loadTextdomain'
        );
    }

    protected function initHooks()
    {
        if (is_admin()) {
            Back\Hooks::getInstance($this->loader)->run();
        }
        General\Hooks::getInstance($this->loader)->run();
    }

    public function run()
    {
        $this->loader->run();
    }

    protected static function getSrcExtra($base, array $dir, $file)
    {
        $path = $base . implode(DIRECTORY_SEPARATOR, $dir);
        return $path . DIRECTORY_SEPARATOR . $file;
    }

    public static function getAssetsUrl($file)
    {
        return self::getSrcExtra(ACME_DEMO_URL, ['assets'], $file);
    }

    public static function getTemplatesPath($file)
    {
        return self::getSrcExtra(ACME_DEMO_PATH, ['templates'], $file . '.php');
    }
}
