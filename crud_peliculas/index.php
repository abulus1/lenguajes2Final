<?php
include('Pelicula.php');

$pelicula = new Pelicula();
$peliculas = $pelicula->obtenerTodasLasPeliculas();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Películas</title>
</head>

<body>
    <div>
        <form action="create-film.php" method="POST">
            <h1>Crear Película</h1>

            <input type="text" name="titulo" placeholder="Título">
            <input type="text" name="descripcion" placeholder="Descripción">
            <input type="text" name="director" placeholder="Director">
            <input type="text" name="genero" placeholder="Género">
            <input type="text" name="duracion" placeholder="Duración">
            <input type="text" name="clasificacion" placeholder="Clasificación">
            <input type="text" name="imagen" placeholder="URL Imagen">

            <input type="submit" value="Agregar Película">
        </form>
    </div>

    <div>
        <h2>Películas Registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Director</th>
                    <th>Género</th>
                    <th>Duración</th>
                    <th>Clasificación</th>
                    <th>Imagen</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($peliculas as $row): ?>
                    <tr>
                        <td><?= $row['id_pelicula'] ?></td>
                        <td><?= $row['titulo'] ?></td>
                        <td><?= $row['descripcion'] ?></td>
                        <td><?= $row['director'] ?></td>
                        <td><?= $row['genero'] ?></td>
                        <td><?= $row['duracion'] ?></td>
                        <td><?= $row['clasificacion'] ?></td>
                        <td><img src="<?= $row['imagen'] ?>" width="50" height="50" alt=""></td>
                        <td><a href="update.php?id=<?= $row['id_pelicula'] ?>">Editar</a></td>
                        <td><a href="delete_film.php?id=<?= $row['id_pelicula'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>