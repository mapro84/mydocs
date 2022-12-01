<?php
require_once(ROOTDIR."/src/conf/config.php");

use src\classes\Course;
use src\classes\Htmlform;
use src\classes\Text;
use src\classes\Item;
use src\classes\Utils\Debug;


$course = new Course();
$courses = $course->getAll();

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
require_once('./templates/default.php');



?>