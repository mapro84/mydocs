<?php
namespace src\app\Demo\Facade;

class Facade {
	

    public static function __callStatic(string $method, array $arguments)
    {
      echo "Calling static method '$method' ".implode(',',$arguments)."\n";
      var_dump($method,$arguments);
      $methodToCall = preg_replace('/static_/', '', $method);
      return call_user_func_array(['src\app\Demo\Facade\Facade', $methodToCall], $arguments);
    }

	public function get($param){
        return __CLASS__;
    }
}