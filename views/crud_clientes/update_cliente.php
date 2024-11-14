<?php
include('Cliente.php');

$id = $_GET['id'];
$cliente = new Cliente();
$row = $cliente->obtenerClientePorId($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
    <div>
        <form action="edit_cliente.php" method="POST">
            <h1>Editar Cliente</h1>
            <input type="hidden" name="id" value="<?php echo $row['id_cliente'] ?>">
            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre'] ?>">
            <input type="email" name="email" placeholder="Email" value="<?php echo $row['email'] ?>">
            <input type="text" name="telefono" placeholder="Teléfono" value="<?php echo $row['telefono'] ?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
