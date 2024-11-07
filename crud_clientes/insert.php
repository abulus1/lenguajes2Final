<?php
    include('connection.php');

    $con = connection();

    $id = null;    
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fechaRegistro = $_POST['fechaRegistro'];  

    $sql = "INSERT INTO clientes VALUES('$id', '$nombre', '$email', '$telefono', '$fechaRegistro')";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    }
?>