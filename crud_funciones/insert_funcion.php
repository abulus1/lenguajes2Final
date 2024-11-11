<?php
    include('connection.php');

    $con = connection();

    $sql_peliculas = "SELECT * FROM peliculas_crud_php";
    $query_peliculas = mysqli_query($con, $sql_peliculas);

    $sql_salas = "SELECT * FROM salas_crud_php";
    $query_salas = mysqli_query($con, $sql_salas);

    $id_pelicula = $_POST['id_pelicula'];
    $id_sala = $_POST['id_sala'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $tipo_funcion = $_POST['tipo_funcion'];
    $idioma = $_POST['idioma'];

    $sql = "INSERT INTO funciones_crud_php (id_pelicula, id_sala, fecha, hora, tipo_funcion, idioma) VALUES ('$id_pelicula', '$id_sala', '$fecha', '$hora', '$tipo_funcion', '$idioma')";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    };

?>
