<?php

namespace src\Core\User;

use src\Core\Session\SessionStorage;

class User
{
  protected $storage;

  function __construct(SessionStorage $storage)
  {
      $this->storage = $storage;
  }

  function setAttribute($name, $value){
      $this->storage->set($name, $value);
  }

    function getAttribute($name){
        $this->storage->get($name);
    }
}