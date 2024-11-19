<?php

session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.html');
    exit;
}

include('Funcion.php');
include('../crud_peliculas/Pelicula.php');
include('../crud_salas/Sala.php');

$funcion = new Funcion();
$funciones = $funcion->obtenerTodasLasFunciones();

$pelicula = new Pelicula();
$peliculas = $pelicula->obtenerTodasLasPeliculas();

$sala = new Sala();
$salas = $sala->obtenerTodasLasSalas();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Funciones</title>
    <link rel="icon" href="../../assets/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../../assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="../../assets/css/owl.css">
    <link rel="stylesheet" href="../../assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="../../assets/css/peliculas.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <?php include('../../components/header.php'); ?>

    <div class="page-content mt-0">
        <div class="container">
            <div class="card-template mb-4">
                <div class="header-card">
                    <h1>Crear Funcion</h1>
                </div>
                <div class="card-body">
                    <form action="create_funcion.php" method="POST" class="form-row">
                        <div class="form-group col-md-5">
                            <select name="id_pelicula" class="form-control" required>
                                <option value="">Seleccione Pelicula</option>
                                <?php foreach ($peliculas as $row_peliculas): ?>
                                    <option value="<?= $row_peliculas['id_pelicula'] ?>"><?= $row_peliculas['titulo'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <select name="id_sala" class="form-control" required>
                                <option value="">Seleccione Sala</option>
                                <?php foreach ($salas as $row_salas): ?>
                                    <option value="<?= $row_salas['id_sala'] ?>"><?= $row_salas['nombre_sala'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <input type="date" name="fecha" placeholder="Fecha" class="form-control" required>
                        </div>
                        <div class="form-group col-md-5">
                            <input type="time" name="hora" placeholder="Hora" class="form-control" required>
                        </div>
                        <div class="form-group col-md-5">
                            <select name="tipo_funcion" class="form-control" required>
                                <option value="2D">2D</option>
                                <option value="3D">3D</option>
                                <option value="TURBO">TURBO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <select name="idioma" class="form-control" required>
                                <option value="CAST">CAST</option>
                                <option value="SUB">SUB</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <button type="submit" class="btn-pink">Agregar Función</button>
                        </div>
                    </form>
                </div>
            </div>

            <div>
                <h2>Funciones Registradas</h2>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Función</th>
                            <th>Película</th>
                            <th>Sala</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Formato</th>
                            <th>Idioma</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($funciones as $row): ?>
                            <tr>
                                <td class="text-white"><?= $row['id_funcion'] ?></td>
                                <?php
                                    $pelicula_datos = $pelicula->obtenerPeliculaPorId($row['id_pelicula']);
                                ?>
                                <td class="text-white"><?= $pelicula_datos['titulo'] ?></td>
                                <?php
                                    $salas_datos = $sala->obtenerSalaPorId($row['id_sala']);
                                ?>
                                <td class="text-white"><?= $salas_datos['nombre_sala'] ?></td>
                                <td class="text-white"><?= $row['fecha'] ?></td>
                                <td class="text-white"><?= $row['hora'] ?></td>
                                <td class="text-white"><?= $row['tipo_funcion'] ?></td>
                                <td class="text-white"><?= $row['idioma'] ?></td>
                                <td><a href="update_funcion.php?id=<?= $row['id_funcion'] ?>" class="btn btn-warning btn-sm">Editar</a></td>
                                <td><a href="delete_funcion.php?id=<?= $row['id_funcion'] ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>