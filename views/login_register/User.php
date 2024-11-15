<?php
class User
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function register($fullname, $email, $username, $password)
    {
        $query = "INSERT INTO users (fullname, email, username, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->conn->error);
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bind_param('ssss', $fullname, $email, $username, $hashedPassword);

        try {
            $stmt->execute();
            return true;  // Registro exitoso
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) { // Código de error para clave duplicada
                return 'duplicate_email';  // Correo duplicado
            } else {
                throw $e;  // Otros errores
            }
        }
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->conn->error);
        }

        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
