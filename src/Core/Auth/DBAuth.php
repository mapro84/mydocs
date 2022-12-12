<?php
namespace src\Core\Auth;

use src\Core\DB\DB;
use src\Core\Utils\Debug;
use src\app\user\AppUser;

class DBAuth {

	/**
	 * 
	 * @param String $username
	 * @param String $password
	 * @return boolean
	 */
	public static function login(String $username, String $password){
		$request = "SELECT * FROM appuser WHERE username= ? AND password= ?";
		$user = DB::prepare($request, [$username,sha1($password)], 'src\\app\\user\\Appuser', true);
		return $user === false ? false : $user;
	}
	
}

