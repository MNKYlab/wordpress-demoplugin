<?php

namespace ACME\Demo;

abstract class Init
{
    protected static $instances = [];

    public static function getInstance()
    {
        $class = get_called_class();

        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new $class();
        }
        return self::$instances[$class];
    }

    protected function __construct() {}

    public function run()
    {
        // init classes relevant to wp-admin
    }
}
