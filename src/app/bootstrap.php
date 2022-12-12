<?php
use src\Core\Utils\Check;
use src\Core\Auth\DBAuth;
use src\app\Controller\SkillController;
use src\app\Controller\UserController;
use src\app\Controller\ItemController;
use src\app\Controller\HomeController;
use src\app\Controller\BOController;
use src\app\Controller\DemoController;

$skillController = new SkillController();
$itemController = new ItemController();
$userController = new UserController();
$homeController = new HomeController();
$demoController = new DemoController();
$boController   = new BOController();


$page = isset($_GET['page']) ? $_GET['page'] : '';
switch ($page) {
	case 'home': 
		$homeController->show();
		break;
	case 'skills':
		$skillController->list();
		break;
	case 'skill':
		$skill_id = $_GET['skill_id'];
		if(Check::is_numeric($skill_id)) $skillController->show($skill_id);
		break;
	case 'deleteskill':
		$skill_id = $_POST['skill_id'];
		if(Check::is_numeric($skill_id)) $skillController->delete($skill_id);
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
	case 'deleteitem':
		$item_id = $_POST['item_id'];
		if(Check::is_numeric($item_id)) $itemController->delete($item_id);
		break;
	case 'skill_name':
		$skill_name = addslashes($_GET['name']);
		if(Check::is_safe_string($skill_name)){
			$skillController->findByName($skill_name);
		}
		break;
	case 'bo':
		if(isset($_GET['action'])){
			$boController->show($_GET['action']);
		}else{
			$boController->show('add');
		}
		break;
	case 'login':
		$userController->login();
		break;
	case 'disconnect':
		$userController->disconnect();
		break;
	case 'demo':
		$demo_id = $_GET['demo_id'];
		if(Check::is_numeric($demo_id)) $demoController->show($demo_id);
		break;
	default: $homeController->show();
}
?>