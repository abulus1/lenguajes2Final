<?php
include('Pelicula.php');
include('../genero/Genero.php');
include('../clasificacion/Clasificacion.php');

$id = $_GET['id'];
$pelicula = new Pelicula();
$row = $pelicula->obtenerPeliculaPorId($id);

$genero = new Genero();
$generos = $genero->obtenerTodosLosGeneros();

$clasificacion = new Clasificacion();
$clasificaciones = $clasificacion->obtenerTodasLasClasificaciones();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Película</title>

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
                    <h1>Editar pelicula</h1>
                </div>
                <div class="card-body">
                    <form action="edit_film.php" method="POST" class="form-row">
                        <input type="hidden" name="id" value="<?php echo $row['id_pelicula'] ?>">
                        <div class="form-group col-md-4">
                            <input type="text" name="titulo" placeholder="TITULO" class="form-control" value="<?php echo $row['titulo'] ?>">
                        </div>
                        <div class="form-group col-md-8">
                            <input type="text" name="descripcion" placeholder="DESCRIPCION" class="form-control" value="<?php echo $row['descripcion'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="director" placeholder="DIRECTOR" class="form-control" value="<?php echo $row['director'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <select name="genero" class="form-control" required>
                                <option value="">Seleccione un género</option>
                                <?php foreach ($generos as $g): ?>
                                    <option value="<?= $g['id_genero'] ?>" <?= $g['id_genero'] == $row['id_genero'] ? 'selected' : '' ?>><?= $g['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" name="duracion" placeholder="DURACION" class="form-control" value="<?php echo $row['duracion'] ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <select name="clasificacion" class="form-control" required>
                                <option value="">Seleccione una clasificación</option>
                                <?php foreach ($clasificaciones as $c): ?>
                                    <option value="<?= $c['id_clasificacion'] ?>" <?= $c['id_clasificacion'] == $row['id_clasificacion'] ? 'selected' : '' ?>><?= $c['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="imagen" placeholder="IMAGEN" class="form-control" value="<?php echo $row['imagen'] ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn-pink">Modificar Película</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
