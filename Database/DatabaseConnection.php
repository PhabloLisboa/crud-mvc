<?php
namespace Database;

class DatabaseConnection{
  public $instance;
  

  public function __construct($name = DB_NAME, $host = DB_HOST, $user = DB_USER, $pass = DB_PASS)
  {
    $this->instance = new \PDO("mysql:host=${host};
            dbname=${name}", $user, $pass);

  }

  public function getInstance(){
    return $this->instance;
  }
}