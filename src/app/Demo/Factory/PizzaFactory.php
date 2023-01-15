<?php
namespace src\app\Demo\Factory;

use src\app\Demo\Factory\Shape;

class PizzaFactory {
	

	public function __construct(){
	}
	
	public function getPizza(String $pizzaType): Pizza | null {
		
		$shape = new Shape('circle');
		
		if($pizzaType === null){
			return null;
		}
		if($pizzaType === "chorizo"){
			$class_name = "\\src\\app\\Demo\\Factory\\" . "Pizza" .  ucfirst($pizzaType);
			return new $class_name;
			
		} if($pizzaType === "3Cheese"){
			$class_name = "\\src\\app\\Demo\\Factory\\" . "Pizza" . ucfirst($pizzaType);
			return new $class_name;
			
		} if($pizzaType === "margherita"){
			$class_name = "\\src\\app\\Demo\\Factory\\" . "Pizza" . ucfirst($pizzaType);
			return new  $class_name($shape);
		}
        return null;
	}

	
}

