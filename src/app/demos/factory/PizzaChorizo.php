<?php

namespace src\app\demos\factory;

class PizzaChorizo Implements Pizza{
	
	public function made(){
		return 'Object '.__CLASS__;
	}
}

