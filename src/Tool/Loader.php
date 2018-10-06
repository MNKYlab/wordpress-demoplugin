<?php

namespace ACME\Demo\Tool;

class Loader
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

    public static function addAction(
        $hook,
        $component,
        $callback,
        $priority = 10,
        $args = 1
    ) {
        self::runHook(
            'add_action',
            $hook,
            $component,
            $callback,
            $priority,
            $args
        );
    }

    public static function addFilter(
        $hook,
        $component,
        $callback,
        $priority = 10,
        $args = 1
    ) {
        self::runHook(
            'add_filter',
            $hook,
            $component,
            $callback,
            $priority,
            $args
        );
    }

    protected static function runHook(
        $name,
        $hook,
        $component = null,
        $callback,
        $priority = 10,
        $args = 1
    ) {
        if ($component === null) {
            $callable = $callback;
        } else {
            $callable = [$component, $callback];
        }

        $arguments = [
            $hook,
            $callable,
            $priority,
            $args,
        ];
        \call_user_func_array($name, $arguments);
    }
}
