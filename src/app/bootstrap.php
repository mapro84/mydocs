<?php
use src\app\Skill;
use src\Core\Utils\Check;
use src\app\Item;
use src\app\Demo;
use src\app\Url;
use src\app\demos\factory\FactoryPatternDemo;
use src\Core\Auth\DBAuth;

use src\app\Controller\SkillController;
use src\app\Controller\UserController;
use src\app\Controller\ItemController;
use src\app\Controller\HomeController;

$DBAuth = new DBAuth();
$DBAuth->login('admin','admin');

// ob_start();
$skill = new Skill();
$item = new Item();
$demo = new Demo();
$factorydemo = new FactoryPatternDemo();


$skillController = new SkillController();
$itemController = new ItemController();
$userController = new UserController();
$homeController = new HomeController();


$page = isset($_GET['page']) ? $_GET['page'] : '';
switch ($page) {
	case 'home': 
		$homeController->show();
		break;
	case 'skills':
		$skillController->list();
// 		if(isset($_GET['action']) && Check::is_safe_string($_GET['action'])){
// 			echo '';die();
// 			if(Check::is_safe_string($_POST['action'])){
				
// 			}
// 		}else{
// 			echo 'NOOOOOO'; die();
// 		}
		break;
	case 'skill':
		$skill_id = $_GET['skill_id'];
        if(Check::is_numeric($skill_id)) $skillController->show($skill_id);
		break;
	case 'items':
		$skill_id = $_GET['skill_id'];
		$skill_name = addslashes($_GET['skill_name']);
		if (Check::is_numeric($skill_id)) $skillController->itemsListBySkill($skill_id,$skill_name);
		break;
	case 'item':
		$itemid = $_GET['itemid'];
		$skill_name = addslashes($_GET['skill_name']);
		if (Check::is_numeric($itemid)) $itemController->show($itemid, $skill_name);
		break;
	case 'skill_name':
		$skill_name = addslashes($_GET['name']);
		if(Check::is_safe_string($skill_name)){
			$skillController->findByName($skill_name);
		}
		break;
		
		$skill_name = addslashes($_GET['name']);
		$oneSkill = $skill->findByName('skill',$skill_name);
		$skill_id = $oneSkill->id;
		$demos = $demo->findBy('demo',$skill_id,'skill');
		$urls = $demo->findBy('url',$skill_id,'skill');
		require_once('./src/app//view/skill.php');
		break;
	case 'bo':
		$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';
		require_once('./src/app//view/bo/bo.php');
		break;
	case 'login':
		
		$userController->login();
		
// 		require_once('./src/app//view/user/login.php');
		break;
	case 'factorydemo':
		$demo = $factorydemo->demo();
		require_once('./src/app//view/demos/factory.php');
		break;
	default: require_once('./src/app//view/home.php');
}

//  $content = ob_get_clean();
// require_once('./src/app//view/default.php');

?>