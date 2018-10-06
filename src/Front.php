<?php

namespace ACME\Demo;

class Front
{
    protected static $instance;

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function __construct() {}

    public function run()
    {
        // init classes relevant to the public-facing side
    }
}
