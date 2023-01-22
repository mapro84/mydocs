<?php
namespace src\app\Demo\DIC;

use src\app\Demo\DIC\Connection;

class Model{

  private $connection;
  private $uniqid;

  public function __construct(Connection $connection)
  {
    $this->connection = $connection;
    $this->uniqid = uniqid();
  }
}