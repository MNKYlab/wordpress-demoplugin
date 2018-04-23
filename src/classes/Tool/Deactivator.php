<?php

namespace ACME\Demo\Tool;

// If called directly, abort.
if ( ! defined('ACME_DEMO_VERSION')) {
	exit;
}

class Deactivator
{

	public static function run()
	{
		global $wpdb;
	}

}
