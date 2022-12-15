<?php
namespace src\app\demos\factory;

use src\app\demos\factory\PizzaFactory;

class Demo {

    private $factory;

    // Dependency injection
    public function __construct(){
        $this->factory = new PizzaFactory();
    }
    
    public function demo() {

        //get an object of Circle and call its draw method.
        $pizza1 = $this->factory->getPizza("chorizo");
        $res1 = $pizza1->made();

        //get an object of Rectangle and call its draw method.
        $pizza2 = $this->factory->getPizza("margherita");
        $res2= $pizza2->made();

        //get an object of Square and call its draw method.
        $pizza3 = $this->factory->getPizza("3cheese");
        $res3 = $pizza3->made();
        
        $interface = 
'<pre style="text-align:left;margin: 5px 20px;padding: 0 10px;">' .

'&#139;&#63;php

namespace src\app\demos\factory;

interface Pizza {
    
    public function made();
    
}'
. '</pre>';


        $pizza3cheese = '<pre>'

. '&#139;&#63;php
                
namespace src\app\demos\factory;

class Pizza3Cheese Implements Pizza{
    
    public function made(){
        return \'Object \'.__CLASS__;
    }
}'
. '</pre>';

        $pizzaChorizo = '<pre>'

. '&#139;&#63;php

namespace src\app\demos\factory;

class PizzaChorizo Implements Pizza{
    
    public function made(){
        return \'Object \'.__CLASS__;
    }
}'
. '</pre>';

        $pizzaMargherita ='<pre>'

. '&#139;&#63;php

namespace src\app\demos\factory;

class PizzaMargherita Implements Pizza{
	
	public function __construct(Bool $gluten=true, $shape){
	}
	
	public function made(){
		return \'Object \'.__CLASS__;
	}
}'

. '</pre>';

        $factory = '<pre>'

. '&#139;&#63;php

namespace src\app\demos\factory;

use src\app\demos\factory\Shape;

class PizzaFactory {
	

	public function __construct(){
	}
	
	public function getPizza(String $pizzaType): Pizza{
		
		$shape = new Shape(\'circle\');
		
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
			return new  $class_name(false,$shape);
		}

		return null;

	}
}' .

'</pre>';

        $factoryPatternDemo = '<pre>'
        
. '&#139;&#63;php
                
namespace src\app\demos\factory;

use src\app\demos\factory\PizzaFactory;
use src\Core\Utils\Debug;

class Demo {

    private $factory;
    
    // Dependency injection
    public function __construct($factory){
        $this->factory = $factory;
    }

    public function demo() {
        $this->factory = new PizzaFactory();
        
        //get an object of Circle and call its draw method.
        $pizza1 = $this->factory->getPizza("chorizo");
        $res1 = $pizza1->made();

        //get an object of Rectangle and call its draw method.
        $pizza2 = $this->factory->getPizza("margherita");
        $res2= $pizza2->made();

        //get an object of Square and call its draw method.
        $pizza3 = $this->factory->getPizza("3cheese");
        $res3 = $pizza3->made();

        $content = " Content of all involved classes in this presentation ";
        return $interface . $pizza3cheese . $pizzaChorizo . $pizzaMargherita . $factory . $factoryPatternDemo
               . "Result: " .  $res1 . "<br>" . $res2 . "<br>" . $res3;

    }
    
}'
                
. '</pre>';
        
        
return $interface . $pizza3cheese . $pizzaChorizo . $pizzaMargherita . $factory . $factoryPatternDemo
       . '<pre>' . "Result: <br>" .  $res1 . "<br>" . $res2 . "<br>" . $res3 . '</pre>';

    }
    
}

