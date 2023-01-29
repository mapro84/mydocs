<?php
namespace src\app\Entity;

use src\Core\DB\DB;
use src\Core\DB\Entity;

class Demo extends Entity{

	public $item_id;
	
	public static function getDemosBySkillId($skill_id){
		$query = 'SELECT demo.id, demo.name, demo.description FROM demo inner join item ON demo.item_id = item.id'.
				' INNER join skill as sk ON sk.id = item.skill_id where sk.id = ?;';
		$parameters = [$skill_id];
		return DB::prepare($query, $parameters, get_called_class());
	}

    public static function search($keyword)
    {
        $pattern = '%' . $keyword . '%';
        $query = "SELECT * FROM demo as d WHERE d.name LIKE :pattern OR d.description LIKE :pattern; ";
        $parameters = [':pattern' => $pattern];
        return DB::prepare($query, $parameters);
    }
	
}