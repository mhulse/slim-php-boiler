<?php

namespace App\Controllers;

class BaseController
{
	
	protected $container;
	
	public function __construct($c) {
		
		# Any class that extends will have access to any item on the DIC:
		$this->container = $c;
		
	}
	
	# Check to see if properties exist on DIC:
	public function __get($property) {
		
		if ($this->container->{$property}) {
			
			return $this->container->{$property};
			
		}
		
	}
	
}
