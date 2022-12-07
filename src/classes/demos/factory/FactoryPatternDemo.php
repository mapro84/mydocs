<?php
namespace src\classes\demos\factory;

use src\classes\demos\factory\PizzaFactory;
use src\classes\Utils\Debug;

class FactoryPatternDemo {
	
	public function demo() {
		$shapeFactory = new PizzaFactory();
		
		//get an object of Circle and call its draw method.
		$pizza1 = $shapeFactory->getPizza("chorizo");
		$res1 = $pizza1->made();

		//get an object of Rectangle and call its draw method.
		$pizza2 = $shapeFactory->getPizza("margherita");
		$res2= $pizza2->made();

		//get an object of Square and call its draw method.
		$pizza3 = $shapeFactory->getPizza("3cheese");
		$res3 = $pizza3->made();
		
		return $res1 . "<br>" . $res2 . "<br>" . $res3;

	}
	
}

