<?php
namespace src\app\Demo\Sandbox;

use src\Core\Utils\TDebug;

class Test
{

    use TDebug;

    public function __construct(){
        self::dump('coucou', 'Tdebug test');
    }

}