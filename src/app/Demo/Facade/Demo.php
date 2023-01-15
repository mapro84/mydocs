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

        $title = $bootstrapHtml->addTitle('Class Facade:');
        $bootstrapHtml->addData($title);
        $data = htmlspecialchars(file_get_contents('src/app/Demo/Facade/Facade.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $title = $bootstrapHtml->addTitle('Code Usage:');
        $bootstrapHtml->addData($title);
        $data = '
        $args = ["class"];
        Facade::callStatic("get",$args);';
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($data);
        $bootstrapHtml->endDiv();

        $title = $bootstrapHtml->addTitle('Result:');
        $bootstrapHtml->addData($title);
        $bootstrapHtml->addDiv();
        $args = ['class'];
        // $result = Facade::callStatic('get',$args);
        // $bootstrapHtml->addData($result);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->endData();
        return $bootstrapHtml->getData();



    }
    
}

