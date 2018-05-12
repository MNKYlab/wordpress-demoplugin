<?php

namespace ACME\Demo\Tool;

// If called directly, abort.
if (! defined('ACME_DEMO_VERSION')) {
    exit;
}

class Loader
{
    protected $actions;
    protected $filters;

    public function __construct()
    {
        $this->actions = [];
        $this->filters = [];
    }
    public function add_action($hook, $component, $callback, $priority = 10, $args = 1)
    {
        $this->actions = $this->add($this->actions, $hook, $component, $callback, $priority, $args);
    }
    public function add_filter($hook, $component, $callback, $priority = 10, $args = 1)
    {
        $this->filters = $this->add($this->filters, $hook, $component, $callback, $priority, $args);
    }
    protected function add($hooks, $hook, $component, $callback, $priority, $args)
    {
        array_push($hooks, [
            'hook' => $hook,
            'component' => $component,
            'callback' => $callback,
            'priority' => $priority,
            'args' => $args,
        ]);
        return $hooks;
    }
    public function run()
    {
        foreach ($this->actions as $hook) {
            $this->run_hook('add_action', $hook);
        }
        foreach ($this->filters as $hook) {
            $this->run_hook('add_filter', $hook);
        }
    }
    protected function run_hook($name, $hook)
    {
        if ($hook['component'] === null) {
            $callable = $hook['callback'];
        } else {
            $callable = [$hook['component'], $hook['callback']];
        }

        $arguments = [
            $hook['hook'],
            $callable,
            $hook['priority'],
            $hook['args']
        ];
        call_user_func_array($name, $arguments);
    }
}
