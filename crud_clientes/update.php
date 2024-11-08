<?php
include('connection.php');
$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM clientes_crud_php WHERE id_cliente = '$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="edit_cliente.php" method="POST">
            <h1>Editar clientes</h1>
            <input type="hidden" name="id" value="<?php echo $row['id_cliente'] ?>">
            <input type="text" name="nombre" placeholder="NOMBRE" value="<?php echo $row['nombre'] ?>">
            <input type="text" name="email" placeholder="EMAIL" value="<?php echo $row['email'] ?>">
            <input type="text" name="telefono" placeholder="TELEFONO" value="<?php echo $row['telefono'] ?>">
            <input type="text" name="fechaRegistro" placeholder="fechaRegistro" value="<?php echo $row['fechaRegistro'] ?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>