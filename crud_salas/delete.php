<?php

    include('connection.php');

    $con = connection();

    $id = $_GET['id'];

    $sql = "DELETE FROM salas WHERE id_sala = '$id'";
    
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    }


?>