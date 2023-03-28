<?php
namespace src\Core\Utils;

Trait TDebug{

    private static $separation = '';

    public static function setSeparation($separation){
        self::$separation = $separation;
    }

    public static function dump($value, string $name = null, $die = false){
        self::setSeparation("===============================================================================");
        echo "<strong><pre style='background-color:orange'>";
        echo self::$separation;
        echo "<br>". $name." : ";
        var_dump( $value);
        echo self::$separation;
        echo "</pre></strong>";
        $die ?? die();
    }

    public static function phpExtensionExists(string $needed_extensions): bool
    {
        return (extension_loaded($needed_extensions));
    }
    
    public static function replacePointInLineBreak($string){
        $result = preg_replace_callback('/[^\d]\./m', function ($matches) {
            if(preg_match('/\d\./', $matches[0])){
                return $matches[0];
            }else{
                return $matches[0].'<br>';
            }
        }, $string);
        return $result;
    }

}