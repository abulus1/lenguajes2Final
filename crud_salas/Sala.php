<?php
require_once dirname(__FILE__) . '/../Database.php';

class Sala
{
    private $db;
    private $con;

    public function __construct()
    {
        $this->db = new Database();
        $this->con = $this->db->getConnection();
    }

    public function obtenerTodasLasSalas()
    {
        $sql = "SELECT * FROM salas_crud_php";
        $result = $this->con->query($sql);
        $salas = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $salas[] = $row;
            }
        }
        return $salas;
    }

    public function crearSala($nombre_sala, $capacidad)
    {
        $sql = "INSERT INTO salas_crud_php (nombre_sala, capacidad) VALUES (?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("si", $nombre_sala, $capacidad);
        return $stmt->execute();
    }

    public function obtenerSalaPorId($id)
    {
        $sql = "SELECT * FROM salas_crud_php WHERE id_sala = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function actualizarSala($id, $nombre_sala, $capacidad)
    {
        $sql = "UPDATE salas_crud_php SET nombre_sala = ?, capacidad = ? WHERE id_sala = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sii", $nombre_sala, $capacidad, $id);
        return $stmt->execute();
    }

    public function eliminarSala($id)
    {
        $sql = "DELETE FROM salas_crud_php WHERE id_sala = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
