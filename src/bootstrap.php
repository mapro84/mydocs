<?php
require_once(ROOTDIR."/src/conf/config.php");

use src\classes\Skill;
use src\classes\Htmlform;
use src\classes\Text;
use src\classes\Item;
use src\classes\Utils\Debug;


$skill = new Skill();
$skills = $skill->getAll();

/**
 * Routing
 */
ob_start();
if(isset($_GET['page']) && ($_GET['page'] === 'home' || $_GET['page'] === 'skills')){
    if($_GET['page'] === 'home'){
        require_once('./view/home.php');
    }elseif($_GET['page'] === 'skills'){
        require_once('./view/skills.php');
    }
}else{
    require_once('./view/home.php');
}
$content = ob_get_clean();
require_once('./templates/default.php');



?>