<?php
    include('connection.php');
    $con = connection();

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $director = $_POST['director'];
    $genero = $_POST['genero'];
    $duracion = $_POST['duracion'];
    $clasificacion = $_POST['clasificacion'];
    $imagen = $_POST['imagen'];

    $sql = "UPDATE peliculas_crud_php SET titulo = '$titulo', descripcion = '$descripcion', director = '$director', genero = '$genero', duracion = '$duracion', clasificacion = '$clasificacion', imagen = '$imagen' WHERE id_pelicula = '$id'";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    };

?>