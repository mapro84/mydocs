<?php
namespace src\classes;

class Config{
	
	private static $genconf;
	
	private function __construct(){}
	
	public static function getGenConf(){
		if(is_null(self::$genconf)){
			require_once(dirname(__DIR__) . '/conf/conf.php');
			self::$genconf = GENCONF;
		}
		return self::$genconf;
	}
	
	public function __clone(){}
}