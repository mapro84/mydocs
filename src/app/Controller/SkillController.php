<?php
namespace src\app\Controller;

use src\app\Entity\Url;
use src\Core\DB\Entity;
use src\app\Entity\Demo;
use src\app\Entity\Item;
use src\app\Entity\Skill;
use src\Core\Utils\Check;
use src\Core\Utils\Debug;
use src\app\Controller\BOController;
use src\app\Controller\AppController;
use src\app\Controller\ItemController;
use src\Core\Image\AppImage;

class SkillController extends AppController{

  public function __construct(){
		parent::__construct();
	}

	public function list(array $messages = []) {
		$skills = Skill::getAll('skill');
		$entities = array('messages' => $messages, 'skills'=>$skills);
		$this->render('skills',$entities);
	}

	public function getDemosByskillid($skill_id){
		return Demo::getDemosByskillid($skill_id);
	}
	
	public function add(){
    $parameters = Check::makeSafeAssociativeArray($_POST);
		$result = Skill::insert('skill',$parameters);
        //AppImage::add($parameters['name']);
		$this->messages['info'] = $result  === false ? 'Skill added successfully' : '';
		$this->messages['error'] = $result  !== false ? 'Error: Skill not added' : '';
		$boController = new BOController();
		$boController->show($this->messages);
	}

	public function update(){
    $parameters = Check::makeSafeAssociativeArray($_POST);
		$result = Skill::update('skill',$parameters);
		$this->messages['info'] = $result  === false ? 'Skill added successfully' : '';
		$this->messages['error'] = $result  !== false ? 'Error: Skill not added' : '';
		$this->itemController = new ItemController();
		$this->itemController->showBySkillId($parameters['id'], $this->messages);
	}

	public function delete(){
		$parameters = Check::makeSafeAssociativeArray($_POST);
		Item::deleteItemsByskillid($parameters['id']);
		$result = Skill::delete('skill',$parameters['id']);
		$this->messages['info'] = empty($result)  === true ? 'Skill deleted successfully' : '';
		$this->messages['error'] = empty($result)  === false ? 'Error: Skill not deleted' : '';
		$this->list($this->messages);
	}
	
	public function findByName($skill_name) {
		$skill = Skill::findByName('skill',$skill_name);
		$skill_id = $skill->id;
		$itemController = new ItemController();
		$itemController->showBySkillId($skill_id);
	}

}
