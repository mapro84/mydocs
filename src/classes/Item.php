<?php
namespace src\classes;

class Item extends Table{

    public $name;
    public $urls;

    public function setName(string $name){
        echo '<br>Item Name setting<br>';
        $this->name = $name;
    }

}