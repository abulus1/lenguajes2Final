<?php
include('../Database.php');

class Pelicula
{
  private $db;
  private $con;

  public function __construct()
  {
    $this->db = new Database();
    $this->con = $this->db->getConnection();
  }
  public function obtenerTodasLasPeliculas()
  {
    $sql = "SELECT * FROM peliculas_crud_php";
    $result = $this->con->query($sql);
    $peliculas = [];

    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $peliculas[] = $row;
      }
    }
    return $peliculas;
  }

  public function crearPelicula($titulo, $descripcion, $director, $genero, $duracion, $clasificacion, $imagen)
  {
    $sql = "INSERT INTO peliculas_crud_php (titulo, descripcion, director, genero, duracion, clasificacion, imagen) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("sssssss", $titulo, $descripcion, $director, $genero, $duracion, $clasificacion, $imagen);
    return $stmt->execute();
  }


  public function obtenerPeliculaPorId($id)
  {
    $sql = "SELECT * FROM peliculas_crud_php WHERE id_pelicula = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  public function actualizarPelicula($id, $titulo, $descripcion, $director, $genero, $duracion, $clasificacion, $imagen)
  {
    $sql = "UPDATE peliculas_crud_php SET titulo = ?, descripcion = ?, director = ?, genero = ?, duracion = ?, clasificacion = ?, imagen = ? WHERE id_pelicula = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("sssssssi", $titulo, $descripcion, $director, $genero, $duracion, $clasificacion, $imagen, $id);
    return $stmt->execute();
  }

  public function eliminarPelicula($id)
  {
    $sql = "DELETE FROM peliculas_crud_php WHERE id_pelicula = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
  }
}
