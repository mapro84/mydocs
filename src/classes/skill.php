<?php
namespace src\classes;

class Skill extends Table{

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
    	return parent::find($id);
    }
    
    public function getUrl(){
    	Table::getAll();
    	return '<li><a href=index.php?page=skill&skillid='.$this->id.'>'.$this->name.'</a></li>';
    }
    
    public function getname(){
    	return $this->name;
    }

    public function getId(){
    	return $this->id;
    }
    
    
}