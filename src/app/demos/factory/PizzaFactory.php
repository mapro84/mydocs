<?php
namespace src\app\demos\factory;

use src\app\demos\factory\Shape;

class PizzaFactory {
	

	public function __construct(){
	}
	
	public function getPizza(String $pizzaType): Pizza{
		
		$shape = new Shape('circle');
		
		if($pizzaType === null){
			return null;
		}
		if($pizzaType === "chorizo"){
			$class_name = "\\src\\app\\demos\\factory\\" . "Pizza" .  ucfirst($pizzaType);
			return new $class_name;
			
		} if($pizzaType === "3cheese"){
			$class_name = "\\src\\app\\demos\\factory\\" . "Pizza" . ucfirst($pizzaType);
			return new $class_name;
			
		} if($pizzaType === "margherita"){
			$class_name = "\\src\\app\\demos\\factory\\" . "Pizza" . ucfirst($pizzaType);
			return new  $class_name(false,$shape);
		}

		return null;

	}
}

