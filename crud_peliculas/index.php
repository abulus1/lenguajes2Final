<?php
    include('connection.php');

    $con = connection();

    $sql = "SELECT * FROM peliculas";

    $query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud peliculas</title>
</head>
<body>
    <div>
        <form action="insert_film.php" method="POST">
            <h1>Crear peliculas</h1>

            <input type="text" name="titulo" placeholder="Titulo">
            <input type="text" name="descripcion" placeholder="Descripcion">
            <input type="text" name="director" placeholder="Director">
            <input type="text" name="genero" placeholder="Genero">
            <input type="text" name="duracion" placeholder="Duracion">
            <input type="text" name="clasificacion" placeholder="Clasificacion">

            <input type="submit" value="Agregar pelicula">
        </form>
    </div>

    <div>
        <h2>Peliculas registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Director</th>
                    <th>Genero</th>
                    <th>Duracion</th>
                    <th>Clasificacion</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?>
                <tr>

                    <th> <?= $row['id_pelicula'] ?></th>
                    <th> <?= $row['titulo'] ?></th>
                    <th> <?= $row['descripcion'] ?></th>
                    <th> <?= $row['director'] ?></th>
                    <th> <?= $row['genero'] ?></th>
                    <th> <?= $row['duracion'] ?></th>
                    <th> <?= $row['clasificacion'] ?></th>
                    
                    <th><a href="update.php?id=<?= $row['id_pelicula'] ?>">Editar</a></th>
                    <th><a href="delete_film.php?id=<?= $row['id_pelicula'] ?>">Eliminar</a></th>
                </tr>
                <?php endwhile; ?>
            </tbody>    
        </table>
    </div>
</body>
</html>