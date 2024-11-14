<?php
include('Pelicula.php');

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$director = $_POST['director'];
$genero = $_POST['genero'];
$duracion = $_POST['duracion'];
$clasificacion = $_POST['clasificacion'];
$imagen = $_POST['imagen'];

$pelicula = new Pelicula();
if ($pelicula->actualizarPelicula($id, $titulo, $descripcion, $director, $genero, $duracion, $clasificacion, $imagen)) {
    header("Location: index.php");
} else {
    echo "Error al actualizar la película";
}
?>
