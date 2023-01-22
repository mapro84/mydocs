<?php
namespace src\app\Entity;

use src\Core\DB\Entity;

class Skill extends Entity{
    
	public $id;
    public $name;
    public $logo;    
    
    private $key;
    public $further;
    public $skill_id;

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
    
    public function get($id){
    	return parent::find($id,'skill');
    }

    public function getId(){
    	return $this->id;
    }
    
    public function getname(){
    	return $this->name;
    }
    
}