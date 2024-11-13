<?php
include('Sala.php');

$id = $_GET['id'];
$sala = new Sala();

if ($sala->eliminarSala($id)) {
  header("Location: index.php");
} else {
  echo "Error al eliminar la sala";
}
