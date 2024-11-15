<?php
require_once dirname(__FILE__) . '/../config.php';
session_start();
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
            <li><a href="<?= BASE_URL ?>index.php" class="active">Home</a></li>
            <li><a href="<?= BASE_URL ?>#most-popular">Cartelera</a></li>
            <li><a href="<?= BASE_URL ?>#gaming-library">Funciones</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
              <li><a href="<?= BASE_URL ?>views/login_register/logout.php">Cerrar sesión</a></li>
            <?php else: ?>
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