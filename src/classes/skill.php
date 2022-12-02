<?php
namespace src\classes;
use src\classes\DB\DB;
use src\classes\Utils\Debug;
use \PDO;

class Skill{

    private $name = '';

    public function __construct() {
    }

    public function getAll(){
        $query = 'SELECT * FROM skill';
        return DB::query($query);
    }

    public function getName(){
        return $this->name;
    }

    public function setName(string $name){
        $this->name = $name;
    }

}