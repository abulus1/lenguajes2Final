<?php
include('Funcion.php');

$id = $_GET['id'];
$funcion = new Funcion();

if ($funcion->eliminarFuncion($id)) {
    header("Location: index.php");
} else {
    echo "Error: No se puede eliminar la función porque tiene entradas asociadas.";
}
?>
