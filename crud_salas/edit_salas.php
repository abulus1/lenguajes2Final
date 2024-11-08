<?php
    include('connection.php');
    $con = connection();

    $id = $_POST['id'];
    $numeroSala = $_POST['numeroSala'];
    $capacidad = $_POST['capacidad'];

    $sql = "UPDATE salas_crud_php SET nombre_sala = '$numeroSala', capacidad = '$capacidad' WHERE id_sala = '$id'";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    };

?>