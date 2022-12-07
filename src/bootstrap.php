<?php
use src\classes\Skill;
use src\classes\Utils\Check;
use src\classes\Item;
use src\classes\demos\factory\FactoryPatternDemo;

ob_start();
/**
 * Routing
 */

$skill = new Skill();
$item = new Item();
$factorydemo = new FactoryPatternDemo();

$page = isset($_GET['page']) ? $_GET['page'] : '';
switch ($page) {
	case 'home': 
		require_once('./view/home.php');
		break;
	case 'skills':
		$skills = $skill->getAll();
        require_once('./view/skills.php');
		break;
	case 'skill':
		$skillId = $_GET['skillid'];
        Check::is_numeric($skillId);
    	$oneSkill = $skill->find($skillId);
    	require_once('./view/skill.php');
		break;
	case 'items':
		$skillId = $_GET['skillid'];
		Check::is_numeric($skillId);
		$items = $item->findBy($skillId,'Skill');
		$skillname = addslashes($_GET['skillname']);
		// TODO see why the following does not work
		// $oneSkill = $skill->find($skillId);
		require_once('./view/items.php');
		break;
	case 'item':
		$itemid = $_GET['itemid'];
		Check::is_numeric($itemid);
		$oneItem = $item->find($itemid);
		$skillname = addslashes($_GET['skillname']);
		require_once('./view/item.php');
		break;
	case 'factorydemo':
		$demo = $factorydemo->demo();
		require_once('./view/demo.php');
		break;
	default: require_once('./view/home.php');
}

$content = ob_get_clean();
require_once('./templates/default.php');

?>