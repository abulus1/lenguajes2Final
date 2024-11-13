<?php
include('Sala.php');

$id = $_POST['id'];
$nombre_sala = $_POST['nombre_sala'];
$capacidad = $_POST['capacidad'];

$sala = new Sala();
if ($sala->actualizarSala($id, $nombre_sala, $capacidad)) {
  header("Location: index.php");
} else {
  echo "Error al actualizar la sala";
}
