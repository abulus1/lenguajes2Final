<?php
include('Entrada.php');

$id = $_POST['id'];
$id_funcion = $_POST['id_funcion'];
$id_cliente = $_POST['id_cliente'];
$cantidad = $_POST['cantidad'];

$entrada = new Entrada();
if ($entrada->actualizarEntrada($id, $id_funcion, $id_cliente, $cantidad)) {
  header("Location: index.php");
} else {
  echo "Error al actualizar la entrada";
}
