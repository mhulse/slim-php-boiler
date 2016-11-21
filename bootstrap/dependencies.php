<?php

// DIC configuration:
$container = $app->getContainer();

// Register component on container
$container['view'] = function($c) {
	
	$settings = $c->get('settings')['twig'];
	$template_path = $settings['template_path'];
	
	$view = new Slim\Views\Twig($template_path, [
		'auto_reload' => true,
		'autoescape' => true,
		'cache' => $template_path . $settings['template_cache_dir'],
		'charset' => 'utf-8',
		'strict_variables' => false,
	]);
	
	// Instantiate and add Slim specific extension:
	$basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
	
	$view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));

	return $view;
	
};

// Monolog:
$container['logger'] = function($c) {
	
	$settings = $c->get('settings')['logger'];
	
	$logger = new Monolog\Logger($settings['name']);
	$logger->pushProcessor(new Monolog\Processor\UidProcessor());
	$logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
	
	return $logger;
	
};
