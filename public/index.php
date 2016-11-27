<?php

// Handle static files differently for PHP CLI server:
if (PHP_SAPI == 'cli-server') {
	$url = parse_url($_SERVER['REQUEST_URI']);
	$file = __DIR__ . $url['path'];
	if (is_file($file)) {
		return false;
	}
}

require __DIR__ . '/../bootstrap/app.php';

$app->run();
