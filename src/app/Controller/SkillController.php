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
		$this->messages['infos'] = $skills  !== false ? 'Skill got successfully' : '';
		$this->messages['errors'] = $skills  === false ? 'Request to get skills failed' : '';
		$entities = array('infos' => $this->messages['infos'],'errors' => $this->messages['errors'],'skills'=>$skills);
		$this->render('skills',$entities);
	}

	public function getDemosBySkillId($skill_id){
		return Demo::getDemosBySkillId($skill_id);
	}
	
	public function add(){
    $parameters = Check::makeSafeAssociativeArray($_POST);
		$resQuery['resQuery'] = Skill::insert('skill',$parameters);
		$this->messages['infos'] = $resQuery['resQuery']  !== false ? 'Skill added successfully' : '';
		$this->messages['errors'] = $resQuery['resQuery']  === false ? 'Skill not added' : '';
		$skills = Skill::getAll('skill');
		$entities = array('infos' => $this->messages['infos'],'errors' => $this->messages['errors'],'skills'=>$skills);
		$this->render('skills',$entities);
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
	
	public function itemsListBySkill($skill_id,$skill_name) {
		$items = Skill::findBy('item',$skill_id,'skill');
		$entities = array('items' => $items, 'skill_name' => $skill_name);
		$this->render('items',$entities);
	}
}

