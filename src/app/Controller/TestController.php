<?php
namespace src\app\Controller;

use src\Core\Time\Timer;
use src\app\test\Test;

class TestController
{

    public function test(): void
    {
        $test = new Test();
        $total = 0;
        //$functions = get_defined_functions();
        $functions['user'][] = 'test_Math';
        $functions['user'][] = 'test_StringManipulation';
        $functions['user'][] = 'test_Loops';
        $functions['user'][] = 'test_IfElse';
        $count = count($functions['user']);
        $line = str_pad("-", 38, "-");
        echo "<pre>$line\n|" . str_pad("PHP BENCHMARK SCRIPT", 36, " ", STR_PAD_BOTH) . "|\n$line\nStart : " . date("Y-m-d H:i:s") . "\nServer : {$_SERVER['SERVER_NAME']}@{$_SERVER['SERVER_ADDR']}\nPHP version : " . PHP_VERSION . "\nPlatform : " . PHP_OS . "\n$line\n";
        foreach ($functions['user'] as $user) {
            if (str_starts_with($user, 'test_')) {
                $total += $result = $test->$user($count);
                echo str_pad($user, 25) . " : " . $result . " sec.\n";
            }
        }
        echo str_pad("-", 38, "-") . "\n" . str_pad("Total time:", 25) . " : " . $total . " sec.</pre>";

        $t = new Timer();
        usleep(250);
        echo $t->getTime();
    }

}