<?php

namespace src\app\demos\factory;

class Pizza3Cheese Implements Pizza{
	
	public function made(){
		return 'Object '.__CLASS__;
	}
}

