<?php
namespace src\Core\Utils;

use src\Core\Config\Config;
use src\Core\Utils\Debug;

class Check {
	
	private static $genconf;
	
	public function __construct(){
		$this->genconf = Config::getGenConf();
	}
	
	public static function is_numeric($int){
		$filteredValue = filter_var($int, FILTER_VALIDATE_INT);
		if($filteredValue === false) {
			throw(new \Exception('Exception: This value is not an integer \n'));
		}else{
			return true;
		}
	}
	
	public static function is_safe_string($str,$spaces=false){
		$check = false;
		if($spaces === true){
			if (preg_match('/^[A-Za-z\s]+$/', $string)) {
				$check = true;
			}
		}else{
			if (preg_match('/^[a-zA-Z]+$/', $str)) {
				$check = true;
			}
		}
		return $check;
	}
	
	/**
	 * Password preg_match with letters and at least 1 special character, 1 integer and an uppercase letter 
	 * @param String $password
	 * @return boolean
	 */
	public static function is_safe_password(String $password){
		$match = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/';
		if (preg_match($match, $password)) {
			return true;
		}else{
			return false;
		}
	}
	
}

