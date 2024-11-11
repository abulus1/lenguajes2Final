<?php

include('connection.php');

$con = connection();

$id_funcion = $_POST['id_funcion'];
$id_cliente = $_POST['id_cliente'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO entradas_crud_php (id_funcion, id_cliente, cantidad) VALUES ('$id_funcion', '$id_cliente', '$cantidad')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}
?>