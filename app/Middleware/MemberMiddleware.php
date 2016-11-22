<?php 

namespace App\Middleware;

class MemberMiddleware extends BaseMiddleware
{
	
	public function __invoke($request, $response, $next) {
		
		# Check if the user is NOT signed in:
		if ( ! $this->container->auth->check()) {
			
			$this->container->flash->addMessage('info', 'You must be logged in before accessing the site.');
			
			return $response->withRedirect($this->container->router->pathFor('auth.signin'));
			
		}
		
		// Before the state has changed …
		$response = $next($request, $response);
		// … after the state has changed.
		return $response;
		
	}
	
}
