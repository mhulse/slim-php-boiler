<?php

use \App\Middleware\GuestMiddleware;
use \App\Middleware\MemberMiddleware;

$app->get('/', 'HomeController:index')->setName('home');

# These routes are only available to guests:
$app->group('', function() {
	
	$this->group('/auth', function() {
		
		$this->get('/signup', 'AuthController:getSignUp')->setName('auth.signup');
		$this->post('/signup', 'AuthController:postSignUp'); // Uses same route name as above.
		
		$this->get('/signin', 'AuthController:getSignIn')->setName('auth.signin');
		$this->post('/signin', 'AuthController:postSignIn'); // Ditto.
		
	});
	
})->add(new GuestMiddleware($container));

# These routes are only available to authenticated users:
$app->group('', function() {
	
	$this->group('/auth', function() {
		
		$this->get('/signout', 'AuthController:getSignOut')->setName('auth.signout');
		
	});
	
	$this->group('/user', function() {
		
		$this->get('/password', 'PasswordController:getChange')->setName('user.password');
		$this->post('/password', 'PasswordController:postChange');
			
		$this->get('/profile', 'ProfileController:getChange')->setName('user.profile');
		$this->post('/profile', 'ProfileController:postChange');
		
	});
	
})->add(new MemberMiddleware($container));
