<?php

namespace ACME\Demo\Front\Shortcode;

abstract class Base
{
    protected $default_attributes = [];

    public static function init($name)
    {
        $class =  get_called_class();
        $self = new $class();
        
        \add_shortcode(ACME_DEMO_PREFIX . $name, [$self, 'prepareRender']);
    }

    public function prepareRender($raw_attributes = [], $content = null, $tag = '')
    {
        $raw_atts = array_change_key_case((array)$raw_attributes, CASE_LOWER);
        $atts = $this->filterAttributes(\shortcode_atts($this->default_attributes, $raw_attributes, $tag));

        return $this->render($atts, $content);
    }

    protected function filterAttributes($atts = [])
    {
        // implement
        return $atts;
    }

    protected function render($atts = [], $content = null)
    {
        // implement
        return $content;
    }

}
