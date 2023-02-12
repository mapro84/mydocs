<?php

namespace src\app\test;

class Test
{

    /**
     * @param int $count
     * @return string
     */
    function test_Math(int $count = 4): string
    {
        $time_start = microtime(true);
        $mathFunctions = array("abs", "acos", "asin", "atan", "floor", "exp", "sin", "tan", "is_finite", "is_nan", "sqrt");
        foreach ($mathFunctions as $key => $function) {
            if (!function_exists($function)) unset($mathFunctions[$key]);
        }
        for ($i=0; $i < $count; $i++) {
            foreach ($mathFunctions as $function) {
                $r = call_user_func_array($function, array($i));
                var_dump($function);
                var_dump( array($i));
                var_dump( $r);
            }
        }

        return number_format(microtime(true) - $time_start, 6);
    }

    /**
     * @param int $count
     * @return string
     */
    function test_StringManipulation(int $count = 200000): string
    {
        $time_start = microtime(true);
        $stringFunctions = array("addslashes", "chunk_split", "metaphone", "strip_tags", "md5", "sha1", "strtoupper", "strtolower", "strrev", "strlen", "soundex", "ord");
        foreach ($stringFunctions as $key => $function) {
            if (!function_exists($function)) unset($stringFunctions[$key]);
        }
        $string = "the quick brown fox jumps over the lazy dog";
        for ($i=0; $i < $count; $i++) {
            foreach ($stringFunctions as $function) {
                $r = call_user_func_array($function, array($string));
            }
        }
        return number_format(microtime(true) - $time_start, 6);
    }

    function test_Loops($count = 19000000): string
    {
        $time_start = microtime(true);
        for($i = 0; $i < $count; ++$i);
        $i = 0; while($i < $count) ++$i;
        return number_format(microtime(true) - $time_start, 6);
    }

    function test_IfElse($count = 9000000): string
    {
        $time_start = microtime(true);
        for ($i=0; $i < $count; $i++) {
            if ($i == -1) {
            } elseif ($i == -2) {
            } else if ($i == -3) {
            }
        }
        return number_format(microtime(true) - $time_start, 6);
    }

}
