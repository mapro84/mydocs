<?php
namespace src\Core\DB;

use src\Core\DB\DB;
use src\Core\Utils\Debug;

class Entity{

    public function getAll($table){
    	$query = 'SELECT * FROM ' . strtolower($table);
        return DB::prepare($query, [], get_called_class());
    }

    public function find($id,$table){
    	$query = "SELECT * FROM ". strtolower($table) ." WHERE id = ?";
    	$parameters = [$id];
    	return DB::prepare($query, $parameters, get_called_class(),true);
    }

    public function findBy($targertTable, $id, $tableCategory){
    	$query = "SELECT * FROM ".$targertTable." WHERE {$tableCategory}_id = ?";
    	$parameters = [$id];
    	return DB::prepare($query, $parameters, get_called_class());
    }

    public function findByName($table,$name){
    	$query = "SELECT * FROM ".$table." WHERE name = ?";
    	$parameters = [$name];
    	return DB::prepare($query, $parameters, get_called_class(),true);
    }
    
    public function delete($table,$id){
    	$query = "DELETE FROM ".$table." WHERE id = ?";
    	$parameters = [$id];
    	return DB::prepare($query, $parameters, get_called_class());
    }
}