<?php
include('Entrada.php');

$id = $_GET['id'];
$entrada = new Entrada();

if ($entrada->eliminarEntrada($id)) {
  header("Location: index.php");
} else {
  echo "Error al eliminar la entrada";
}
