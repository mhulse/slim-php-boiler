<?php

namespace App\Controllers;

use \App\Models\User;
use \Respect\Validation\Validator as v;

class PasswordController extends BaseController
{
	
	public function getChange($request, $response) {
		
		return $this->view->render($response, 'app/password.phtml');
		
	}
	
	public function postChange($request, $response) {
		
		$validation = $this->validator->validate($request, [
			'password' => v::notEmpty()->matchesPassword($this->auth->user()->password),
			'password_new' => v::notEmpty(),
		]);
		
		if ($validation->failed()) {
			
			return $response->withRedirect($this->router->pathFor('user.password'));
			
		}
		
		$this->auth->user()->setPassword($request->getParam('password'));
		
		$this->flash->addMessage('info', 'Your password has been updated.');
		
		return $response->withRedirect($this->router->pathFor('home'));
		
	}
	
}
