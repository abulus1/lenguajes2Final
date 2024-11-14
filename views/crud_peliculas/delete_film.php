<?php
include('Pelicula.php');

$id = $_GET['id'];
$pelicula = new Pelicula();

if ($pelicula->eliminarPelicula($id)) {
    header("Location: index.php");
} else {
    echo "Error al eliminar la película";
}
