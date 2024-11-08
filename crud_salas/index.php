<?php
    include('connection.php');

    $con = connection();

    $sql = "SELECT * FROM salas_crud_php";

    $query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud salas</title>
</head>
<body>
    <div>
        <form action="insert_salas.php" method="POST">
            <h1>Crear salas</h1>

            <input type="text" name="numeroSala" placeholder="Numero de sala">
            <input type="text" name="capacidad" placeholder="Capacidad">

            <input type="submit" value="Agregar pelicula">
        </form>
    </div>

    <div>
        <h2>Salas registradas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>numeroSala</th>
                    <th>Capacidad</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?>
                <tr>

                    <th> <?= $row['id_sala'] ?></th>
                    <th> <?= $row['nombre_sala'] ?></th>
                    <th> <?= $row['capacidad'] ?></th>
                    <th><a href="update.php?id=<?= $row['id_sala'] ?>">Editar</a></th>
                    <th><a href="delete_salas.php?id=<?= $row['id_sala'] ?>">Eliminar</a></th>
                </tr>
                <?php endwhile; ?>
            </tbody>    
        </table>
    </div>
</body>
</html>