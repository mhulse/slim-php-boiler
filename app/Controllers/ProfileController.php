<?php

namespace App\Controllers;

use \App\Models\User;
use \App\Controllers\BaseController;
use \Respect\Validation\Validator as v;

class ProfileController extends BaseController
{
	
	public function getChange($request, $response) {
		
		return $this->view->render($response, 'app/profile.phtml');
		
	}
	
	public function postChange($request, $response) {
		
		$validation = $this->validator->validate($request, [
			'name' => v::notEmpty()->alpha(),
			'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable($this->auth->user()->id),
		]);
		
		if ($validation->failed()) {
			
			return $response->withRedirect($this->router->pathFor('user.profile'));
			
		}
		
		# Update the user:
		$this->auth->user()
			->setName($request->getparam('name'))
			->setEmail($request->getparam('email'));
		
		$this->flash->addMessage('info', 'Your profile has been updated.');
		
		return $response->withRedirect($this->router->pathFor('user.profile'));
		
	}
	
}
