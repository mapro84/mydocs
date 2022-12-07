<?php
namespace src\classes\Utils;

use src\classes\Config;

class Check {
	
	private static $genconf;
	
	public function __construct(){
		$this->genconf = Config::getGenConf();
		var_dump($this->genconf);
	}
	
	public static function is_numeric($int){
		$filteredValue = filter_var($int, FILTER_VALIDATE_INT);
		if($filteredValue === false) {
			throw(new \Exception('Exception: This value is not an integer \n'));
		} else {
// 			if( self::$genconf['DEBUG'] === true){
// 				echo $filteredValue . ' is an integer (type: ' . gettype($filteredValue) . ')';
// 			}
		}
	}
	
}

