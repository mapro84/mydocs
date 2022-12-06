<?php
namespace src\classes;

use src\classes\DB\DB;

class Skill{

    private $name = '';
    private $key;
    private $title;
    private $id;

    /**
     * called when classe called with unknown parameter
     * @param string $property
     * @return mixed Method name
     */
    public function __get($property){
    	$method = 'get' . ucfirst($property);
    	$this->key = $this->$method();
    	return $this->key;
    }
    
    public function __construct() {
    }

    public function getUrl(){
    	return '<li><a href=index.php?page=skill&skillid='.$this->id.'>'.$this->title.'</a></li>';
    }
    
    public function getTitle(){
    	return $this->title;
    }
    
    public function getSkill($id){
    	$query = "SELECT * FROM skill WHERE id = ?";
    	$parameters = [$id];
    	return DB::prepare($query, $parameters, 'src\classes\Skill',true);
    }
    
    public function getAll(){
        $query = 'SELECT * FROM skill';
        return DB::prepare($query, [], 'src\classes\Skill');
    }

}