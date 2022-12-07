<?php

namespace src\classes\demos\factory;

class PizzaMargherita Implements Pizza{
	
	public function made(){
		return 'Object '.__CLASS__;
	}
}

