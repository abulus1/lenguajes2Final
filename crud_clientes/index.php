<?php
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
</head>
<body>
    <div>
        <form action="create_cliente.php" method="POST">
            <h1>Crear Cliente</h1>
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="telefono" placeholder="Teléfono">
            <input type="submit" value="Agregar Cliente">
        </form>
    </div>

    <div>
        <h2>Clientes Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Fecha Registro</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $row): ?>
                    <tr>
                        <td><?= $row['id_cliente'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['telefono'] ?></td>
                        <td><?= $row['fecha_registro'] ?></td>
                        <td><a href="update_cliente.php?id=<?= $row['id_cliente'] ?>">Editar</a></td>
                        <td><a href="delete_cliente.php?id=<?= $row['id_cliente'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
