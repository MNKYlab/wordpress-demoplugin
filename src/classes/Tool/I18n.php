<?php

namespace ACME\Demo\Tool;

class I18n
{
    public static function loadTextdomain()
    {
        load_plugin_textdomain(
            'acmeplugin',
            false,
            ACME_DEMO_PATH . 'languages'
        );
    }
}
