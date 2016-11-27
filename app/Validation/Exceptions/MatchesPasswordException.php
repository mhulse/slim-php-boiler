<?php

namespace App\Validation\Exceptions;

use \Respect\Validation\Exceptions\ValidationException;

class MatchesPasswordException extends ValidationException
{
	
	# http://respect.github.io/Validation/
	# https://github.com/Respect/Validation/tree/master/docs
	public static $defaultTemplates = [
		self::MODE_DEFAULT => [
			self::STANDARD => 'Does not match your existing password.',
		],
	];
	
}
