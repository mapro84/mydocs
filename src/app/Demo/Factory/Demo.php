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

        $title = $bootstrapHtml->addTitle('Interface:');
        $bootstrapHtml->addData($title);
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Factory/Pizza.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $title = $bootstrapHtml->addTitle('Pizza3Cheese:');
        $bootstrapHtml->addData($title);
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Factory/Pizza3Cheese.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $title = $bootstrapHtml->addTitle('PizzaMargherita:');
        $bootstrapHtml->addData($title);
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Factory/PizzaMargherita.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $title = $bootstrapHtml->addTitle('PizzaChorizo:');
        $bootstrapHtml->addData($title);
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Factory/PizzaChorizo.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $title = $bootstrapHtml->addTitle('PizzaFactory:');
        $bootstrapHtml->addData($title);
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Factory/PizzaFactory.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $title = $bootstrapHtml->addTitle('Usage Code:');
        $bootstrapHtml->addData($title);
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
        $title = $bootstrapHtml->addTitle('Usage Code:');
        $bootstrapHtml->addData($title);
        $bootstrapHtml->addSeparator();

        $title = $bootstrapHtml->addTitle('Get Chorizo Pizza');
        $bootstrapHtml->addData($title);
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

        $title = $bootstrapHtml->addTitle('Get Margherita Pizza');
        $bootstrapHtml->addData($title);
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

        $title = $bootstrapHtml->addTitle('Get 3Cheese Pizza');
        $bootstrapHtml->addData($title);
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

