<?php
namespace src\app\Controller;

use src\app\Item;
use src\Core\Utils\Debug;
use src\Core\Utils\Check;
use src\Core\DB\Entity;

class ItemController extends AppController{
	
	private $skillController;
	
	public function __construct(){
		parent::__construct();
		$this->skillController = new SkillController();
	}
	
// 	public function list() {
// 		$items = Item::getAll('item');
// 		$this->render('items',$items);
// 	}
	
	public function show($item_id,$skill_name) {
		$item = Item::find($item_id,'item');
		$demos = Item::findBy('demo',$item_id,'item');
		$urls =  Item::findBy('url',$item_id,'item');
 		$entities = array('item' => $item, 'demos' => $demos, 'urls' => $urls, 'skill_name' => $skill_name);
 		$this->render('item',$entities);
	}

	public function add(){
		$parameters = Check::makeSafeAssociativeArray($_POST,true);
		Entity::insert('item',$parameters);
		$this->skillController->show($parameters['skill_id']);
	}
	
	public function addUrl(){
		$parameters = Check::makeSafeAssociativeArray($_POST,true);
		Entity::insert('url',$parameters);
		$item = Entity::find($parameters['item_id'],'item');
		$this->skillController->show($item->skill_id);
	}
	
	public function addDemo(){
		$parameters = Check::makeSafeAssociativeArray($_POST,true);
		Entity::insert('demo',$parameters);
		$item = Entity::find($parameters['item_id'],'demo');
		$this->skillController->show($item->skill_id);
	}

	public function edit($item_id) {
		$item = Item::find($item_id,'item');
		$entities = array('item' => $item, 'action' => 'update', 'entity' => 'item');
		$this->render('bo',$entities);
	}
	
	public function update($item_id) {
		$parameters = Check::makeSafeAssociativeArray($_POST,true);
		Entity::update('item',$parameters);
		$item = Item::find($item_id,'item');
		$skill = Entity::find($item->skill_id,'skill');
		$items = Entity::findBy('item',$item->skill_id,'skill');
		$entities = array('skill' => $skill, 'items' => $items);
		$this->render('skill',$entities);
	}
	
	public function delete($item_id){
		Item::deleteBy('demo',$item_id,'item');
		Item::deleteBy('url',$item_id,'item');
		Item::delete('item',$item_id);
		$this->render('home');
	}
	
}

