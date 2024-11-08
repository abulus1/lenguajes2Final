<?php
    include('connection.php');

    $con = connection();

    $id = null;    
    $numeroSala = $_POST['numeroSala'];
    $capacidad = $_POST['capacidad'];
    $sql = "INSERT INTO salas_crud_php VALUES('$id', '$numeroSala', '$capacidad',)";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    }
?>