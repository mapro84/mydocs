<?php
namespace src\app\demos\Html;

class Text{

    private static $prefixer = '0';
    const CURRENCY = '€';

    public static function getIntegerPrefix(int $number){
        if($number < 9){
            return self::$prefixer.$number;
        }else{
            return $number;
        }
    }

    public static function getCurrency(){
        return self::CURRENCY;
    }

}