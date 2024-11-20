<?php
require_once dirname(__FILE__) . '/../../Database.php';

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
    $sql = "SELECT p.id_pelicula, p.titulo, p.descripcion, p.director, p.duracion, 
                   g.nombre AS genero, c.nombre AS clasificacion, p.imagen
            FROM peliculas_crud_php p
            JOIN generos g ON p.id_genero = g.id_genero
            JOIN clasificaciones c ON p.id_clasificacion = c.id_clasificacion
            ORDER BY p.id_pelicula ASC";
    $result = $this->con->query($sql);
    $peliculas = [];

    if ($result) {
      while ($row = $result->fetch_assoc()) {
        $peliculas[] = $row;
      }
    }
    return $peliculas;
  }

  public function crearPelicula($titulo, $descripcion, $director, $id_genero, $duracion, $id_clasificacion, $imagen)
  {
    $sql = "INSERT INTO peliculas_crud_php (titulo, descripcion, director, id_genero, duracion, id_clasificacion, imagen) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("ssssiss", $titulo, $descripcion, $director, $id_genero, $duracion, $id_clasificacion, $imagen);
    return $stmt->execute();
  }

  public function obtenerPeliculaPorId($id)
  {
    $sql = "SELECT p.id_pelicula, p.titulo, p.descripcion, p.director, p.duracion, 
                   g.nombre AS genero, c.nombre AS clasificacion, p.imagen, 
                   p.id_genero, p.id_clasificacion
            FROM peliculas_crud_php p
            JOIN generos g ON p.id_genero = g.id_genero
            JOIN clasificaciones c ON p.id_clasificacion = c.id_clasificacion
            WHERE p.id_pelicula = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  public function actualizarPelicula($id, $titulo, $descripcion, $director, $id_genero, $duracion, $id_clasificacion, $imagen)
  {
    $sql = "UPDATE peliculas_crud_php 
            SET titulo = ?, descripcion = ?, director = ?, id_genero = ?, duracion = ?, id_clasificacion = ?, imagen = ? 
            WHERE id_pelicula = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("sssisssi", $titulo, $descripcion, $director, $id_genero, $duracion, $id_clasificacion, $imagen, $id);
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
