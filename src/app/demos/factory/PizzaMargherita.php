<?php
namespace src\app\demos\factory;

class PizzaMargherita Implements Pizza{
	
	public function __construct(Bool $gluten=true, $shape){
	}
	
	public function made(){
		return 'Object '.__CLASS__;
	}
}
