<?php
include('Entrada.php');
include('../crud_funciones/Funcion.php');
include('../crud_peliculas/Pelicula.php');
include('../crud_salas/Sala.php');
include('../crud_clientes/Cliente.php');

$id = $_GET['id'];
$entrada = new Entrada();
$row = $entrada->obtenerEntradaPorId($id);

$funcion = new Funcion();
$funciones = $funcion->obtenerTodasLasFunciones();

$cliente = new Cliente();
$clientes = $cliente->obtenerTodosLosClientes();
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Entrada</title>

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
                    <h1>Editar Entrada</h1>
                </div>
                <div class="card-body">
                    <form action="edit_entrada.php" method="POST" class="form-row">
                        <input type="hidden" name="id" value="<?php echo $row['id_entrada'] ?>">
                        <div class="form-group col-md-5">
                            <select name="id_funcion" class="form-control">
                                <?php foreach ($funciones as $row_funciones): ?>
                                    <?php
                                        $pelicula = new Pelicula();
                                        $pelicula_datos = $pelicula->obtenerPeliculaPorId($row_funciones['id_pelicula']);

                                        $salas = new Sala();
                                        $salas_datos = $salas->obtenerSalaPorId($row_funciones['id_sala']);
                                    ?>
                                    <option value="<?= $row_funciones['id_funcion'] ?>" <?= $row_funciones['id_funcion'] == $row['id_funcion'] ? 'selected' : '' ?>><?= $pelicula_datos['titulo'] . ' - ' . $salas_datos['nombre_sala'] . ' - ' .  $row_funciones['fecha'] . ' - ' . $row_funciones['hora'] . ' - ' . $row_funciones['tipo_funcion'] . ' - ' . $row_funciones['idioma'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <select name="id_cliente" class="form-control">
                                <?php foreach ($clientes as $row_clientes): ?>
                                    <option value="<?= $row_clientes['id_cliente'] ?>" <?= $row_clientes['id_cliente'] == $row['id_cliente'] ? 'selected' : '' ?>><?= $row_clientes['nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <input type="number" name="cantidad" placeholder="Cantidad" class="form-control" value="<?php echo $row['cantidad'] ?>">
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
