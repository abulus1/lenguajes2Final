<?php
http_response_code(404);
require_once(dirname(__FILE__) . '/config.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error 404 - Página No Encontrada</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/404.css">
</head>

<body>
  <div class="container">
    <div class="error-content">
      <h1>404</h1>
      <h2>Página No Encontrada</h2>
      <p>Lo sentimos, la página que estás buscando no existe o no tienes los permisos suficientes.</p>
      <a href="<?= BASE_URL ?>index.php">Volver al inicio</a>
    </div>
  </div>
</body>

</html>