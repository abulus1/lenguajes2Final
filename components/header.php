<?php
require_once dirname(__FILE__) . '/../config.php';
include_once dirname(__FILE__) . '/../session.php';
?>
<header class="header-area position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <a href="<?= BASE_URL ?>index.php" class="logo">
            <img src="<?= BASE_URL ?>assets/images/logo.png" alt="">
          </a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <?php if (isset($_SESSION['email'])): ?>
              <!-- Opciones exclusivas para usuarios logueados -->
              <li><a href="<?= BASE_URL ?>index.php">Home</a></li>
              <li><a href="<?= BASE_URL ?>views/crud_peliculas/index.php">Peliculas</a></li>
              <li><a href="<?= BASE_URL ?>views/crud_funciones/index.php">Funciones</a></li>
              <li><a href="<?= BASE_URL ?>views/crud_clientes/index.php">Clientes</a></li>
              <li><a href="<?= BASE_URL ?>views/crud_salas/index.php">Salas</a></li>
              <li><a href="<?= BASE_URL ?>views/crud_entradas/index.php">Entradas</a></li>
              <!-- Botón de cerrar sesión -->
              <li class="logout-option"><a href="<?= BASE_URL ?>views/login_register/logout.php">Cerrar sesión</a></li>
            <?php else: ?>
              <!-- Opción de inicio de sesión para usuarios no logueados -->
              <li><a href="<?= BASE_URL ?>views/login_register/index.php" class="active">Iniciar sesión</a></li>
            <?php endif; ?>
          </ul>
          <a class="menu-trigger">
            <span>Menu</span>
          </a>
          <!-- ***** Menu End ***** -->
        </nav>
      </div>
    </div>
  </div>
</header>