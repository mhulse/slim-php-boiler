<?php

if (PHP_SAPI == 'cli-server') {
	// Handle static files differently for dev server:
	$url = parse_url($_SERVER['REQUEST_URI']);
	$file = __DIR__ . $url['path'];
	if (is_file($file)) {
		return false;
	}
}

# Composer's autoload classes:
require __DIR__ . '/../vendor/autoload.php';

session_start();

date_default_timezone_set('America/Los_Angeles');

// Instantiate the app:
$settings = require __DIR__ . '/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies:
require __DIR__ . '/dependencies.php';

// Register middleware:
require __DIR__ . '/middleware.php';

// Register routes:
require __DIR__ . '/routes.php';
