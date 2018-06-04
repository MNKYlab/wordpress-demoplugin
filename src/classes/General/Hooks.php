<?php

namespace ACME\Demo\General;

class Hooks
{
    protected static $instance;
    protected $loader;

    public static function getInstance($loader)
    {
        if (self::$instance === null) {
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
        $this->addActions();
        $this->addFilters();
    }

    protected function addActions()
    {
    }

    protected function addFilters()
    {
    }
}
