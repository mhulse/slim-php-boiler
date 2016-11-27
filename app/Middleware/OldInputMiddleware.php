<?php

namespace App\Middleware;

class OldInputMiddleware extends BaseMiddleware
{
	
	public function __invoke($request, $response, $next) {
		
		$this->container->view->getEnvironment()->addGlobal('old', $_SESSION['old']); // After first time, old form data gets set here …
		$_SESSION['old'] = $request->getParams(); // First and subsequent requests we set the form data in the session.
		
		// Before the state has changed …
		$response = $next($request, $response);
		// … after the state has changed.
		return $response;
		
	}
	
}
