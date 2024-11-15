<?php
include('Entrada.php');

$entrada = new Entrada();
$entradas = $entrada->obtenerTodasLasEntradas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Entradas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Clientes</title>
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
                    <h1>Crear Entrada</h1>
                </div>
                <div class="card-body">
                    <form action="create_sala.php" method="POST" class="form-row">
                        <div class="form-group col-md-5">
                        <input type="number" name="id_funcion" placeholder="ID Función" required>
                        </div>
                        <div class="form-group col-md-5">
                        <input type="number" name="id_cliente" placeholder="ID Cliente" required>
                        </div>
                        <div class="form-group col-md-5">
                        <input type="number" name="cantidad" placeholder="Cantidad" required>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn-pink">Agregar Entrada</button>
                        </div>
                    </form>
                </div>
            </div>
    <div>
    <div>
        <h2>Entradas Registradas</h2>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Entrada</th>
                    <th>ID Función</th>
                    <th>ID Cliente</th>
                    <th>Cantidad</th>
                    <th>Precio Total</th>
                    <th>Fecha Compra</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entradas as $row): ?>
                    <tr>
                        <td class="text-white"> <td class="text-white"><?= $row['id_entrada'] ?></td>
                        <td class="text-white"><?= $row['id_funcion'] ?></td>
                        <td class="text-white"><?= $row['id_cliente'] ?></td>
                        <td class="text-white"><?= $row['cantidad'] ?></td>
                        <td class="text-white"><?= $row['precio_total'] ?></td>
                        <td class="text-white"><?= $row['fecha_compra'] ?></td>
                        <td class="text-white"><a href="update_entrada.php?id=<?= $row['id_entrada'] ?>">Editar</a></td>
                        <td class="text-white"><a href="delete_entrada.php?id=<?= $row['id_entrada'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
