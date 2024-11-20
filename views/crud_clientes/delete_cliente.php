<?php
include('Cliente.php');
require_once dirname(__FILE__) . '/../../config.php';

$id = $_GET['id'];
$cliente = new Cliente();

try {
    if ($cliente->eliminarCliente($id)) {
        header("Location:" . BASE_URL . "views/crud_clientes/index.php?success=1");
    } else {
        header("Location:" . BASE_URL . "views/crud_clientes/index.php?error=1");
    }
} catch (mysqli_sql_exception $e) {
    header("Location:" . BASE_URL . "views/crud_clientes/index.php?error=foreign_key");
}
?>
