<?php
namespace src\app\Demo\DIC;

class Connection{
	
  private $db_name;
  private $db_password;
  private $db_username;
  private $uniqid;
	
  public function __construct(string $db_name,string $db_password, string $db_username)
  {
    $this->db_name = $db_name;
    $this->db_password = $db_password;
    $this->db_username = $db_username;
    $this->uniqid = uniqid();
  }

}