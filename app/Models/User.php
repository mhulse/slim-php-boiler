<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

# By default, Eloquent looks for a table using the plural version of
# class name. For example, in this case, it will look for `Users`:
class User extends Model
{
	
	# Whereas, this explicitly tells Eloquent to use the table `Users`:
	protected $table = 'users';
	
	# This lets Eloquent know that we want to touch/modify these
	# fields. Do not put field names here that you never want your code
	# to touch:
	protected $fillable = [
		'name',
		'email',
		'password',
	];
	
	public function setName($name) {
		
		$this->update([
			'name' => $name,
		]);
		
		return $this;
		
	}
	
	public function setEmail($email) {
		
		$this->update([
			'email' => $email,
		]);
		
		return $this;
		
	}
	
	public function setPassword($password) {
		
		# Creates a new password hash using a strong one-way hashing
		# algorithm. A random salt will be generated for each password
		# hashed. http://php.net/manual/en/function.password-hash.php
		$this->update([
			'password' => password_hash(
				$password,
				PASSWORD_DEFAULT
			),
		]);
		
		return $this;
		
	}
	
}
