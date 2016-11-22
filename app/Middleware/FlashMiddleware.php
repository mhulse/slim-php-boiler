<?php 

namespace App\Middleware;

class FlashMiddleware extends BaseMiddleware
{
	
	public function __invoke($request, $response, $next) {
		
		$this->container->view->getEnvironment()->addGlobal('flash', $this->container->flash);
		
		// Before the state has changed …
		$response = $next($request, $response);
		// … after the state has changed.
		return $response;
		
	}
	
}
