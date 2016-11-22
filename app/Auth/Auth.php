<?php 

namespace App\Auth;

use \App\Models\User;

class Auth
{
	
	public function user() {
		
		return User::find($_SESSION['user']);
		
	}
	
	public function check() {
		
		return isset($_SESSION['user']);
		
	}
	
	public function attempt($email, $password) {
		
		# Get user by email:
		$user = User::where('email', $email)->first();
		
		# If user not found, return `false`:
		if ( ! $user) {
			
			return false;
			
		}
		
		# Verify password for user:
		if (password_verify($password, $user->password)) {
			
			# Set user into current session:
			$_SESSION['user'] = $user->id;
			
			return true;
			
		}
		
		return false;
		
	}
	
	public function logout() {
		
		unset($_SESSION['user']);
		
	}
	
}
