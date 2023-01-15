<?php
namespace src\app\Controller;

use src\app\user\AppUser;
use src\Core\Utils\Check;
use src\Core\Auth\DBAuth;
use src\Core\Config\Config;

class UserController extends AppController {
	
	private $user;

	public function login(){

		if(isset($_POST['username']) && isset($_POST['password'])){
			$username = addslashes($_POST['username']);
			$password = addslashes($_POST['password']);
			if(Check::is_safe_string($username)  && Check::is_safe_password($password)){
				$this->providePrivilege($username,$password);
			}else{
				array_push($this->messages['errors'], "Seems Malicious Login");
				$entities = ['messages' => $this->messages];
				$this->render('user/login',$entities);
			}
		}else{
			$entities = ['messages' => $this->messages];
        	$this->render('user/login',$entities);
		}
		
		return true;
	}
	
	private function providePrivilege($username,$password){
		$this->user = DBAuth::login($username,$password);
		if($this->user !== false){
			if($this->user->privilege_id == '1'){
				$this->logUser();
				$boController = new BOController();
				$boController->show('add');
			}else{
				array_push($this->messages['infos'], "You are loggued as Invited");
				array_push($this->messages['infos'], "For more privilege ask your Administrator");
				$entities = ['messages' => $this->messages];
				$this->render('user/login',$entities);
			}
		}else{
			array_push($this->messages['errors'], "Login incorrect");
			$entities = ['messages' => $this->messages];
			$this->render('user/login',$entities);
		}
		
		return true;
	}
	
	private function logUser(){
		//Set the session cookie with SameSite=None
		$params = session_get_cookie_params();
		$params['samesite'] = 'None';
		session_set_cookie_params($params);
		
		//Create a session
		$cookie_lifetime = Config::getGenConfKey('cookie_lifetime');
		if(!isset($_SESSION)) { 
			session_start(['cookie_lifetime' => $cookie_lifetime]);
		}
		
		//Set the session variable
		$_SESSION['auth'] = $this->user->id;
		
		setcookie('user', $this->user->username, $cookie_lifetime);
		
		return true;
	}

	public function disconnect(){
		if(isset($_SESSION)) { 
			unset($_SESSION['auth']);
			session_destroy(); 
		}
		$homeController = new HomeController();
		$homeController->show();
	}
	
	public static function islogged(){
		return isset($_SESSION['auth']) ? $_SESSION['auth'] : NULL;
	}

}

