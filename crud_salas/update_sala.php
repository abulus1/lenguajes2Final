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
</head>
<body>
    <div>
        <form action="edit_sala.php" method="POST">
            <h1>Editar Sala</h1>
            <input type="hidden" name="id" value="<?php echo $row['id_sala'] ?>">
            <input type="text" name="nombre_sala" placeholder="Nombre Sala" value="<?php echo $row['nombre_sala'] ?>">
            <input type="number" name="capacidad" placeholder="Capacidad" value="<?php echo $row['capacidad'] ?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
