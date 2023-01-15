<?php
namespace src\app\Demo\DIC;

use ReflectionClass;
use src\app\Demo\DIC\Connection;
use src\app\Demo\DIC\Model;
use src\app\Demo\DIC\DIC;
use src\Core\Html\BootstrapHtml;

class Demo {

    private $factory;

    public static function demo(): string
    {

        $dic = new DIC();
        $connection = new Connection('dbname', 'root', 'root');
        // return always the same instance
        $dic->set('Connection', function () use ($connection) {
            return $connection;
        });
        // return different instances
        $dic->setFactory('Model', function () use ($dic) {
            return new Model($dic->getInstance('Connection'));
        });

        $dic->set('Model', function () use ($connection) {
            return $connection;
        });

        $dicClass = htmlspecialchars(file_get_contents('src/app/Demo/DIC/DIC.php'));
        $connectionClass = htmlspecialchars(file_get_contents('src/app/Demo/DIC/Connection.php'));
        $modelClass = htmlspecialchars(file_get_contents('src/app/Demo/DIC/Model.php'));

        $bootstrapHtml = new BootstrapHtml('div','col demoBody', true);

        $title = $bootstrapHtml->addTitle('DIC Class:');
        $bootstrapHtml->addData($title);
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($dicClass);
        $bootstrapHtml->endDiv();

        $title = $bootstrapHtml->addTitle('Connection Class:');
        $bootstrapHtml->addData($title);
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($connectionClass);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addSeparator();
        $title = $bootstrapHtml->addTitle('Model Class:');
        $bootstrapHtml->addData($title);
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($modelClass);
        $bootstrapHtml->endDiv();

        $title = $bootstrapHtml->addTitle('Usage Code:');
        $bootstrapHtml->addData($title);
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData('$dic = new DIC();
        $connection = new Connection("dbname", "root", "root");

        // return always the same instance
        $dic->set("Connection", function () use ($connection) {
            return $connection;
        });

        // return different instances
        $dic->setFactory("Model", function () use ($dic) {
            return new Model($dic->get("Connection"));
        });');
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addSeparator();
        $title = $bootstrapHtml->addTitle('Results:');
        $bootstrapHtml->addData($title);
        $bootstrapHtml->addSeparator();
        
        $title = $bootstrapHtml->addTitle('Object returned by $dic->get(Connection"):');
        $bootstrapHtml->addData($title);
        $content = print_r($dic->getInstance('Connection'), true);
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($content);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addSeparator();
        $title = $bootstrapHtml->addTitle('Object returned by  $dic->get("Model"):');
        $bootstrapHtml->addData($title);
        $content = print_r($dic->getFactory('Model'), true);
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($content);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addSeparator();
        $title = $bootstrapHtml->addTitle('Object returned by $instance = $dic->get("Connection"):');
        $bootstrapHtml->addData($title);
        $instance = $dic->getInstance('Connection');
        $content = print_r($instance, true);
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($content);
        $bootstrapHtml->endDiv();

        $bootstrapHtml->endData();

        return $bootstrapHtml->getData();
    }
    
}

