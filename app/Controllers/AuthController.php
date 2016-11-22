<?php

namespace App\Controllers;

use \App\Models\User;
use \Respect\Validation\Validator as v;

class AuthController extends BaseController
{
	
	public function getSignOut($request, $response) {
		
		# Sign user out:
		$this->auth->logout();
		
		$this->flash->addMessage('info', 'You have been logged out!');
		
		# Send them to the homepage:
		return $response->withRedirect($this->router->pathFor('home'));
		
	}
	
	public function getSignIn($request, $response) {
		
		return $this->view->render($response, 'app/signin.phtml');
		
	}
	
	public function postSignIn($request, $response) {
		
		$auth = $this->auth->attempt(
			$request->getParam('email'),
			$request->getParam('password')
		);
		
		if ( ! $auth) {
			
			$this->flash->addMessage('warning', 'Could not sign you in with those details.');
			
			return $response->withRedirect($this->router->pathFor('auth.signin'));
			
		}
		
		$this->flash->addMessage('info', 'You have been signed in!');
		
		return $response->withRedirect($this->router->pathFor('home'));
		
	}
	
	public function getSignUp($request, $response) {
		
		return $this->view->render($response, 'app/signup.phtml');
		
	}
	
	public function postSignUp($request, $response) {
		
		# Validating:
		$validation = $this->validator->validate($request, [
			'name' => v::notEmpty()->alpha(),
			'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
			'password' => v::notEmpty(),
		]);
		
		# Check if validation failed:
		if ($validation->failed()) {
			
			return $response->withRedirect($this->router->pathFor('auth.signup'));
			
		}
		
		// # Register the user:
		$user = User::create()
			->setName($request->getparam('name'))
			->setEmail($request->getparam('email'))
			->setPassword($request->getParam('password'));
		
		# Automatically sign user in (we know these credentials are correct):
		$this->auth->attempt($user->email, $request->getParam('password')); // Email and un-hashed password.
		
		$this->flash->addMessage('info', 'You have been signed up!');
		
		# Send them to the homepage:
		return $response->withRedirect($this->router->pathFor('home'));
		
	}
	
}
