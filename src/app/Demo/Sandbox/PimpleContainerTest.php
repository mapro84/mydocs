<?php

namespace src\app\Demo\Sandbox;

class PimpleContainerTest
{
    function test(){
        $pimpleContainer = new \src\Core\DIC\PimpleContainer();
        $pimpleContainer->user_storage_name = 'SESSION_ID';
        $pimpleContainer->user_storage = function($pimpleContainer){ return new User($pimpleContainer->user_storage_name); };
        $pimpleContainer->user = function($pimpleContainer) { return new User($pimpleContainer->user_storage); };
        var_dump($pimpleContainer->user);

    }

}