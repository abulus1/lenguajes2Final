<?php
include('Entrada.php');

$id_funcion = $_POST['id_funcion'];
$id_cliente = $_POST['id_cliente'];
$cantidad = $_POST['cantidad'];

$entrada = new Entrada();
if ($entrada->crearEntrada($id_funcion, $id_cliente, $cantidad)) {
  header("Location: index.php");
} else {
  echo "Error al crear la entrada";
}
