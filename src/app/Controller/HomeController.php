<?php
namespace src\app\Controller;

use src\Core\Utils\Debug;

class HomeController extends AppController{
	
	public function show() {
		$this->render('home');
	}
}

