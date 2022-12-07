<?php
namespace src\classes;

use src\classes\DB\DB;
use src\classes\Utils\Debug;

class Table{

    protected static $table;

    private static function getTable(){
    	if(is_null(static::$table)){
    		 $class_name = explode('\\', get_called_class());
    		 static::$table = strtolower(end($class_name));
    	}
    	return static::$table;
    }

    public function getAll(){
        $query = 'SELECT * FROM ' . strtolower(static::getTable());
        return DB::prepare($query, [], get_called_class());
    }

    public function find($id){
    	$query = "SELECT * FROM ".static::getTable()." WHERE id = ?";
    	$parameters = [$id];
    	return DB::prepare($query, $parameters, get_called_class(),true);
    }

    public function findBy($id,$tableCategory){
    	$query = "SELECT * FROM ".static::getTable()." WHERE {$tableCategory}_id = ?";
    	
    	$parameters = [$id];
    	return DB::prepare($query, $parameters, get_called_class());
    }
    
}