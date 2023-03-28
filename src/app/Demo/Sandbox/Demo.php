<?php
namespace src\app\Demo\Sandbox;

use ReflectionClass;
use src\app\Demo\DIC\Connection;
use src\Core\DIC\DIC;
use src\app\Demo\DIC\Model;
use src\app\Demo\Sandbox\Test;

class Demo {

    private $factory;

    /**
     * @throws \Exception
     */
    public static function demo(): mixed
    {
        $dic = new DIC();
        return $dic->getInstance('src\app\Controller\SkillController');
    }
}
