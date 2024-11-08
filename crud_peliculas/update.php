<?php
include('connection.php');
$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM peliculas_crud_php WHERE id_pelicula = '$id'";
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
        <form action="edit_film.php" method="POST">
            <h1>Editar pelicula</h1>
            <input type="hidden" name="id" value="<?php echo $row['id_pelicula'] ?>">
            <input type="text" name="titulo" placeholder="TITULO" value="<?php echo $row['titulo'] ?>">
            <input type="text" name="descripcion" placeholder="DESCRIPCION" value="<?php echo $row['descripcion'] ?>">
            <input type="text" name="director" placeholder="DIRECTOR" value="<?php echo $row['director'] ?>">
            <input type="text" name="genero" placeholder="GENERO" value="<?php echo $row['genero'] ?>">
            <input type="text" name="duracion" placeholder="DURACION" value="<?php echo $row['duracion'] ?>">
            <input type="text" name="clasificacion" placeholder="CLASIFICACION" value="<?php echo $row['clasificacion'] ?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>