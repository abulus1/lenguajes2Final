<?php

    include('connection.php');

    $con = connection();

    $id = $_GET['id'];

    $sql = "DELETE FROM clientes WHERE id_cliente = '$id'";
    
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    }


?>