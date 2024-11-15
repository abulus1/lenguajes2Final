<?php
include('Cliente.php');

$id = $_GET['id'];
$cliente = new Cliente();
$row = $cliente->obtenerClientePorId($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>

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
                    <h1>Editar Cliente</h1>
                </div>
                <div class="card-body">
                    <form action="edit_cliente.php" method="POST" class="form-row">
                        <input type="hidden" name="id" value="<?php echo $row['id_cliente'] ?>">
                        <div class="form-group col-md-5">
                        <input type="text" name="nombre" placeholder="Nombre" class="form-control" value="<?php echo $row['nombre'] ?>">
                        </div>
                        <div class="form-group col-md-5">
                        <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $row['email'] ?>">
                        </div>
                        <div class="form-group col-md-5">
                        <input type="text" name="telefono" placeholder="Teléfono" class="form-control" value="<?php echo $row['telefono'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn-pink">Modificar Cliente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>
</body>
</html>
