<?php
namespace src\app\Controller;

use src\app\Entity\Url;
use src\Core\DB\Entity;
use src\Core\Utils\Check;
use src\Core\Utils\Debug;
use src\app\Controller\BOController;
use src\app\Controller\AppController;
use src\app\Controller\HomeController;
use src\app\Controller\SkillController;

class UrlController extends AppController
{
  public function add()
  {
    $parameters = Check::makeSafeAssociativeArray($_POST);
    $arrayResult = Url::addUrl($parameters);
    $result = empty($arrayResult) ? false : true;
		$this->messages['info'] = $result  === false ? 'Url added successfully' : '';
		$this->messages['error'] = $result  !== false ? 'Error: Url not added' : '';
		$boController = new BOController();
		$boController->show($this->messages);
  }

  public function delete()
  {
    $parameters = Check::makeSafeAssociativeArray($_POST);
		$result = Url::deleteUrl($parameters);
		$this->messages['info'] = $result  === false ? 'Url deleted successfully' : '';
		$this->messages['error'] = $result  !== false ? 'Error: Url not deleted' : '';
    $skill_id = $parameters['skill_id'];
    $skill = Entity::find($skill_id, 'skill');
    $skillController = new SkillController();
    $skillController->itemsListBySkill($skill_id, $skill->name,$this->messages);
  }

}
	