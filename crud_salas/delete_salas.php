<?php

    include('connection.php');

    $con = connection();

    $id = $_GET['id'];

    $sql = "DELETE FROM salas_crud_php WHERE id_sala = '$id'";
    
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    }


?>