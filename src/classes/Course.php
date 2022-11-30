<?php
namespace src\classes;

class Course{

    private $name = '';

    public function __construct(string $name) {
        echo '<br>Course Name setting<br>';
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setName(string $name){
        $this->name = $name;
    }

}