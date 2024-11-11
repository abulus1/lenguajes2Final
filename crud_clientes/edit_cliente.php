<?php
    include('connection.php');
    $con = connection();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE clientes_crud_php SET nombre = '$nombre', email = '$email', telefono = '$telefono' WHERE id_cliente = '$id'";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    };

?>