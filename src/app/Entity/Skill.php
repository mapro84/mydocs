<?php
namespace src\app\Entity;

use src\Core\DB\Entity;
use src\Core\DB\DB;
use src\Core\Utils\Debug;

class Skill extends Entity{
    
    public $id;
    public $name;
    public $logo;    

    private $key;
    public $further;
    public $skill_id;

    public static function insert($table,$params){
        $query = "INSERT INTO ".$table." (`name`, `logo`) VALUES (?,?);";
        $parameters = [$params['name'],strtolower($params['name']).'.png'];
        return DB::prepare($query, $parameters, get_called_class(),true);
    }

}
