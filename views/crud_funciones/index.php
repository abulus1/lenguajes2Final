<?php
include('Funcion.php');

$funcion = new Funcion();
$funciones = $funcion->obtenerTodasLasFunciones();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Funciones</title>
</head>
<body>
    <div>
        <form action="create_funcion.php" method="POST">
            <h1>Crear Función</h1>
            <input type="number" name="id_pelicula" placeholder="ID Película">
            <input type="number" name="id_sala" placeholder="ID Sala">
            <input type="date" name="fecha" placeholder="Fecha">
            <input type="time" name="hora" placeholder="Hora">
            <select name="tipo_funcion">
                <option value="2D">2D</option>
                <option value="3D">3D</option>
                <option value="TURBO">TURBO</option>
            </select>
            <select name="idioma">
                <option value="CAST">CAST</option>
                <option value="SUB">SUB</option>
            </select>
            <input type="submit" value="Agregar Función">
        </form>
    </div>

    <div>
        <h2>Funciones Registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Función</th>
                    <th>ID Película</th>
                    <th>ID Sala</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Tipo de Función</th>
                    <th>Idioma</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($funciones as $row): ?>
                    <tr>
                        <td><?= $row['id_funcion'] ?></td>
                        <td><?= $row['id_pelicula'] ?></td>
                        <td><?= $row['id_sala'] ?></td>
                        <td><?= $row['fecha'] ?></td>
                        <td><?= $row['hora'] ?></td>
                        <td><?= $row['tipo_funcion'] ?></td>
                        <td><?= $row['idioma'] ?></td>
                        <td><a href="update_funcion.php?id=<?= $row['id_funcion'] ?>">Editar</a></td>
                        <td><a href="delete_funcion.php?id=<?= $row['id_funcion'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
