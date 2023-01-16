<?php
namespace src\app\Entity;

use src\Core\DB\Entity;
use src\Core\DB\DB;

class Item extends Entity{

    public $name;
    public $urls;
    public $item_id;
    public $url;
    public $score;

    public static function search($parameters){
        $search = $parameters["search"] ?? null;
        if ($search === null)
            return [];
        $query = 'SELECT i.id, i.name, i.description, i.further, u.name as urlname,
         u.url, u.id as url_id, d.name as dname, d.description as ddescription, d.id as did,
         s.name as skillname, s.logo, s.id as skillid
        FROM item as i 
        LEFT OUTER JOIN url_skill_item as link ON i.id = link.item_id 
        LEFT OUTER JOIN url as u ON u.id = link.url_id
        LEFT OUTER JOIN demo as d ON i.id = d.item_id
        LEFT OUTER JOIN skill as s ON i.skill_id = s.id
        WHERE MATCH(i.name,i.description,i.further) against(?);';
        $queryParams = [];
        array_push($queryParams,$search);
        return DB::prepare($query, $queryParams);
    }

    public static function searchBySkillId($skill_id){
        $query = 'SELECT i.id, i.name, i.description, i.further, u.name as urlname,
         u.url, u.id as url_id, d.name as dname, d.description as ddescription, d.id as did,
         s.name as skillname, s.logo, s.id as skillid
        FROM item as i 
        LEFT OUTER JOIN url_skill_item as link ON (i.id = link.item_id OR link.skill_id = ?)
        LEFT OUTER JOIN url as u ON u.id = link.url_id
        LEFT OUTER JOIN demo as d ON i.id = d.item_id
        LEFT OUTER JOIN skill as s ON i.skill_id = s.id
        WHERE i.skill_id = ? ;';
        $queryParams = [];
        array_push($queryParams,$skill_id);
        array_push($queryParams,$skill_id);
        return DB::prepare($query, $queryParams);
    }

    public static function deleteUrlSkillItem($item_id){
      $query = 'DELETE FROM `url_skill_item` WHERE skill_id is NOT NULL AND item_id = ?;';
      $queryParams = [];
      array_push($queryParams,$item_id);
      return DB::prepare($query, $queryParams);    
    }

    public static function deleteItemsBySkillId($skill_id){
        $query = 'DELETE FROM `item` WHERE skill_id = ?;';
        $queryParams = [];
        array_push($queryParams,$skill_id);
        return DB::prepare($query, $queryParams);    
      }

}