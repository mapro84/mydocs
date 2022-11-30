<?php
require_once("./vendor/autoload.php");

use src\classes\Course;

$course = new Course('Python');
$course->addItem('Trait');
$course->setName('PHP');
var_dump($course->name);

echo 'truc';

$t=0;
var_dump(is_null($t));