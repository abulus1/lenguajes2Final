<?php
include('Entrada.php');
include('../crud_funciones/Funcion.php');
include('../crud_peliculas/Pelicula.php');
include('../crud_salas/Sala.php');
include('../crud_clientes/Cliente.php');

$entrada = new Entrada();
$entradas = $entrada->obtenerTodasLasEntradas();

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
    <title>CRUD Entradas</title>

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
                    <form action="create_entrada.php" method="POST" class="form-row">
                        <div class="form-group col-md-5">
                            <select name="id_funcion" class="form-control" required>
                                <option value="">Seleccione Funcion</option>
                                <?php foreach ($funciones as $row_funciones): ?>
                                    <?php
                                        $pelicula = new Pelicula();
                                        $pelicula_datos = $pelicula->obtenerPeliculaPorId($row_funciones['id_pelicula']);
                                        
                                        $salas = new Sala();
                                        $salas_datos = $salas->obtenerSalaPorId($row_funciones['id_sala']);
                                    ?>
                                    <option value="<?= $row_funciones['id_funcion'] ?>"><?= $pelicula_datos['titulo'] . ' - ' . $salas_datos['nombre_sala'] . ' - ' .  $row_funciones['fecha'] . ' - ' . $row_funciones['hora'] . ' - ' . $row_funciones['tipo_funcion'] . ' - ' . $row_funciones['idioma'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                            <select name="id_cliente" class="form-control" required>
                                <option value="">Seleccione Cliente</option>
                                <?php foreach ($clientes as $row_clientes): ?>
                                    <option value="<?= $row_clientes['id_cliente'] ?>"><?= $row_clientes['nombre'] . ' - ' . $row_clientes['email']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-5">
                        <input type="number" name="cantidad" placeholder="Cantidad" class="form-control" required>
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
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entradas as $row): ?>
                    <tr>
                        <td class="text-white"><?= $row['id_entrada'] ?></td>
                        <?php
                            $funcion = new Funcion();
                            $funcion_datos = $funcion->obtenerFuncionPorId($row['id_funcion']);
                            $pelicula = new Pelicula();
                            $pelicula_datos = $pelicula->obtenerPeliculaPorId($funcion_datos['id_pelicula']);
                            $salas = new Sala();
                            $salas_datos = $salas->obtenerSalaPorId($funcion_datos['id_sala']);
                        ?>
                        <td class="text-white"><?= $pelicula_datos['titulo']  . ' - ' .  $salas_datos['nombre_sala'] . ' - ' . $funcion_datos['fecha'] . ' - ' . $funcion_datos['hora'] . ' - ' . $funcion_datos['tipo_funcion'] . ' - ' . $funcion_datos['idioma'] ?></td>
                        <?php
                            $cliente = new Cliente();
                            $cliente_datos = $cliente->obtenerClientePorId($row['id_cliente']);
                        ?>
                        <td class="text-white"><?= $cliente_datos['nombre']?></td>
                        <td class="text-white"><?= $row['cantidad'] ?></td>
                        <td class="text-white"><?= $row['precio_total'] ?></td>
                        <td class="text-white"><?= $row['fecha_compra'] ?></td>
                        <td><a href="update_entrada.php?id=<?= $row['id_entrada'] ?>" class="btn btn-warning btn-sm">Editar</a></td>
                        <td><a href="delete_entrada.php?id=<?= $row['id_entrada'] ?>" class="btn btn-danger btn-sm">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
