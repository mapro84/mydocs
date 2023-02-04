<?php
namespace src\app\Demo\Hint;

class Hint {

    function add(int $x, int $y)
    {
        $result = $x+$y;
        return $result;
    }

    // The ?string allows null argument
    function upper(?string $str): string
    {
        return strtoupper($str);
    }

}
