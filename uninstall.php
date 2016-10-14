<?php

// If not called from WP uninstall, abort.
if ( ! defined('WP_UNINSTALL_PLUGIN'))
	exit;

// remove all data your plugin created, e.g. in db
