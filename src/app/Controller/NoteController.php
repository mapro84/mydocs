<?php
namespace src\app\Controller;

use src\Core\Utils\Debug;
use src\Core\Utils\Check;
use src\Core\DB\Entity;

class NoteController extends AppController{
	
	public function add(){
		$parameters = Check::makeSafeAssociativeArray($_POST);
		$resQuery['resQuery'] = Entity::insert('note',$parameters);
		array_push($this->messages['infos'],$resQuery);
		$notes = Entity::getAll('note');
		$entities = array('resQuery' => $resQuery, 'notes' => $notes);
		$this->render('home',$entities);
	}
	
	public function update(){
		$parameters = Check::makeSafeAssociativeArray($_POST);
		$resQuery['resQuery'] = Entity::update('note',$parameters);
		array_push($this->messages['infos'],$resQuery);
		$notes = Entity::getAll('note');
		$entities = array('resQuery' => $resQuery, 'notes' => $notes);
		$this->render('home',$entities);
	}

	public function delete($note_id){
		$resQuery['resQuery'] = Entity::delete('note',$note_id);
		array_push($this->messages['infos'],$resQuery);
		$notes = Entity::getAll('note');
		$entities = array('resQuery' => $resQuery, 'notes' => $notes);
		$this->render('home',$entities);
	}

}