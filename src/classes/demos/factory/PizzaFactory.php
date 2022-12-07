<?php

namespace src\classes\demos\factory;

use src\classes\demos\factory\PizzaChorizo;
use src\classes\demos\factory\PizzaMargherita;
use src\classes\demos\factory\Pizza3Cheese;

class PizzaFactory {
	
	public function getPizza(String $pizzaType): Pizza{
		
		if($pizzaType === null){
			return null;
		}
		if($pizzaType === "chorizo"){
			$class_name = "\\src\\classes\\demos\\factory\\" . "Pizza" .  ucfirst($pizzaType);
			return new $class_name;
			
		} if($pizzaType === "3cheese"){
			$class_name = "\\src\\classes\\demos\\factory\\" . "Pizza" . ucfirst($pizzaType);
			return new $class_name;
			
		} if($pizzaType === "margherita"){
			$class_name = "\\src\\classes\\demos\\factory\\" . "Pizza" . ucfirst($pizzaType);
			return new  $class_name;
		}

		return null;

	}
}

