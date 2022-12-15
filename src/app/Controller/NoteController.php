<?php
namespace src\app\Controller;

use src\Core\Utils\Debug;
use src\Core\Utils\Check;
use src\Core\DB\Entity;

class NoteController extends AppController{
	
	public function add(){
		$parameters = Check::makeSafeAssociativeArray($_POST,true);
		$resQuery['resQuery'] = Entity::insert('note',$parameters);
		array_push($this->messages['infos'],$resQuery);
		$notes = Entity::getAll('note');
		$entities = array('resQuery' => $resQuery, 'notes' => $notes);
		$this->render('home',$entities);
	}
	
	public function delete($skill_id){
		$resQuery['resQuery'] = Entity::delete('skill',$skill_id);
		array_push($this->messages['infos'],$resQuery);
		$entities = array('resQuery' => $resQuery);
		$this->render('home',$entities);
	}
	

}