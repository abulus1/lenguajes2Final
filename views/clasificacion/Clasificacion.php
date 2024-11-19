<?php
require_once dirname(__FILE__) . '/../../Database.php';

class Clasificacion
{
  private $db;
  private $con;

  public function __construct()
  {
    $this->db = new Database();
    $this->con = $this->db->getConnection();
  }

  public function obtenerTodasLasClasificaciones()
  {
    $sql = "SELECT id_clasificacion, nombre FROM clasificaciones";
    $result = $this->con->query($sql);
    $clasificaciones = [];

    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $clasificaciones[] = $row;
      }
    }
    return $clasificaciones;
  }
}
