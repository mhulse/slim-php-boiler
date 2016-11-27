<?php

namespace App\Validation\Exceptions;

use \Respect\Validation\Exceptions\ValidationException;

class EmailAvailableException extends ValidationException
{
	
	# http://respect.github.io/Validation/
	# https://github.com/Respect/Validation/tree/master/docs
	public static $defaultTemplates = [
		self::MODE_DEFAULT => [
			self::STANDARD => 'Email is already taken.',
		],
	];
	
}
