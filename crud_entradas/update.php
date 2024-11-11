<?php
    include('connection.php');

    $con = connection();
    $id = $_GET['id'];
    $sql = "SELECT *, peliculas_crud_php.titulo AS titulo_pelicula, salas_crud_php.nombre_sala AS nombre_sala
                    FROM entradas_crud_php
                    JOIN funciones_crud_php ON entradas_crud_php.id_funcion = funciones_crud_php.id_funcion
                    JOIN peliculas_crud_php ON funciones_crud_php.id_pelicula = peliculas_crud_php.id_pelicula
                    JOIN salas_crud_php ON funciones_crud_php.id_sala = salas_crud_php.id_sala
                    JOIN clientes_crud_php ON entradas_crud_php.id_cliente = clientes_crud_php.id_cliente
                    WHERE id_entrada = '$id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);

    $sql_funciones = "SELECT *, peliculas_crud_php.titulo AS titulo_pelicula, salas_crud_php.nombre_sala AS nombre_sala FROM funciones_crud_php JOIN peliculas_crud_php ON funciones_crud_php.id_pelicula = peliculas_crud_php.id_pelicula JOIN salas_crud_php ON funciones_crud_php.id_sala = salas_crud_php.id_sala";
    $query_funciones = mysqli_query($con, $sql_funciones);

    $sql_clientes = "SELECT * FROM clientes_crud_php";
    $query_clientes = mysqli_query($con, $sql_clientes);
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Entradas</title>
    </head>
    <body>
        <div>
            <form action="edit_entradas.php" method="POST">
                <h1>Editar entradas</h1>
                
                <input type="hidden" name="id_entrada" value="<?= $row['id_entrada'] ?>">

                <select id="funcion" name="id_funcion">
                    <option value="">Seleccione una función</option>
                        <?php while($row_funciones = mysqli_fetch_array($query_funciones)): ?>
                            <option value="<?= $row_funciones['id_funcion'] ?>" <?= ($row_funciones['id_funcion'] == $row['id_funcion']) ? 'selected' : '' ?>> <?= $row_funciones['titulo_pelicula'] . ' - ' . $row_funciones['fecha'] . ' - ' . $row_funciones['hora'] . ' - ' . $row_funciones['tipo_funcion'] . ' - ' . $row_funciones['idioma'] ?>  </option>
                        <?php endwhile;?>
                </select>

                <select id="cliente" name="id_cliente">
                    <option value="">Seleccione un cliente</option>
                        <?php while($row_clientes = mysqli_fetch_array($query_clientes)): ?>
                            <option value="<?= $row_clientes['id_cliente'] ?>" <?= ($row_clientes['id_cliente'] == $row['id_cliente']) ? 'selected' : '' ?>> <?= $row_clientes['nombre']?></option>
                        <?php endwhile;?>
                </select>

                <input type="number" name="cantidad" value="<?= $row['cantidad'] ?>">
                <input type="submit" value="Cambiar entrada">
            </form>
        </div>
    </body>
    </html>
