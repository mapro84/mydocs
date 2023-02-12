<?php
use src\Core\Utils\Check;
use src\Core\Auth\DBAuth;
use src\app\Controller\SkillController;
use src\app\Controller\UserController;
use src\app\Controller\ItemController;
use src\app\Controller\HomeController;
use src\app\Controller\BOController;
use src\app\Controller\DemoController;
use src\app\Controller\NoteController;
use src\app\Controller\UrlController;
use src\app\Controller\TestController;

$skillController = new SkillController();
$itemController = new ItemController();
$userController = new UserController();
$homeController = new HomeController();
$demoController = new DemoController();
$boController   = new BOController();
$noteController = new NoteController();
$urlController  = new UrlController();
$testController = new TestController();

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
		if(Check::is_numeric($skill_id)) $itemController->showBySkillId($skill_id);
	break;
	case 'addskill':
		$skillController->add();
	break;
	case 'updateskill':
		$skillController->update();
	break;
	case 'deleteskill':
		$skillController->delete();
		break;
	case 'items':
		$skill_id = $_GET['skill_id'];
		if (Check::is_numeric($skill_id)) $skillController->itemsListBySkill($skill_id);
	break;
	case 'item':
		$itemid = $_GET['itemid'];
		$skill_name = addslashes($_GET['skill_name']);
		if (Check::is_numeric($itemid)) $itemController->show($itemid, $skill_name);
	break;
	case 'additem':
		$itemController->add();
	break;
	case 'updateurl':
		$urlController->update();
	break;
	case 'deleteurl':
		$urlController->delete();
	break;
	case 'addurltoitem':
		$urlController->add();
	break;
	case 'addnote':
		$noteController->add();
	break;
	case 'updatenote':
		$noteController->update();
	break;
	case 'deletenote':
		$note_id = $_POST['note_id'];
		if(Check::is_numeric($note_id)) $noteController->delete($note_id);
	break;
	case 'updateitem':
		$itemController->update();
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
			$boController->show();
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
	case 'search':
		$itemController->search();
		break;
    case 'test':
        $testController->test();
    break;
	default: $homeController->show();
}
?>