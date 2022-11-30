<?php
namespace src\classes;

class Course{

    public $name = '';

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function addItem(string $item) {
        echo "Item $item";
    }

}