<?php 

namespace App\Middleware;

class GuestMiddleware extends BaseMiddleware
{
	
	public function __invoke($request, $response, $next) {
		
		# Check if the user IS signed in:
		if ($this->container->auth->check()) {
			
			return $response->withRedirect($this->container->router->pathFor('home'));
			
		}
		
		// Before the state has changed …
		$response = $next($request, $response);
		// … after the state has changed.
		return $response;
		
	}
	
}
