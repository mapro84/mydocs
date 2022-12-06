<?php
require_once(ROOTDIR."/src/conf/config.php");

use src\classes\Skill;
use src\classes\Utils\Check;
use src\classes\Utils\Debug;

$skill = new Skill();


ob_start();
/**
 * Routing
 */

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
    	$oneSkill = $skill->getSkill($skillId);
    	require_once('./view/skill.php');
		break;
	default: require_once('./view/home.php');
}

$content = ob_get_clean();
require_once('./templates/default.php');

?>