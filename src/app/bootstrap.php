<?php

use src\Core\DIC\DIC;
use src\Core\Utils\Check;
use src\Core\Auth\DBAuth;

$dic = new DIC();

$skillController = $dic->getInstance('src\app\Controller\SkillController');
$itemController = $dic->getInstance('src\app\Controller\ItemController');
$userController = $dic->getInstance('src\app\Controller\UserController');
$homeController = $dic->getInstance('src\app\Controller\HomeController');
$demoController = $dic->getInstance('src\app\Controller\DemoController');
$boController = $dic->getInstance('src\app\Controller\BOController');
$noteController = $dic->getInstance('src\app\Controller\NoteController');
$urlController = $dic->getInstance('src\app\Controller\UrlController');
$testController = $dic->getInstance('src\app\Controller\TestController');

$page = $_GET['page'] ?? '';
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
