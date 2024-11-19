<?php
require_once dirname(__FILE__) . '/../../Database.php';
require_once dirname(__FILE__) . '/../../config.php';
include_once dirname(__FILE__) . '/../../session.php';
require_once 'User.php';

$db = new Database();
$conn = $db->connect();

$user = new User($conn);
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $loggedInUser = $user->login($email, $password);

  if ($loggedInUser) {
    session_start();
    $_SESSION['email'] = $loggedInUser['email'];
    $_SESSION['username'] = $loggedInUser['username'];
    header('Location: ' . BASE_URL . 'index.php');
    exit;
  } else {
    $message = "Correo o contraseña incorrectos.";
  }
}

include './index.php';
