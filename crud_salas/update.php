<?php
include('connection.php');
$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM salas_crud_php WHERE id_sala = '$id'";
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
        <form action="edit_salas.php" method="POST">
            <h1>Editar sala</h1>
            <input type="hidden" name="id" value="<?php echo $row['id_sala'] ?>">
            <input type="text" name="numeroSala" placeholder="NUMERO DE SALA" value="<?php echo $row['nombre_sala'] ?>">
            <input type="text" name="capacidad" placeholder="CAPACIDAD" value="<?php echo $row['capacidad'] ?>">

            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>