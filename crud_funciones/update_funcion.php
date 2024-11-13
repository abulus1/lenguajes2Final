<?php
include('Funcion.php');

$id = $_GET['id'];
$funcion = new Funcion();
$row = $funcion->obtenerFuncionPorId($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Función</title>
</head>
<body>
    <div>
        <form action="edit_funcion.php" method="POST">
            <h1>Editar Función</h1>
            <input type="hidden" name="id" value="<?php echo $row['id_funcion'] ?>">
            <input type="number" name="id_pelicula" placeholder="ID Película" value="<?php echo $row['id_pelicula'] ?>">
            <input type="number" name="id_sala" placeholder="ID Sala" value="<?php echo $row['id_sala'] ?>">
            <input type="date" name="fecha" placeholder="Fecha" value="<?php echo $row['fecha'] ?>">
            <input type="time" name="hora" placeholder="Hora" value="<?php echo $row['hora'] ?>">
            <select name="tipo_funcion">
                <option value="2D" <?= $row['tipo_funcion'] == '2D' ? 'selected' : '' ?>>2D</option>
                <option value="3D" <?= $row['tipo_funcion'] == '3D' ? 'selected' : '' ?>>3D</option>
                <option value="TURBO" <?= $row['tipo_funcion'] == 'TURBO' ? 'selected' : '' ?>>TURBO</option>
            </select>
            <select name="idioma">
                <option value="CAST" <?= $row['idioma'] == 'CAST' ? 'selected' : '' ?>>CAST</option>
                <option value="SUB" <?= $row['idioma'] == 'SUB' ? 'selected' : '' ?>>SUB</option>
            </select>
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
