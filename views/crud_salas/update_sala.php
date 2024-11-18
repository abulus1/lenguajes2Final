<?php
include('Sala.php');

$id = $_GET['id'];
$sala = new Sala();
$row = $sala->obtenerSalaPorId($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sala</title>

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
                    <h1>Editar Sala</h1>
                </div>
                <div class="card-body">
                    <form action="edit_sala.php" method="POST" class="form-row">
                        <input type="hidden" name="id" value="<?php echo $row['id_sala'] ?>">
                        <div class="form-group col-md-5">
                            <input type="text" name="nombre_sala" placeholder="Nombre Sala" class="form-control" value="<?php echo $row['nombre_sala'] ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <input type="number" name="capacidad" placeholder="Capacidad" class="form-control" value="<?php echo $row['capacidad'] ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn-pink">Modificar sala</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>   
</body>
</html>
