<?php
include('Cliente.php');

$id = $_GET['id'];
$cliente = new Cliente();

if ($cliente->eliminarCliente($id)) {
    header("Location: index.php");
} else {
    echo "Error al eliminar el cliente";
}
?>
