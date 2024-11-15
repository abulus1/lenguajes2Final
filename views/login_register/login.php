<?php
require_once dirname(__FILE__) . '/../../Database.php';
require_once dirname(__FILE__) . '/../../config.php';
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
    $_SESSION['user_id'] = $loggedInUser['id'];
    $_SESSION['username'] = $loggedInUser['username'];
    header('Location: ' . BASE_URL);
    exit;
  } else {
    $message = "Correo o contraseña incorrectos.";
  }
}

include './index.php';
