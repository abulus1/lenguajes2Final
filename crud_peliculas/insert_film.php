<?php
    include('connection.php');
    $con = connection();

    $id = null;    
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $director = $_POST['director'];
    $genero = $_POST['genero'];
    $duracion = $_POST['duracion'];
    $clasificacion = $_POST['clasificacion'];
    $imagen = $_POST['imagen'];    

    $sql = "INSERT INTO peliculas_crud_php VALUES('$id', '$titulo', '$descripcion', '$director', '$genero', '$duracion', '$clasificacion', '$imagen')";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: index.php");
    }
?>