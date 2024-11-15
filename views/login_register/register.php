<?php
require_once dirname(__FILE__) . '/../../Database.php';
require_once dirname(__FILE__) . '/../../config.php';
require_once 'User.php';

$db = new Database();
$conn = $db->connect();

$user = new User($conn);
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $user->register($fullname, $email, $username, $password);

    if ($result === true) {
        $message = "Registro exitoso. ¡Ahora puedes iniciar sesión!";
        $messageType = "success-message";
    } elseif ($result === 'duplicate_email') {
        $message = "El correo ya está registrado. Por favor, usa otro.";
        $messageType = "error-message";
    } else {
        $message = "Error al registrar. Verifica tus datos.";
        $messageType = "error-message";
    }
}

include './index.php';
