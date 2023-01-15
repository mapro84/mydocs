<?php
namespace src\app\Demo\Factory;

class PizzaMargherita Implements Pizza{
	
	public function __construct($shape, Bool $gluten=true){
	}
	
	public function made(){
		return 'Object '.__CLASS__;
	}
}
