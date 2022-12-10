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

$DBAuth = new DBAuth();
$DBAuth->login('admin','admin');

ob_start();
$skill = new Skill();
$item = new Item();
$demo = new Demo();
$factorydemo = new FactoryPatternDemo();


$skillController = new SkillController();
$userController = new UserController();


$page = isset($_GET['page']) ? $_GET['page'] : '';
switch ($page) {
	case 'home': 
		require_once('./src/app//view/home.php');
		break;
	case 'skills':
		
		$skillController->list();
		
// 		$skills = $skill->getAll('skill');
// 		if(isset($_GET['action']) && Check::is_safe_string($_GET['action'])){
// 			echo '';die();
// 			if(Check::is_safe_string($_POST['action'])){
				
// 			}
// 		}else{
// 			echo 'NOOOOOO'; die();
// 		}
//         require_once('./src/app//view/skills.php');
		break;
	case 'skill':
		
		$skillController->show();
		
// 		$skill_id = $_GET['skillid'];
//         Check::is_numeric($skill_id);
//     	$oneSkill = $skill->find($skill_id,'skill');
//     	$demos = $demo->findBy('demo',$skill_id,'skill');
//     	$urls = $demo->findBy('url',$skill_id,'skill');
//     	require_once('./src/app//view/skill.php');
		break;
	case 'items':
		
		$skillController->itemsList();
		
// 		$skill_id = $_GET['skillid'];
// 		Check::is_numeric($skill_id);
// 		$skillname = addslashes($_GET['skillname']);
// 		$items = $item->findBy('item',$skill_id,'skill');
// 		require_once('./src/app//view/items.php');
		break;
	case 'item':
		$itemid = $_GET['itemid'];
		Check::is_numeric($itemid);
		$oneItem = $item->find($itemid,'item');
		$skillname = addslashes($_GET['skillname']);
		require_once('./src/app//view/item.php');
		break;
	case 'skillname':
		$skillname = addslashes($_GET['name']);
		$oneSkill = $skill->findByName('skill',$skillname);
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

$content = ob_get_clean();
require_once('./src/app//view/default.php');

?>