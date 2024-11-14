<?php
include('Funcion.php');
include('../crud_peliculas/Pelicula.php');
include('../crud_salas/Sala.php');

$id = $_GET['id'];
$funcion = new Funcion();
$row = $funcion->obtenerFuncionPorId($id);

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
    <title>Editar Función</title>

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
                    <h1>Editar Función</h1>
                </div>
                <div class="card-body">
                    <form action="edit_funcion.php" method="POST" class="form-row">
                        <input type="hidden" name="id" value="<?php echo $row['id_funcion'] ?>">
                        <div class="form-group col-md-5">
                            <select name="id_pelicula" class="form-control" required>
                                <?php foreach ($peliculas as $row_peliculas): ?>
                                    <option value="<?= $row_peliculas['id_pelicula'] ?>" <?= $row_peliculas['id_pelicula'] == $row['id_pelicula'] ? 'selected' : '' ?>><?= $row_peliculas['titulo'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <select name="id_sala" class="form-control" required>
                                <?php foreach ($salas as $row_salas): ?>
                                    <option value="<?= $row_salas['id_sala'] ?>" <?= $row_salas['id_sala'] == $row['id_sala'] ? 'selected' : '' ?>><?= $row_salas['nombre_sala'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <input type="date" name="fecha" placeholder="Fecha" class="form-control" value="<?php echo $row['fecha'] ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <input type="time" name="hora" placeholder="Hora" class="form-control" value="<?php echo $row['hora'] ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <select name="tipo_funcion" class="form-control">
                                <option value="2D" <?= $row['tipo_funcion'] == '2D' ? 'selected' : '' ?>>2D</option>
                                <option value="3D" <?= $row['tipo_funcion'] == '3D' ? 'selected' : '' ?>>3D</option>
                                <option value="TURBO" <?= $row['tipo_funcion'] == 'TURBO' ? 'selected' : '' ?>>TURBO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <select name="idioma" class="form-control">
                                <option value="CAST" <?= $row['idioma'] == 'CAST' ? 'selected' : '' ?>>CAST</option>
                                <option value="SUB" <?= $row['idioma'] == 'SUB' ? 'selected' : '' ?>>SUB</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn-pink">Actualizar Función</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
