<?php

namespace ACME\Demo;

use ACME\Demo\Tool\Loader;

class Plugin
{
    public static function plugins_loaded()
    {
        $app = new self();
        $app->run();
        return $app;
    }

    protected function __construct() {}

    protected function setLocale()
    {
        Loader::addAction(
            'setup_theme',
            Tool\I18n::class,
            'loadTextdomain'
        );
    }

    public function run()
    {
        if (\is_admin()) {
            Back\Init::getInstance()->run();
        }
        Front\Init::getInstance()->run();
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
