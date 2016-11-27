<?php 

namespace App\Validation\Rules;

use \App\Models\User;
use \Respect\Validation\Rules\AbstractRule;

# Note: for every rule there should be an exception!
class EmailAvailable extends AbstractRule
{
	
	protected $id;
	
	// Use the constructor to pass data into the rule:
	public function __construct($id = null) {
		
		$this->id = $id;
		
	}
	
	public function validate($input) {
		
		return User::all()->except($this->id)->where('email', $input)->count() === 0;
		
	}
	
}
