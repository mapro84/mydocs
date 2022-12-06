<?php
namespace src\classes\Utils;

use src\classes\Utils\Debug;

class Check {
	
	public static function is_numeric($int){
		$filteredValue = filter_var($int, FILTER_VALIDATE_INT);
		if($filteredValue === false) {
			throw(new \Exception('Exception: This value is not an integer \n'));
		} else {
			if( DEBUG === true){
				//echo $filteredValue . ' is an integer (type: ' . gettype($filteredValue) . ')';
			}
		}
	}
	
}

