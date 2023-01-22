<?php
namespace src\app\Demo\interface_ns;

use src\app\Demo\interface_ns\Session;

use src\app\Demo\fluent\QueryBuilder;

class Demo {

    private $factory;

    public function demo(){
        $session = new Session();
        $session->set('user','mario');
        echo $session->get('user');
        $flash = new Flash($session);
        $flash->set('An error happened!', 'danger');
        echo $flash->get();
    }
    
}

