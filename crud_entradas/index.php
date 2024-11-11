<?php
    include('connection.php');

    $con = connection();

    $sql_funciones = "SELECT *, peliculas_crud_php.titulo AS titulo_pelicula, salas_crud_php.nombre_sala AS nombre_sala FROM funciones_crud_php JOIN peliculas_crud_php ON funciones_crud_php.id_pelicula = peliculas_crud_php.id_pelicula JOIN salas_crud_php ON funciones_crud_php.id_sala = salas_crud_php.id_sala";
    $query_funciones = mysqli_query($con, $sql_funciones);

    $sql_clientes = "SELECT * FROM clientes_crud_php JOIN entradas_crud_php ON clientes_crud_php.id_cliente = entradas_crud_php.id_cliente";
    $query_clientes = mysqli_query($con, $sql_clientes);

    $sql = "SELECT *, peliculas_crud_php.titulo AS titulo_pelicula, salas_crud_php.nombre_sala AS nombre_sala
                    FROM entradas_crud_php
                    JOIN funciones_crud_php ON entradas_crud_php.id_funcion = funciones_crud_php.id_funcion
                    JOIN peliculas_crud_php ON funciones_crud_php.id_pelicula = peliculas_crud_php.id_pelicula
                    JOIN salas_crud_php ON funciones_crud_php.id_sala = salas_crud_php.id_sala
                    JOIN clientes_crud_php ON entradas_crud_php.id_cliente = clientes_crud_php.id_cliente";

    $query = mysqli_query($con, $sql);

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crud Entradas</title>
    </head>
    <body>
        <div>
            <form action="insert_entradas.php" method="POST">
                <h1>Crear entradas</h1>
                
                <select id="funcion" name="id_funcion">
                    <option value="">Seleccione una función</option>
                        <?php while($row_funciones = mysqli_fetch_array($query_funciones)): ?>
                            <option value="<?= $row_funciones['id_funcion'] ?>"> <?= $row_funciones['titulo_pelicula'] . ' - ' . $row_funciones['fecha'] . ' - ' . $row_funciones['hora'] . ' - ' . $row_funciones['tipo_funcion'] . ' - ' . $row_funciones['idioma'] ?></option>
                        <?php endwhile;?>
                </select>

                <select id="cliente" name="id_cliente">
                    <option value="">Seleccione un cliente</option>
                        <?php while($row_clientes = mysqli_fetch_array($query_clientes)): ?>
                            <option value="<?= $row_clientes['id_cliente'] ?>"> <?= $row_clientes['nombre']?></option>
                        <?php endwhile;?>
                </select>

                <input type="number" name="cantidad">
                <input type="submit" value="Agregar funcion">
            </form>
        </div>

        <div>
            <h2>Funciones registradas</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Funcion</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Sala</th>
                        <th>Cliente</th>
                        <th>Cantidad</th>
                        <th>Precio total</th>
                        <th>Fecha compra</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT *, peliculas_crud_php.titulo AS titulo_pelicula, salas_crud_php.nombre_sala AS nombre_sala
                    FROM entradas_crud_php
                    JOIN funciones_crud_php ON entradas_crud_php.id_funcion = funciones_crud_php.id_funcion
                    JOIN peliculas_crud_php ON funciones_crud_php.id_pelicula = peliculas_crud_php.id_pelicula
                    JOIN salas_crud_php ON funciones_crud_php.id_sala = salas_crud_php.id_sala
                    JOIN clientes_crud_php ON entradas_crud_php.id_cliente = clientes_crud_php.id_cliente";

                    $query = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($query)): ?>
                    <tr>

                        <th> <?= $row['id_entrada'] ?></th>
                        <th> <?= $row['titulo_pelicula'] . ' - ' . $row['tipo_funcion'] . ' - ' . $row['idioma'] ?></th>
                        <th> <?= $row['fecha']?></th>
                        <th> <?= $row['hora'] ?></th>
                        <th> <?= $row['nombre_sala'] ?></th>
                        <th> <?= $row['nombre'] ?></th>
                        <th> <?= $row['cantidad'] ?></th>
                        <th> <?= $row['precio_total'] ?></th>
                        <th> <?= $row['fecha_compra'] ?></th>
                        <th><a href="update.php?id=<?= $row['id_entrada'] ?>">Editar</a></th>
                        <th><a href="delete_entradas.php?id=<?= $row['id_entrada'] ?>">Eliminar</a></th>
                    </tr>
                    <?php endwhile; ?>
                </tbody>    
            </table>
        </div>
    </body>
    </html>
