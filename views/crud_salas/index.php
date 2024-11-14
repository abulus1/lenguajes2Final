<?php
include('Sala.php');

$sala = new Sala();
$salas = $sala->obtenerTodasLasSalas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Salas</title>

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
                    <h1>Crear Sala</h1>
                </div>
                <div class="card-body">
                    <form action="create_sala.php" method="POST" class="form-row">
                        <div class="form-group col-md-5">
                            <input type="text" name="nombre_sala" placeholder="Nombre Sala" class="form-control" required>
                        </div>
                        <div class="form-group col-md-5">
                            <input type="number" name="capacidad" placeholder="Capacidad" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn-pink">Agregar Sala</button>
                        </div>
                    </form>
                </div>
            </div>

            <div>
                <h2>Salas Registradas</h2>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Sala</th>
                            <th>Nombre Sala</th>
                            <th>Capacidad</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($salas as $row): ?>
                            <tr>
                                <td class="text-white"><?= $row['id_sala'] ?></td>
                                <td class="text-white"><?= $row['nombre_sala'] ?></td>
                                <td class="text-white"><?= $row['capacidad'] ?></td>
                                <td><a href="update_sala.php?id=<?= $row['id_sala'] ?>" class="btn btn-warning btn-sm">Editar</a></td>
                                <td><a href="delete_sala.php?id=<?= $row['id_sala'] ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
