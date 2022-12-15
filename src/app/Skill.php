<?php
namespace src\app;

use src\Core\DB\Entity;

class Skill extends Entity{
    
	public $id;
    public $name;
    public $logo;    
    
    private $key;
//     private $url;

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

    public function get($id){
    	return parent::find($id,'skill');
    }

    public function getId(){
    	return $this->id;
    }
    
    public function getname(){
    	return $this->name;
    }

    public function getLogo(){
    	return $this->logo;
    }
    
}