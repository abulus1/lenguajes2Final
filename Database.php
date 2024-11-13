<?php
class Database
{
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $dbname = 'gestor_cine_db';
  private $con;

  public function __construct()
  {
    $this->con = $this->connect();
  }

  public function connect()
  {
    $con = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }
    return $con;
  }

  public function getConnection()
  {
    return $this->con;
  }
}
?>