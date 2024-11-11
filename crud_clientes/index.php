<?php
    include('connection.php');

    $con = connection();

    $sql = "SELECT * FROM clientes_crud_php";

    $query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud clientes</title>
</head>
<body>
    <div>
        <form action="insert_cliente.php" method="POST">
            <h1>Crear clientes</h1>

            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="telefono" placeholder="Telefono">

            <input type="submit" value="Agregar cliente">
        </form>
    </div>

    <div>
        <h2>Clientes registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Fecha de registro</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php while($row = mysqli_fetch_array($query)): ?>
                <tr>

                    <th> <?= $row['id_cliente'] ?></th>
                    <th> <?= $row['nombre'] ?></th>
                    <th> <?= $row['email'] ?></th>
                    <th> <?= $row['telefono'] ?></th>
                    <th> <?= $row['fecha_registro'] ?></th>
                    
                    <th><a href="update.php?id=<?= $row['id_cliente'] ?>">Editar</a></th>
                    <th><a href="delete_cliente.php?id=<?= $row['id_cliente'] ?>">Eliminar</a></th>
                </tr>
                <?php endwhile; ?>
            </tbody>    
        </table>
    </div>
</body>
</html>