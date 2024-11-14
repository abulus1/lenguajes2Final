<?php
include('Funcion.php');

$id_pelicula = $_POST['id_pelicula'];
$id_sala = $_POST['id_sala'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$tipo_funcion = $_POST['tipo_funcion'];
$idioma = $_POST['idioma'];

$funcion = new Funcion();
if ($funcion->crearFuncion($id_pelicula, $id_sala, $fecha, $hora, $tipo_funcion, $idioma)) {
  header("Location: index.php");
} else {
  echo "Error al crear la función";
}
