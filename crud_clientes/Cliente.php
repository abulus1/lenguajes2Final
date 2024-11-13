<?php
require_once dirname(__FILE__) . '/../Database.php';

class Cliente
{
    private $db;
    private $con;

    public function __construct()
    {
        $this->db = new Database();
        $this->con = $this->db->getConnection();
    }

    public function obtenerTodosLosClientes()
    {
        $sql = "SELECT * FROM clientes_crud_php";
        $result = $this->con->query($sql);
        $clientes = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
        }
        return $clientes;
    }

    public function crearCliente($nombre, $email, $telefono)
    {
        $sql = "INSERT INTO clientes_crud_php (nombre, email, telefono) VALUES (?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sss", $nombre, $email, $telefono);
        return $stmt->execute();
    }

    public function obtenerClientePorId($id)
    {
        $sql = "SELECT * FROM clientes_crud_php WHERE id_cliente = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function actualizarCliente($id, $nombre, $email, $telefono)
    {
        $sql = "UPDATE clientes_crud_php SET nombre = ?, email = ?, telefono = ? WHERE id_cliente = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sssi", $nombre, $email, $telefono, $id);
        return $stmt->execute();
    }

    public function eliminarCliente($id)
    {
        $sql = "DELETE FROM clientes_crud_php WHERE id_cliente = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
