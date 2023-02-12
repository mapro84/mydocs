<?php
namespace src\app\Controller;

use src\Core\DB\Entity;
use src\Core\Utils\Check;
use src\Core\Utils\Debug;
use src\app\Controller\BOController;

class NoteController extends AppController{
	
	public function add(){
		$parameters = Check::makeSafeAssociativeArray($_POST);
		$result = Entity::insert('note',$parameters);
		$this->messages['info'] = $result  === false ? 'Note added successfully' : '';
		$this->messages['error'] = $result  !== false ? 'Error: Note not added' : '';
		$boController = new BOController();
		$boController->show($this->messages);
	}
	
	public function update(){
		$parameters = Check::makeSafeAssociativeArray($_POST);
		$result = Entity::update('note',$parameters);
		$this->messages['info'] = $result  === false ? 'Note updated successfully' : '';
		$this->messages['error'] = $result  !== false ? 'Error: Note not updated' : '';
		$notes = Entity::getAll('note');
		$entities = array('messages' => $this->messages, 'notes' => $notes);
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