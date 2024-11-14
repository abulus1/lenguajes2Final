<?php
include('Cliente.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

$cliente = new Cliente();
if ($cliente->actualizarCliente($id, $nombre, $email, $telefono)) {
  header("Location: index.php");
} else {
  echo "Error al actualizar el cliente";
}
