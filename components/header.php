<!-- header.php -->
<?php
$base_url = "http://localhost/lenguajes/";
?>
<header class="header-area position-relative">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <a href="<?= $base_url ?>index.php" class="logo">
            <img src="<?= $base_url ?>assets/images/logo.png" alt="">
          </a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li><a href="<?= $base_url ?>index.php" class="active">Home</a></li>
            <li><a href="<?= $base_url ?>#most-popular">Cartelera</a></li>
            <li><a href="<?= $base_url ?>#gaming-library">Funciones</a></li>
            <li><a href="<?= $base_url ?>profile.php" class="active">Iniciar sesión</a></li>
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