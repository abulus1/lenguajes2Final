<?php
include('Entrada.php');

$id = $_GET['id'];
$entrada = new Entrada();
$row = $entrada->obtenerEntradaPorId($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Entrada</title>
</head>
<body>
    <div>
        <form action="edit_entrada.php" method="POST">
            <h1>Editar Entrada</h1>
            <input type="hidden" name="id" value="<?php echo $row['id_entrada'] ?>">
            <input type="number" name="id_funcion" placeholder="ID Función" value="<?php echo $row['id_funcion'] ?>">
            <input type="number" name="id_cliente" placeholder="ID Cliente" value="<?php echo $row['id_cliente'] ?>">
            <input type="number" name="cantidad" placeholder="Cantidad" value="<?php echo $row['cantidad'] ?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
