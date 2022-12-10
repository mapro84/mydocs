<?php
namespace src\app\Controller;

use src\Core\Utils\Debug;

class BOController extends AppController{
	
	public function show($action) {
		$this->render('bo/bo');
	}
}

