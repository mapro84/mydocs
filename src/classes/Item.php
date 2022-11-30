<?php
namespace src\classes;

class Item extends Course {

    public $name = '';

    public function setName(string $name){
        echo '<br>Item Name setting<br>';
        $this->name = $name;
    }

}