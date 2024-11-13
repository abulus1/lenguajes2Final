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
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <!-- Formulario para agregar una nueva película -->
        <div class="card mb-4">
            <div class="card-header">
                <h1>Crear Película</h1>
            </div>
            <div class="card-body">
                <form action="create-film.php" method="POST" class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" name="titulo" placeholder="Título" class="form-control" required>
                    </div>
                    <div class="form-group col-md-8">
                        <input type="text" name="descripcion" placeholder="Descripción" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="director" placeholder="Director" class="form-control" required>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="genero" placeholder="Género" class="form-control" required>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="number" name="duracion" placeholder="Duración" class="form-control" required>
                    </div>
                    <div class="form-group col-md-2">
                        <input type="text" name="clasificacion" placeholder="Clasificación" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" name="imagen" placeholder="URL Imagen" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">Agregar Película</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla para mostrar las películas registradas -->
        <h2>Películas Registradas</h2>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Director</th>
                    <th>Género</th>
                    <th>Duración</th>
                    <th>Clasificación</th>
                    <th>Imagen</th>
                    <th colspan="2">Acciones</th>
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
                        <td class="d-flex justify-content-center align-items-center"><img class="w-100" src="<?= $row['imagen'] ?>" alt="Imagen de la película"></td>
                        <td><a href="update.php?id=<?= $row['id_pelicula'] ?>" class="btn btn-warning btn-sm">Editar</a></td>
                        <td><a href="delete_film.php?id=<?= $row['id_pelicula'] ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>