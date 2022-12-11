<?php
namespace src\app\Controller;

use src\app\user\AppUser;
use src\Core\Utils\Check;
use src\Core\Auth\DBAuth;
use src\Core\Config\Config;

class UserController extends AppController {
	
	private $user;

	public function login(){
		//session_destroy();
		echo __LINE__;var_dump($_POST);
		if(isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(Check::is_safe_string($username)  && Check::is_safe_password($password)){
				//echo "<br>".__LINE__;var_dump($_POST);
				$this->providePrivilege($username,$password);
			}else{
				array_push($this->messages['errors'], "Seems Malicious Login");
			}
		}else{
			$entities = ['messages' => $this->messages];
	        $this->render('user/login',$entities);
		}
	    
	}
	
	private function providePrivilege($username,$password){
		$this->user = DBAuth::login($username,$password);
		//echo "<br>".__LINE__;var_dump($this->user);
		if($this->user !== false){
			if($this->user->privilege_id == '1'){
				//echo "<br>".__LINE__;var_dump($this->user);
				$this->logUser();
				$entities = array('action' => 'add');
				$this->render('bo',$entities);
			}else{
				array_push($this->messages['errors'], "You are not administrator");
			}
		}else{
			array_push($this->messages['errors'], "Incorrect Login");
		}
	}
	
	private function logUser(){
		//echo "<br>".__LINE__;var_dump($this->user);
		$cookie_lifetime = Config::getGenConfKey('cookie_lifetime');
		session_start(['cookie_lifetime' => $cookie_lifetime]);
		$_SESSION['auth'] = $this->user->id;
	}
	
	public static function islogged(){
		return isset($_SESSION['auth']);
	}

}

