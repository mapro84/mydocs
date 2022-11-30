<?php
require_once("./vendor/autoload.php");

use src\classes\Course;
use src\classes\Htmlform;
use src\classes\Text;
use src\classes\Item;
use src\classes\Utils\Debug;


/**
 * Routing
 */


ob_start();
if(isset($_GET['page']) && ($_GET['page'] === 'home' || $_GET['page'] === 'lessons')){
    if($_GET['page'] === 'home'){
        require_once('./view/home.php');
    }elseif($_GET['page'] === 'lessons'){
        require_once('./view/lessons.php');
    }
}else{
    require_once('./view/home.php');
}
$content = ob_get_clean();
$c = 'ooooooo';
require_once('./templates/default.php');

/*
$form = new Htmlform(array(1 => 'January', 'February', 'March'));
var_dump($form->getData());
$course = new Course('Python');
var_dump($course->getName());
$firstquarter = array(1 => 'January', 'February', 'March');
print_r($firstquarter);
$form = new Htmlform(array(1 => 'January', 'February', 'March'));
$int = 4;
var_dump(Text::getIntegerPrefix($int));
var_dump(Text::getCurrency());
$item = new Item('variable');
var_dump($item->getName());
$item->setName('for loop');
var_dump($item->name);
var_dump($item->getName());
$v = array('toto' => 'titi');
//Debug::getSeparation();
Debug::dump($v, 'Item name');
//Debug::getSeparation();
*/

?>