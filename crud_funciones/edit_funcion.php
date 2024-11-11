<?php
    include('connection.php');
    $con = connection();

    $sql_peliculas = "SELECT * FROM peliculas_crud_php";
    $query_peliculas = mysqli_query($con, $sql_peliculas);

    $sql_salas = "SELECT * FROM salas_crud_php";
    $query_salas = mysqli_query($con, $sql_salas);

    $sql = "SELECT * FROM funciones_crud_php INNER JOIN peliculas_crud_php ON peliculas_crud_php.id_pelicula = funciones_crud_php.id_pelicula INNER JOIN salas_crud_php ON salas_crud_php.id_sala = funciones_crud_php.id_sala";

    $query = mysqli_query($con, $sql);

    $id = $_POST['id'];
    $id_pelicula = $_POST['id_pelicula'];
    $id_sala = $_POST['id_sala'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tipo_funcion = $_POST['tipo_funcion'];
    $idioma = $_POST['idioma'];

    $sql = "UPDATE funciones_crud_php SET id_pelicula = '$id_pelicula', id_sala = '$id_sala', fecha = '$fecha', hora = '$hora', tipo_funcion = '$tipo_funcion', idioma = '$idioma' WHERE id_funcion = '$id'";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    };

?>
