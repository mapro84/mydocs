<?php

namespace src\app\Demo\Sandbox;

class PimpleContainer
{

    protected $s = array();

    function __set($k, $c){

        echo '<br> k: ';
        var_dump($k);
        echo '<br> c: ';
        var_dump($c);


        $this->s[$k] = $c;
    }

    function __get($k){
        return $this->s[$k]($this);
    }

}