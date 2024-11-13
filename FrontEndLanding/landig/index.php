<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Cyborg - CINEMA</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="#most-popular">Cartelera</a></li>
                        <li><a href="#gaming-library">Funciones</a></li>
                        <li><a href="profile.php" class="active">Iniciar sesion</a></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h6>Bienvenido a Cyborg</h6>
                  <h4><em>Disfruta</em> tus mejores estrenos acá</h4>
                  <div class="main-button">
                    <a href="browse.html">Iniciar sesion</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular" id="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4><em>Peliculas</em> Disponibles</h4>
                </div>
                <div class="row">
                <?php
                  include('/xampp/htdocs/FinalLenguajes/lenguajes2Final/crud_peliculas/Pelicula.php');

                  $pelicula = new Pelicula();
                  $peliculas = $pelicula->obtenerTodasLasPeliculas();
                ?>
                  <?php foreach ($peliculas as $row): ?>
                  <div class="col-lg-3 col-sm-6">
                    <div class="item">
                      <img src="<?= $row['imagen'] ?>" alt="">
                      <h4><?= $row['titulo'] ?><br><span><?= $row['genero'] ?></span></h4>
                      <ul>
                        <li><i class="fa fa-ticket"></i> <?= $row['clasificacion'] ?></li>
                        <li><i class="fa fa-clock"></i> <?= $row['duracion'] ?></li>
                      </ul>
                    </div>
                  </div>
                  <?php endforeach; ?>
                  <div class="col-lg-12">
                    <div class="main-button">
                      <a href="browse.html">Discover Popular</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Most Popular End ***** -->

          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library" id="gaming-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>Funciones</em> Disponibles</h4>
              </div>
              <?php
              include('/xampp/htdocs/FinalLenguajes/lenguajes2Final/crud_funciones/Funcion.php');

              $funcion = new Funcion();
              $funciones = $funcion->obtenerTodasLasFunciones();
              ?>
              <?php foreach ($funciones as $row): ?>
              <div class="item">
                <ul>
                  <?php
                      $pelicula = new Pelicula();
                      $pelicula_datos = $pelicula->obtenerPeliculaPorId($row['id_pelicula']);
                  ?>
                  <li> <img src="<?= $pelicula_datos['imagen']?>" alt="" class="templatemo-item"></li>
                  <li><h4><?= $pelicula_datos['titulo'] ?> <br> <span><?= $pelicula_datos['genero'] ?></h4></li>
                  <li><h4>Horario</h4><span><?= $row['fecha'] . " / " . $row['hora']?></span></li>
                  <li><h4>Formato</h4><span><?= $row['tipo_funcion']?></span></li>
                  <li><h4>Idioma</h4><span><?= $row['idioma']?></span></li>
                  <li><div class="main-border-button border-no-active"><a href="#">Ver</a></div></li>
                </ul>
              </div>
              <?php endforeach; ?>
            </div>
            <div class="col-lg-12">
              <div class="main-button">
                <a href="profile.html">View Your Library</a>
              </div>
            </div>
          </div>
          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2024 <a href="#">Cyborg Cinema.</a> <br>Todos los derechos reservados. 
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>


  </body>

</html>

