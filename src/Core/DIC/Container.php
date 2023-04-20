<?php

namespace src\Core\DIC;

use src\Core\Session\SessionStorage;
use src\Core\User\User;

class Container
{

    public static User $userInstance;
    public static SessionStorage $sessionStorageInstance;

    protected array $parameters;

    public function __construct(array $parameters){
        $this->parameters = $parameters;
    }

    function getUser(){
        if(!isset(self::$userInstance)){
            $className = $this->parameters('user.class');
            self::$userInstance = new $className($this->getUserStorage());
            //self::$userInstance = new User($this->getUserStorage());
        }
        return self::$userInstance;
    }

    function getUserStorage(){
        if(!isset(self::$sessionStorageInstance)){
            $className = $this->parameters('user.storage.class');
            self::$sessionStorageInstance = new $className($this->parameters['user.storage.cookie_name']);
            //self::$sessionStorageInstance = new SessionStorage('SESSION_ID');
        }
        return self::$sessionStorageInstance;
    }
}