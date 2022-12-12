<?php
namespace src\app\Controller;

use src\app\Skill;
use src\Core\Utils\Debug;
use src\Core\Utils\Check;

class SkillController extends AppController{
	
	public function list() {
		$skills = Skill::getAll('skill');
		$this->render('skills',$skills);
	}
	
	public function show($skill_id) {
		$skill = Skill::find($skill_id,'skill');
		$demos = Skill::findBy('demo',$skill_id,'skill');
		$urls =  Skill::findBy('url',$skill_id,'skill');
 		$entities = array('skill' => $skill, 'demos' => $demos, 'urls' => $urls);
 		$this->render('skill',$entities);
	}
	
	public function delete($skill_id){
//  		echo 'ici'; var_dump($skill_id);die();
		$resQuery['resQuery'] = Skill::delete('skill',$skill_id);
		array_push($this->messages['infos'],$resQuery);
		$entities = array('resQuery' => $resQuery);
		$this->render('home',$entities);
	}
	
	public function findByName($skill_name) {
		$skill = Skill::findByName('skill',$skill_name);
		$skill_id = $skill->id;
		$demos = Skill::findBy('demo',$skill_id,'skill');
		$urls =  Skill::findBy('url',$skill_id,'skill');
		$entities = compact($skill,$demos,$urls);
		$entities = array('skill' => $skill, 'demos' => $demos, 'urls' => $urls);
		$this->render('skill',$entities);
	}
	
	public function itemsListBySkill($skill_id,$skill_name) {
		$items = Skill::findBy('item',$skill_id,'skill');
		$entities = array('items' => $items, 'skill_name' => $skill_name);
		$this->render('items',$entities);
	}
}

