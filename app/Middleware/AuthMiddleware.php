<?php 

namespace App\Middleware;

class AuthMiddleware extends BaseMiddleware
{
	
	public function __invoke($request, $response, $next) {
		
		$this->container->view->getEnvironment()->addGlobal('auth', [
			// One database call, for each, per request:
			'check' => $this->container->auth->check(), // `auth.check`
			'user' => $this->container->auth->user(), // `auth.user`
		]);
		
		// Before the state has changed …
		$response = $next($request, $response);
		// … after the state has changed.
		return $response;
		
	}
	
}
