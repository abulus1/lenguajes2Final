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
</head>
<body>
    <div>
        <form action="create_sala.php" method="POST">
            <h1>Crear Sala</h1>
            <input type="text" name="nombre_sala" placeholder="Nombre Sala">
            <input type="number" name="capacidad" placeholder="Capacidad">
            <input type="submit" value="Agregar Sala">
        </form>
    </div>

    <div>
        <h2>Salas Registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Sala</th>
                    <th>Nombre Sala</th>
                    <th>Capacidad</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salas as $row): ?>
                    <tr>
                        <td><?= $row['id_sala'] ?></td>
                        <td><?= $row['nombre_sala'] ?></td>
                        <td><?= $row['capacidad'] ?></td>
                        <td><a href="update_sala.php?id=<?= $row['id_sala'] ?>">Editar</a></td>
                        <td><a href="delete_sala.php?id=<?= $row['id_sala'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
