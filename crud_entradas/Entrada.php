<?php
include('../Database.php');

class Entrada
{
    private $db;
    private $con;

    public function __construct()
    {
        $this->db = new Database();
        $this->con = $this->db->getConnection();
    }

    public function obtenerTodasLasEntradas()
    {
        $sql = "SELECT * FROM entradas_crud_php";
        $result = $this->con->query($sql);
        $entradas = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $entradas[] = $row;
            }
        }
        return $entradas;
    }

    public function crearEntrada($id_funcion, $id_cliente, $cantidad)
    {
        $sql = "INSERT INTO entradas_crud_php (id_funcion, id_cliente, cantidad) VALUES (?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("iii", $id_funcion, $id_cliente, $cantidad);
        return $stmt->execute();
    }

    public function obtenerEntradaPorId($id)
    {
        $sql = "SELECT * FROM entradas_crud_php WHERE id_entrada = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function actualizarEntrada($id, $id_funcion, $id_cliente, $cantidad)
    {
        $sql = "UPDATE entradas_crud_php SET id_funcion = ?, id_cliente = ?, cantidad = ? WHERE id_entrada = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("iiii", $id_funcion, $id_cliente, $cantidad, $id);
        return $stmt->execute();
    }

    public function eliminarEntrada($id)
    {
        $sql = "DELETE FROM entradas_crud_php WHERE id_entrada = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
