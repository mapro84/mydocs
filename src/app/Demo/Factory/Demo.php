<?php
namespace src\app\Demo\Factory;

use src\app\Demo\Factory\PizzaFactory;
use src\app\Demo\Factory\PizzaMargherita;
use src\app\Demo\Factory\Pizza3Cheese;
use src\app\Demo\Factory\PizzaChorizo;
use src\Core\Html\BootstrapHtml;

class Demo {

    private $factory;

    // Dependency injection
    public function __construct(){
        $this->factory = new PizzaFactory();
    }
    
    public function demo() {

        $bootstrapHtml = new BootstrapHtml('div','col demoBody', true);

        $bootstrapHtml->addTitle('Interface:');
        
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Factory/Pizza.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('Pizza3Cheese:');
        
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Factory/Pizza3Cheese.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('PizzaMargherita:');
        
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Factory/PizzaMargherita.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('PizzaChorizo:');
        
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Factory/PizzaChorizo.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('PizzaFactory:');
        
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Factory/PizzaFactory.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('Usage Code:');
        
        $data = '
        //get an object of Circle and call its draw method.
        $pizza1 = $this->factory->getPizza("chorizo");
        $res1 = $pizza1->made();
        //get an object of Rectangle and call its draw method.
        $pizza2 = $this->factory->getPizza("margherita");
        $res2= $pizza2->made();
        //get an object of Square and call its draw method.
        $pizza3 = $this->factory->getPizza("3Cheese");
        $res3 = $pizza3->made();';
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addSeparator();
        $bootstrapHtml->addTitle('Usage Code:');
        
        $bootstrapHtml->addSeparator();

        $bootstrapHtml->addTitle('Get Chorizo Pizza');
        
        $data = '
        $pizza1 = $this->factory->getPizza("chorizo");
        $res1 = $pizza1->made();';
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $result = $object = null;
        $object = $this->factory->getPizza("chorizo");
        $result = print_r($object->made(),1);
        $bootstrapHtml->addData($bootstrapHtml->addResult($result));
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('Get Margherita Pizza');
        
        $data = '
        $object = $this->factory->getPizza("margherita");
        $result = $pizza1->made();';
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $result = $object = null;
        $object = $this->factory->getPizza("margherita");
        $result = print_r($object->made(),1);
        $bootstrapHtml->addData($bootstrapHtml->addResult($result));
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('Get 3Cheese Pizza');
        
        $data = '
        $object = $this->factory->getPizza("3Cheese");
        $result = $pizza1->made();';
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $result = $object = null;
        $object = $this->factory->getPizza("3Cheese");
        $result = print_r($object->made(),1);
        $bootstrapHtml->addData($bootstrapHtml->addResult($result));
        $bootstrapHtml->endDiv();
        
        $bootstrapHtml->endData();
        return $bootstrapHtml->getData();

    }
    
}

