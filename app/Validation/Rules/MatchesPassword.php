<?php 

namespace App\Validation\Rules;

use \App\Models\User;
use \Respect\Validation\Rules\AbstractRule;

# Note: for every rule there should be an exception!
class MatchesPassword extends AbstractRule
{
	
	protected $password;
	
	// Use the constructor to pass data into the rule:
	public function __construct($password) {
		
		$this->password = $password;
		
	}
	
	public function validate($input) {
		
		return password_verify($input, $this->password);
		
	}
	
}
