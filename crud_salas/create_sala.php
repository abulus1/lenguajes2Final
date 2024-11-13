<?php
include('Sala.php');

$nombre_sala = $_POST['nombre_sala'];
$capacidad = $_POST['capacidad'];

$sala = new Sala();
if ($sala->crearSala($nombre_sala, $capacidad)) {
  header("Location: index.php");
} else {
  echo "Error al crear la sala";
}
