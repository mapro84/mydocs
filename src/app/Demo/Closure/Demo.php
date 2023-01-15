<?php
namespace src\app\Demo\Closure;
use src\Core\Html\BootstrapHtml;

class Demo
{

  public function demo()
  {
    $bootstrapHtml = new BootstrapHtml('div', 'col demoBody', true);

    $bootstrapHtml->addTitle('Class Closure:');
    $data = htmlspecialchars(file_get_contents('src/app/Demo/Closure/Closure.php'));
    $bootstrapHtml->addDiv();
    $bootstrapHtml->addData($data);
    $bootstrapHtml->endDiv();

    $bootstrapHtml->addTitle('Code Usage:');
    $bootstrapHtml->addDiv();
    $data = '
    $closure = new Closure();
    $f = $closure->multiply(2);

    if ($f instanceof \Closure) {
      echo "An anonymous function is an instance of the Closure class";
    }

    $result = $f(2);
    echo $f(5); // 10
    echo $f(6); // 12

    $result = $f(5);
    echo $f(5); // 25
    echo $f(6); // 30
    ';
    $bootstrapHtml->addData($data);
    $closure = new Closure();
    $anonymousFunction = $closure->multiply(8);
    $data = print_r($anonymousFunction, 1);
    $bootstrapHtml->addResult($data);
    $bootstrapHtml->endDiv();

    $bootstrapHtml->addDiv();
    $bootstrapHtml->addTitle('Fonctions Arrow 2.0 (Short Closures) From PHP7.4:');
    $data = '
    // Use is no more required when in the same scope.
    // The param is caught by value
    // Bevore PHP7.4:
    $factor = 10;
    $calc = function($num) use($factor){
	    return $num * $factor;
    };
    // From PHP7.4
    $factor = 10;
    $calc = fn($num) => $num * $factor;
    print_r($calc(7)); // 70
    ';
    $bootstrapHtml->addData($data);
    $closure = new Closure();
    $anonymousFunction = $closure->multiply(8);
    $data = print_r($anonymousFunction, 1);
    $bootstrapHtml->addResult($data);
    $bootstrapHtml->endDiv();

    // Small little trick. You can use a closures in itself via reference.
    // Example to delete a directory with all subdirectories and files:
    // $deleteDirectory = null;
    // $deleteDirectory = $closure->deleteDirectory($deleteDirectory);
    // $deleteDirectory("./test");


    $bootstrapHtml->endData();
    return $bootstrapHtml->getData();

  }

}