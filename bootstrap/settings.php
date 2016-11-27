<?php

return [
	'settings' => [
		'displayErrorDetails' => true, // Set to false in production.
		'addContentLengthHeader' => false,
		'determineRouteBeforeAppMiddleware' => false,
		'renderer' => [
			'template_path' => __DIR__ . '/../templates',
		],
		'logger' => [
			'name' => 'slim-app',
			'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
			'level' => \Monolog\Logger::DEBUG,
		],
		'twig' => [
			'template_path' => __DIR__ . '/../templates',
			'environment' => [
				'auto_reload' => true,
				'autoescape' => true,
				'cache' => false, //__DIR__ . '/../templates/cache',
				'charset' => 'utf-8',
				'strict_variables' => false,
				'debug' => true,
			]
		],
		// @TODO: Make a local/dev/production connection later.
		'db' => [
			'driver'    => 'mysql',
			'host'      => DB_HOST,
			'port'      => DB_PORT,
			'database'  => DB_NAME,
			'username'  => DB_USER,
			'password'  => DB_PASSWORD,
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix' => '',
		]
	],
];
