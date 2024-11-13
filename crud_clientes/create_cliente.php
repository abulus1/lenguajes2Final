<?php
include('Cliente.php');

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];

$cliente = new Cliente();
if ($cliente->crearCliente($nombre, $email, $telefono)) {
    header("Location: index.php");
} else {
    echo "Error al crear el cliente";
}
?>
