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
</head>
<body>
    <div>
        <form action="create_entrada.php" method="POST">
            <h1>Crear Entrada</h1>
            <input type="number" name="id_funcion" placeholder="ID Función">
            <input type="number" name="id_cliente" placeholder="ID Cliente">
            <input type="number" name="cantidad" placeholder="Cantidad">
            <input type="submit" value="Agregar Entrada">
        </form>
    </div>

    <div>
        <h2>Entradas Registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Entrada</th>
                    <th>ID Función</th>
                    <th>ID Cliente</th>
                    <th>Cantidad</th>
                    <th>Precio Total</th>
                    <th>Fecha Compra</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entradas as $row): ?>
                    <tr>
                        <td><?= $row['id_entrada'] ?></td>
                        <td><?= $row['id_funcion'] ?></td>
                        <td><?= $row['id_cliente'] ?></td>
                        <td><?= $row['cantidad'] ?></td>
                        <td><?= $row['precio_total'] ?></td>
                        <td><?= $row['fecha_compra'] ?></td>
                        <td><a href="update_entrada.php?id=<?= $row['id_entrada'] ?>">Editar</a></td>
                        <td><a href="delete_entrada.php?id=<?= $row['id_entrada'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
