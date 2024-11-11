<?php

    include('connection.php');

    $con = connection();

    $id = $_GET['id'];

    $sql = "DELETE FROM entradas_crud_php WHERE id_entrada = '$id'";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    }
?>
