<?php
namespace src\app\Controller;

use src\app\Item;
use src\Core\Utils\Debug;

class ItemController extends AppController{
	
	public function list() {
		$items = Item::getAll('item');
		$this->render('items',$items);
	}
	
	public function show($item_id,$skill_name) {
		$item = Item::find($item_id,'item');
		$demos = Item::findBy('demo',$item_id,'item');
		$urls =  Item::findBy('url',$item_id,'item');
 		$entities = array('item' => $item, 'demos' => $demos, 'urls' => $urls, 'skill_name' => $skill_name);
 		$this->render('item',$entities);
	}
	
	public function delete($item_id){
// 		  		echo 'ici item'; var_dump($item_id);die();
		array_push($resQuery['resQuery'],Item::deleteBy('demo',$item_id,'item'));
		array_push($resQuery['resQuery'],Item::deleteBy('url',$item_id,'item'));
		array_push($resQuery['resQuery'],Item::delete('item',$item_id));
		array_push($this->messages['infos'],$resQuery);
		$entities = array('resQuery' => $resQuery);
		$this->render('home',$entities);
	}
	
}

