<?php
require_once dirname(__FILE__) . '/../../Database.php';

class Genero
{
  private $db;
  private $con;

  public function __construct()
  {
    $this->db = new Database();
    $this->con = $this->db->getConnection();
  }

  public function obtenerTodosLosGeneros()
  {
    $sql = "SELECT id_genero, nombre FROM generos";
    $result = $this->con->query($sql);
    $generos = [];

    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $generos[] = $row;
      }
    }
    return $generos;
  }
}
