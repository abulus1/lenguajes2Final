<?php
    include('connection.php');
    $con = connection();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fechaRegistro = $_POST['fechaRegistro'];

    $sql = "UPDATE clientes_crud_php SET nombre = '$nombre', email = '$email', telefono = '$telefono', fechaRegistro = '$fechaRegistro' WHERE id_client = '$id'";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    };

?>