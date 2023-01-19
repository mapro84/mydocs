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
		$this->messages['info'] = empty($result) ? 'Url added successfully' : '';
		$this->messages['error'] = !empty($result) ? 'Error: Url not added' : '';
		$boController = new BOController();
		$boController->show($this->messages);
  }

  public function delete()
  {
    $parameters = Check::makeSafeAssociativeArray($_POST);
		$result = Url::deleteUrl($parameters);
    Debug::dump($result);
		$this->messages['info'] = empty($result) ? 'Url deleted successfully' : '';
		$this->messages['error'] = !empty($result) ? 'Error: Url not deleted' : '';
    $skill_id = $parameters['skill_id'];
    $itemController = new ItemController();
    $itemController->showByskillid($skill_id, $this->messages);
  }

}
	