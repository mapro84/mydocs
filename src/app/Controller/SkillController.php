<?php
namespace src\app\Controller;

use src\app\Skill;
use src\Core\Utils\Debug;
use src\Core\Utils\Check;
use src\Core\DB\Entity;
use src\app\Demo;
use src\app\Url;
use src\app\Controller\ItemController;

class SkillController extends AppController{
	
	public function list() {
		$skills = Skill::getAll('skill');
		$this->messages['infos'] = $skills  !== false ? 'Skill got successfully' : '';
		$this->messages['errors'] = $skills  === false ? 'Request to get skills failed' : '';
		$entities = array('infos' => $this->messages['infos'],'errors' => $this->messages['errors'],'skills'=>$skills);
		$this->render('skills',$entities);
	}
	
	// public function show($skill_id) {
	// 	$skill = Skill::find($skill_id,'skill');
	// 	$items = Skill::findBy('item',$skill_id,'skill');
	// 	$relatedUrls = Url::findUrlsBy($skill_id,'skill');
	// 	$demos = $this->getDemosBySkillId($skill_id);
	// 	$entities = array('skill' => $skill, 'items' => $items, 'demos' => $demos,'urls'=>$relatedUrls);
 	// 	$this->render('skill',$entities);
	// }
	
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

	public function delete($skill_id){
		$resQuery['resQuery'] = Skill::delete('skill',$skill_id);
		array_push($this->messages['infos'],$resQuery);
		$this->list();
	}
	
	public function findByName($skill_name) {
		$skill = Skill::findByName('skill',$skill_name);
		$skill_id = $skill->id;
		$itemController = new ItemController();
		$itemController->showBySkillId($skill_id);
		// $items = Entity::findBy('item',$skill_id,'skill');
		// $urls = Url::findUrlsBy($skill_id,'skill');
		// $demos = $this->getDemosBySkillId($skill_id);
		// $entities = array('skill' => $skill, 'items' => $items,'demos' => $demos,'urls'=>$urls);
		// $this->render('skill',$entities);
	}
	
	public function itemsListBySkill($skill_id,$skill_name) {
		$items = Skill::findBy('item',$skill_id,'skill');
		$entities = array('items' => $items, 'skill_name' => $skill_name);
		$this->render('items',$entities);
	}
}

