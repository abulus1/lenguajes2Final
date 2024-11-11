<?php
    include('connection.php');

    $con = connection();


    $id_entrada = $_POST['id_entrada'];
    $id_funcion = $_POST['id_funcion'];
    $id_cliente = $_POST['id_cliente'];
    $cantidad = $_POST['cantidad'];
    $sql = "SELECT *, peliculas_crud_php.titulo AS titulo_pelicula, salas_crud_php.nombre_sala AS nombre_sala
                    FROM entradas_crud_php
                    JOIN funciones_crud_php ON entradas_crud_php.id_funcion = funciones_crud_php.id_funcion
                    JOIN peliculas_crud_php ON funciones_crud_php.id_pelicula = peliculas_crud_php.id_pelicula
                    JOIN salas_crud_php ON funciones_crud_php.id_sala = salas_crud_php.id_sala
                    JOIN clientes_crud_php ON entradas_crud_php.id_cliente = clientes_crud_php.id_cliente
                    WHERE id_entrada = '$id_entrada'";

    $query = mysqli_query($con, $sql);

        $sql = "UPDATE entradas_crud_php SET id_funcion = '$id_funcion', id_cliente = '$id_cliente', cantidad = '$cantidad' WHERE id_entrada = '$id_entrada'";
        $query = mysqli_query($con, $sql);
        
        if($query){
            Header("Location: index.php");
        }
    
?>

