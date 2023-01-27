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

class SkillController extends AppController{

  private $boController;
	private $itemController;

  public function __construct(){
		parent::__construct();
		//$this->boController = new BOController();
    //$this->itemController = new ItemController();
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
		$this->messages['info'] = $result  === false ? 'Skill added successfully' : '';
		$this->messages['error'] = $result  !== false ? 'Error: Skill not added' : '';
		$this->boController = new BOController();
		$this->boController->show($this->messages);



		// function file_get_contents_curl($url) {
		// 	$ch = curl_init();
		
		// 	curl_setopt($ch, CURLOPT_HEADER, 0);
		// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// 	curl_setopt($ch, CURLOPT_URL, $url);
		
		// 	$data = curl_exec($ch);
		// 	curl_close($ch);
		
		// 	return $data;
		// }
		
		// $data = file_get_contents_curl(
		// 'https://media.geeksforgeeks.org/wp-content/uploads/geeksforgeeks-6-1.png');
		
		// $fp = 'logo-1.png';
		
		// file_put_contents( $fp, $data );
		// echo "File downloaded!";
		




	}

	public function update(){
    $parameters = Check::makeSafeAssociativeArray($_POST);
		$result = Skill::update('skill',$parameters);
		$this->messages['info'] = $result  === false ? 'Skill added successfully' : '';
		$this->messages['error'] = $result  !== false ? 'Error: Skill not added' : '';
		$this->itemController = new ItemController();
		$this->itemController->showByskillid($parameters['id'], $this->messages); 
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
		$this->itemController = new ItemController();
		$this->itemController->showByskillid($skill_id);
	}
	
	// public function itemsListBySkill($skill_id, array $messages=[]) {
	// 	$skill = Skill::find($skill_id,'skill');
	// 	$items = Skill::findBy('item',$skill_id,'skill');
	// 	$entities = array('items' => $items, 'skills' => $skill, 'messages' => $messages);
	// 	Debug::dump($entities);
	// 	$this->render('items',$entities);
	// }
}

