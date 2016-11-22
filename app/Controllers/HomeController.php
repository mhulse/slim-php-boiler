<?php

namespace App\Controllers;

// use \App\Models\User;
// use \Slim\Views\Twig as View;

class HomeController extends BaseController
{
	
	// var_dump($request->getParam('name')); // ?name=billy
	
	// $user = $this->db->table('users')->where('id', 1);
	// $user = $this->db->table('users')->find(1);
	// var_dump($user->email);
	// die();
	
	// $user = User::find(1);
	// $user = User::where('email', 'micky@ieqtech.com')->first();
	// var_dump($user->email);
	// die();
	
	// User::create([
	// 	'name' => 'Billy Bobby',
	// 	'email' => 'billybobby@foo.com',
	// 	'password' => '123',
	// ]);
	// die();
	
	public function index($request, $response) {
		
		return $this->view->render($response, 'app/base.phtml');
		
	}
	
}
