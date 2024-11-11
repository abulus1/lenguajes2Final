<?php
    include('connection.php');

    $con = connection();

    $sql_peliculas = "SELECT * FROM peliculas_crud_php";
    $query_peliculas = mysqli_query($con, $sql_peliculas);

    $sql_salas = "SELECT * FROM salas_crud_php";
    $query_salas = mysqli_query($con, $sql_salas);

    $sql = "SELECT * FROM funciones_crud_php INNER JOIN peliculas_crud_php ON peliculas_crud_php.id_pelicula = funciones_crud_php.id_pelicula INNER JOIN salas_crud_php ON salas_crud_php.id_sala = funciones_crud_php.id_sala";

    $query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud funciones</title>
</head>
<body>
    <div>
        <form action="insert_funcion.php" method="POST">
            <h1>Crear funcion</h1>

            <select id="peliculas" name="id_pelicula">
                <option value="">Seleccione una película</option>
                <?php while($row_pelicula = mysqli_fetch_array($query_peliculas)): ?>
                    <option value="<?= $row_pelicula['id_pelicula'] ?>"><?= $row_pelicula['titulo'] ?></option>
                <?php endwhile; ?>
            </select>
                
            <select id="sala" name="id_sala">
                <option value="">Seleccione una sala</option>
                <?php while($row_sala = mysqli_fetch_array($query_salas)): ?>
                    <option value="<?= $row_sala['id_sala'] ?>"><?= $row_sala['nombre_sala'] ?></option>
                <?php endwhile; ?>
            </select>
                
            <input type="date" name="fecha">
            <input type="time" name="hora">
            <input type="text" name="tipo_funcion" placeholder="Tipo de Funcion">
            <input type="text" name="idioma" placeholder="Idioma">
            <input type="submit" value="Agregar funcion">
        </form>
    </div>

    <div>
        <h2>Funciones registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pelicula</th>
                    <th>Sala</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tipo Funcion</th>
                    <th>Idioma</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?>
                <tr>

                    <th> <?= $row['id_funcion'] ?></th>
                    <th> <?= $row['titulo'] ?></th>
                    <th> <?= $row['nombre_sala'] ?></th>
                    <th> <?= $row['fecha'] ?></th>
                    <th> <?= $row['hora'] ?></th>
                    <th> <?= $row['tipo_funcion'] ?></th>
                    <th> <?= $row['idioma'] ?></th>
                    
                    <th><a href="update.php?id=<?= $row['id_funcion'] ?>">Editar</a></th>
                    <th><a href="delete_funcion.php?id=<?= $row['id_funcion'] ?>">Eliminar</a></th>
                </tr>
                <?php endwhile; ?>
            </tbody>    
        </table>
    </div>
</body>
</html>

