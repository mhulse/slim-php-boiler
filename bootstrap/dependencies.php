<?php

# Register component on container:
$container['view'] = function($c) {
	
	$settings = $c->get('settings')['twig'];
	$template_path = $settings['template_path'];
	
	$view = new \Slim\Views\Twig($template_path, $settings['environment']);
	
	$view->addExtension(new Twig_Extension_Debug());
	
	$view->addExtension(
		new \Slim\Views\TwigExtension(
			$c['router'],
			rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/')
		)
	);
	
	return $view;
	
};

# Monolog:
$container['logger'] = function($c) {
	
	$settings = $c->get('settings')['logger'];
	
	$logger = new \Monolog\Logger($settings['name']);
	$logger->pushProcessor(new \Monolog\Processor\UidProcessor());
	$logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
	
	return $logger;
	
};

# Eloquent:
# https://laravel.com/docs/5.3/eloquent
# https://www.slimframework.com/docs/cookbook/database-eloquent.html
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$capsule::connection()->enableQueryLog();
$container['db'] = function($c) use ($container) {
	return $capsule;
};

// Register provider:
$container['flash'] = function($c) {
	
	return new \Slim\Flash\Messages;
	
};

$container['validator'] = function($c) {
	
	return new \App\Validation\Validator;
	
};

$container['auth'] = function($c) {
	
	return new \App\Auth\Auth;
	
};

$container['HomeController'] = function($c) {
	
	return new \App\Controllers\HomeController($c);
	
};

$container['AuthController'] = function($c) {
	
	return new \App\Controllers\AuthController($c);
	
};

$container['PasswordController'] = function($c) {
	
	return new \App\Controllers\PasswordController($c);
	
};

$container['ProfileController'] = function($c) {
	
	return new \App\Controllers\ProfileController($c);
	
};

# Slim Framework CSRF Protection
# https://github.com/slimphp/Slim-Csrf
$container['csrf'] = function($container) {
	
	return new \Slim\Csrf\Guard;
	
};
