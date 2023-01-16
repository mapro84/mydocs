<?php
namespace src\app\Controller;

use src\Core\DB\Entity;
use src\Core\Utils\Debug;
use src\app\Controller\UserController;

class BOController extends AppController{
	
	public function show() {
		$skills = Entity::getAll('skill');
		$items = Entity::getAll('item');
		$entities = array('skills' => $skills, 'items' => $items);
		$this->render('bo',$entities);
	}

}