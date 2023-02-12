<?php
namespace src\app\Demo\Facade;

use src\app\Demo\Facade\Facade;
use src\Core\Html\BootstrapHtml;

class Demo {

    private $factory;

    public static function demo(){

    	$facade = new Facade();
        // TODO why it Does not work. should call _callStatic
        // QueryBuilder::select('id', 'name', 'description')->from('skill', 'capability')->where('capability.name = "PHP"')->where('capability.logo = "php.png"');
        // $args = ['class'];
        // $result = Facade::callStatic('get',$args);

        $bootstrapHtml = new BootstrapHtml('div','col demoBody', true);

        $bootstrapHtml->addTitle('Class Facade:');
        
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Facade/Facade.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('Code Usage:');
        
        $data = '
        $args = ["class"];
        Facade::callStatic("get",$args);';
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addTitle('Result:');
        
        $bootstrapHtml->addDiv();
        $args = ['class'];
        // $result = Facade::callStatic('get',$args);
        // $bootstrapHtml->addData($result);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->endData();
        return $bootstrapHtml->getData();



    }
    
}

