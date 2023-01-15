<?php
namespace src\app\Controller;

use src\Core\Utils\Debug;
use src\app\Controller\UserController;

class BOController extends AppController{
	
	public function show() {
		$this->render('bo');
	}

}