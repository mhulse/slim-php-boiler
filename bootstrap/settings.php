<?php

return [
	'settings' => [
		'displayErrorDetails' => true, // Set to false in production.
		'addContentLengthHeader' => false,
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
			'template_cache_dir' => '/cache'
		]
	],
];
