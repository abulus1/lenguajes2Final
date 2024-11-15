<?php
require_once dirname(__FILE__) . '/../../config.php';
session_start();

// Destruir todas las sesiones
session_unset();
session_destroy();

// Redirigir a la página de inicio
header('Location: ' . BASE_URL . 'index.php');
exit;
