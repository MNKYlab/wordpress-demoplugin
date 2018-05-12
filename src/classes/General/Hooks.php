<?php

namespace ACME\Demo\General;

// If called directly, abort.
if (! defined('ACME_DEMO_VERSION')) {
    exit;
}

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
