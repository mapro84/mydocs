<?php
namespace src\app\Controller;

use src\Core\Utils\Debug;
use src\Core\DB\Entity;

class HomeController extends AppController{
	
	public function show() {
		$notes = Entity::getAll('note');
		$entities = ['notes' => $notes];
		$this->render('home',$entities);
	}
}

