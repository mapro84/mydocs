<?php
namespace src\app\Demo\Closure;

class Closure {

  /**
   * Summary of multiplierFactory
   * @param mixed $multiplier
   * @return Closure
   */
  function multiply(int $multiplier): mixed
  {
    return function(int $number) use($multiplier): int
    {
      return $number * $multiplier;
    };
  }

  function deleteDirectory($deleteDirectory){
    return function($path) use (&$deleteDirectory) {
      $resource = opendir($path);
      while (($item = readdir($resource)) !== false) {
          if ($item !== "." && $item !== "..") {
              if (is_dir($path . "/" . $item)) {
                  $deleteDirectory($path . "/" . $item);
              } else {
                  unlink($path . "/" . $item);
              }
          }
      }
      closedir($resource);
      rmdir($path);
    };
  }

}