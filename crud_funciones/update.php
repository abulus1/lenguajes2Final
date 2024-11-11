<?php
    include('connection.php');
    $con = connection();

    $id = $_GET['id'];

    $sql_peliculas = "SELECT * FROM peliculas_crud_php";
    $query_peliculas = mysqli_query($con, $sql_peliculas);
    
    $sql_salas = "SELECT * FROM salas_crud_php";
    $query_salas = mysqli_query($con, $sql_salas);
    
    $sql = "SELECT * FROM funciones_crud_php INNER JOIN peliculas_crud_php ON peliculas_crud_php.id_pelicula = funciones_crud_php.id_pelicula INNER JOIN salas_crud_php ON salas_crud_php.id_sala = funciones_crud_php.id_sala WHERE id_funcion = '$id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div>
            <form action="edit_funcion.php" method="POST">
                <h1>Editar funcion</h1>

                <input type="hidden" name="id" value="<?= $row['id_funcion'] ?>">
                
                <select id="peliculas" name="id_pelicula">
                    <option value="">Seleccione una pelicula</option>
                    <?php while($row_pelicula = mysqli_fetch_array($query_peliculas)): ?>
                        <option value="<?= $row_pelicula['id_pelicula'] ?>" <?= ($row_pelicula['id_pelicula'] == $row['id_pelicula']) ? 'selected' : '' ?>><?= $row_pelicula['titulo'] ?></option>
                    <?php endwhile; ?>
                </select>
                    
                <select id="id_sala" name="id_sala">
                    <option value="">Seleccione una sala</option>
                    <?php while($row_sala = mysqli_fetch_array($query_salas)): ?>
                        <option value="<?= $row_sala['id_sala'] ?>" <?= ($row_sala['id_sala'] == $row['id_sala']) ? 'selected' : '' ?>><?= $row_sala['nombre_sala'] ?></option>
                    <?php endwhile; ?>
                </select>

                <input type="date" name="fecha" placeholder="FECHA" value="<?= $row['fecha'] ?>">
                <input type="time" name="hora" placeholder="HORA" value="<?= $row['hora'] ?>">
                <input type="text" name="tipo_funcion" placeholder="TIPO DE FUNCION" value="<?= $row['tipo_funcion'] ?>">
                <input type="text" name="idioma" placeholder="IDIOMA" value="<?= $row['idioma'] ?>">
                
                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
    </html>
