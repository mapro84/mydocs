<?php
namespace src\app;

use src\Core\DB\Entity;

class Skill extends Entity{

    private $name;
    private $key;
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

    public function get($id){
    	return parent::find($id,'skill');
    }

    public function getUrl(){
    	Entity::getAll('skill');
    	return '<a href=index.php?page=skill&skillid='.$this->id.'>'.$this->name.'</a>';
    }
    
    public function getname(){
    	return $this->name;
    }

    public function getId(){
    	return $this->id;
    }
    
    
}