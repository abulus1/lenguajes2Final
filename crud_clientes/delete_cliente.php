<?php

    include('connection.php');

    $con = connection();

    $id = $_GET['id'];

    $sql = "DELETE FROM clientes_crud_php WHERE id_cliente = '$id'";
    
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    }


?>