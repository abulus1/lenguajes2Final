<?php

session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.html');
    exit;
}

include('Cliente.php');

$cliente = new Cliente();
$clientes = $cliente->obtenerTodosLosClientes();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Clientes</title>
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

    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success">Cliente eliminado correctamente.</div>
    <?php endif; ?>

    <?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
        <div class="alert alert-danger">Hubo un error al intentar eliminar el cliente. Inténtalo nuevamente.</div>
    <?php endif; ?>

    <?php if (isset($_GET['error']) && $_GET['error'] == 'foreign_key'): ?>
        <div class="alert alert-warning">
            No se puede eliminar este cliente porque está asociado a otras entradas.
        </div>
    <?php endif; ?>

    <?php include('../../components/header.php'); ?>

    <div class="page-content mt-0">
        <div class="container">
            <div class="card-template mb-4">
                <div class="header-card">
                    <h1>Crear Cliente</h1>
                </div>
                <div class="card-body">
                    <form action="create_cliente.php" method="POST" class="form-row">
                        <div class="form-group col-md-5">
                            <input type="text" name="nombre" placeholder="Nombre Usuario" class="form-control" required>
                        </div>
                        <div class="form-group col-md-5">
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        <div class="form-group col-md-5">
                            <input type="number" name="telefono" placeholder="Telefono" class="form-control" required>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn-pink">Agregar Cliente</button>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <h2>Clientes Registrados</h2>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Fecha Registro</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $row): ?>
                            <tr>
                                <td class="text-white"><?= $row['id_cliente'] ?></td>
                                <td class="text-white"><?= $row['nombre'] ?></td>
                                <td class="text-white"><?= $row['email'] ?></td>
                                <td class="text-white"><?= $row['telefono'] ?></td>
                                <td class="text-white"><?= $row['fecha_registro'] ?></td>
                                <td><a href="update_cliente.php?id=<?= $row['id_cliente'] ?>" class="btn btn-warning btn-sm">Editar</a></td>
                                <td><a href="delete_cliente.php?id=<?= $row['id_cliente'] ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
</body>

</html>