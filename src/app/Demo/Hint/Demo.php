<?php
namespace src\app\Demo\Hint;

use ReflectionClass;
use src\app\Demo\Hint\Hint;
use src\Core\Html\BootstrapHtml;
use \Exception;
use Throwable;

class Demo {

    private static $name;

    public function __construct(){
      self::$name = "Hint";
    }

    public static function demo(): string
    {

        $class = new Hint();
        $bootstrapHtml = new BootstrapHtml('div','col demoBody', true);

        $title = $bootstrapHtml->addTitle(self::$name.' Class:');
        $bootstrapHtml->addData($title);
        $classContent = htmlspecialchars(file_get_contents('src/app/Demo/Hint/Hint.php'));
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData($classContent);
        $bootstrapHtml->endDiv();
        
        $bootstrapHtml->addLine(1);
        $title = $bootstrapHtml->addTitle('Usage Code:');
        $bootstrapHtml->addData($title);
        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData('$hint->add(5,3);');
        $content = null;
        $content = $class->add(5,3);
        $bootstrapHtml->addData($bootstrapHtml->addResult($content));
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData('$hint->add(5,4.7);');
        $content = null;
        // Trigger an Error
        $content = $class->add(5,4.7);
        $bootstrapHtml->addData($bootstrapHtml->addResult($content));
        $bootstrapHtml->addData($bootstrapHtml->addComment('Deprecated: Implicit conversion from float 4.7 to int loses precision ...'));
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData('$hint->add(5,"11");');
        $content = null;
        $content = $class->add(5,"11");
        $bootstrapHtml->addData($bootstrapHtml->addResult($content));
        $bootstrapHtml->addData($bootstrapHtml->addComment('Convert "11" from string to integer'));
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData('$hint->add(5,"10four");');
        $content = null;
        // Trigger fatal Error
        // $content = $class->add(5,"10four");
        $bootstrapHtml->addData($bootstrapHtml->addResult($content));
        $bootstrapHtml->addData($bootstrapHtml->addComment('Fatal error: Uncaught TypeError: ...Hint::add(): Argument #2 ($y) must be of type int, string given'));
        $bootstrapHtml->endDiv();

        $bootstrapHtml->addDiv();
        $bootstrapHtml->addData('$hint->add(5,"computer");');
        $content = null;
        // To execute to see Fatal Error
        //$content = $class->add(5,"computer");
        $bootstrapHtml->addData($bootstrapHtml->addResult($content));
        $bootstrapHtml->addData($bootstrapHtml->addComment('Fatal error: Uncaught TypeError: Argument 2 ... must be of the type int, string given,...'));
        $bootstrapHtml->endDiv();

        $bootstrapHtml->endData();
        return $bootstrapHtml->getData();
    }
    
}

