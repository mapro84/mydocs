<?php
namespace src\app\Controller;

use src\app\Entity\Url;
use src\Core\DB\Entity;
use src\app\Entity\Demo;
use src\app\Entity\Item;
use src\app\Entity\Skill;
use src\Core\Utils\Check;
use src\Core\Utils\Debug;
use src\app\Controller\ItemController;

class SkillController extends AppController{
	
	public function list() {
		$skills = Skill::getAll('skill');
		$this->messages['error'] = $skills  === false ? 'Request to get skills failed' : '';
		$entities = array('messages' => $this->messages,'skills'=>$skills);
		$this->render('skills',$entities);
	}

	public function getDemosBySkillId($skill_id){
		return Demo::getDemosBySkillId($skill_id);
	}
	
	public function add(){
    $parameters = Check::makeSafeAssociativeArray($_POST);
		$result = Skill::insert('skill',$parameters);
		$this->messages['info'] = $result  === false ? 'Skill added successfully' : '';
		$this->messages['error'] = $result  !== false ? 'Error: Skill not added' : '';
		$boController = new BOController();
		$boController->show($this->messages);
	}

	public function delete(){
		$parameters = Check::makeSafeAssociativeArray($_POST);
		$resQuery['resQueryDelItems'] = Item::deleteItemsBySkillId($parameters['id']);
		$resQuery['resQueryDelSkill'] = Skill::delete('skill',$parameters['id']);
		array_push($this->messages['infos'],$resQuery);
		$this->list();
	}
	
	public function findByName($skill_name) {
		$skill = Skill::findByName('skill',$skill_name);
		$skill_id = $skill->id;
		$itemController = new ItemController();
		$itemController->showBySkillId($skill_id);
	}
	
	public function itemsListBySkill($skill_id,$skill_name,array $messages=[]) {
		$items = Skill::findBy('item',$skill_id,'skill');
		$entities = array('items' => $items, 'skill_name' => $skill_name, 'messages' => $messages);
		$this->render('items',$entities);
	}
}

