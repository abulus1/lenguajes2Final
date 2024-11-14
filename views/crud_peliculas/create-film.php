<?php
include('Pelicula.php');

$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$director = $_POST['director'];
$genero = $_POST['genero'];
$duracion = $_POST['duracion'];
$clasificacion = $_POST['clasificacion'];
$imagen = $_POST['imagen'];

$pelicula = new Pelicula();
if ($pelicula->crearPelicula($titulo, $descripcion, $director, $genero, $duracion, $clasificacion, $imagen)) {
    header("Location: index.php");
} else {
    echo "Error al crear la película";
}
?>
