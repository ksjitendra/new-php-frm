<?php

namespace App\Config;
use PDO;

class Database
{

  private $host = 'localhost';
  private $dbName = 'php_auth';
  private $dbUser = 'newdbuser';
  private $dbPassword = 'Rubi#123';
  public $conn;

  public function __construct()
  {
    $this->conn = null;

    try {
      $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->dbUser, $this->dbPassword);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

}