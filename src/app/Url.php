<?php
namespace src\app;

use src\Core\DB\Entity;
use src\Core\DB\DB;
use src\Core\Utils\Debug;

class Url extends Entity
{

    public static function findUrlsBy($id, $tableCategory)
    {
        $query = "SELECT url.name, url.url FROM url INNER JOIN url_skill_item as usi ON usi.url_id = url.id WHERE usi.{$tableCategory}_id = ?";
        $parameters = [$id];
        return DB::prepare($query, $parameters, get_called_class());
    }

    public static function addUrl($parameters)
    {
        $query = 'INSERT INTO `url`(`name`, `url`) VALUES (?,?)';
        $urlParameters = array($parameters['name'], $parameters['name']);
        DB::prepare($query, $urlParameters);

        $query = 'SELECT max(id) FROM url';
        $lastInsertId = DB::prepare($query);
        Debug::dump($lastInsertId[0]["max(id)"]);
        $skill_id = $parameters['skill_id'];
        $item_id = $parameters['item_id'];

        $urlSkillItemParameters = array($lastInsertId[0]["max(id)"], $skill_id, $item_id);
        $query = 'INSERT INTO `url_skill_item`(`url_id`, `skill_id`, `item_id`) VALUES (?,?,?)';
        return DB::prepare($query, $urlSkillItemParameters);
    }

}