<?php
namespace src\app\Demo\Fluent;

use src\app\Demo\Fluent\QueryBuilder;
use src\Core\Html\BootstrapHtml;

class Demo {

    private $factory;

    // Dependency injection
    public function __construct(){
    }
    
    public static function demo(){

        $bootstrapHtml = new BootstrapHtml('div','col demoBody', true);

        $bootstrapHtml->addTitle('Class QueryBuilder:');
        
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Fluent/QueryBuilder.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('Code Usage:');
        
        $data = '$queryBuilder->select("id", "name", "description")->from("skill", "capability")->where("capability.name = "PHP"")->where("capability.logo = "php.png");';
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('Result:');
        
        $bootstrapHtml->addDiv();
        $queryBuilder = new QueryBuilder();
        $queryBuilder->select('id', 'name', 'description')->from('skill', 'capability')->where('capability.name = "PHP"')->where('capability.logo = "php.png"');
        $result = $queryBuilder->__toString();
        $bootstrapHtml->addData($result);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->endData();
        return $bootstrapHtml->getData();
    	
    }
    
}

