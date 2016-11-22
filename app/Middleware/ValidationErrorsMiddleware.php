<?php

namespace App\Middleware;

class ValidationErrorsMiddleware extends BaseMiddleware
{
	
	public function __invoke($request, $response, $next) {
		
		$this->container->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']); // Now a global inside of views.
		unset($_SESSION['errors']); // This is important!
		
		// Before the state has changed …
		$response = $next($request, $response);
		// … after the state has changed.
		return $response;
		
	}
	
}
