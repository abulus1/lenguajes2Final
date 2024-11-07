<?php
    include('connection.php');

    $con = connection();

    $id = null;    
    $numeroSala = $_POST['numeroSala'];
    $capacidad = $_POST['capacidad'];
    $sql = "INSERT INTO salas VALUES('$id', '$numeroSala', '$capacidad',)";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    }
?>