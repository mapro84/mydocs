<?php
namespace src\app\Controller;

use src\Core\Utils\Debug;
use src\app\Controller\UserController;

class BOController extends AppController{
	
	public function show($action) {
// 		if(!isset($_SESSION)) { session_start(); }
		if(!isset($_SESSION['auth'])){
			$userController = new UserController();
			$userController->login();
		}else{
			array_push($this->messages['errors'],'error when logging');
			$entities = array('action' => $action);
			$this->render('bo',$entities);
		}
	}

}