<?php
namespace src\app\Demo\PhpNews;

class PhpNews {

  /**
   * @param int $number set by Constructor Property Promotion 
   */
  public function __construct(private int $number){}

  public function add(int|string $number1, int|string $number2, $stringVal=false): string|int
  {
    $res = $number1 + $number2;
    $res = $stringVal ? (string)$res : $res;
    return $res;
  }

}