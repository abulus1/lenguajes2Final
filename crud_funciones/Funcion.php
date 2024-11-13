<?php
include('../Database.php');

class Funcion
{
    private $db;
    private $con;

    public function __construct()
    {
        $this->db = new Database();
        $this->con = $this->db->getConnection();
    }

    public function obtenerTodasLasFunciones()
    {
        $sql = "SELECT * FROM funciones_crud_php";
        $result = $this->con->query($sql);
        $funciones = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $funciones[] = $row;
            }
        }
        return $funciones;
    }

    public function crearFuncion($id_pelicula, $id_sala, $fecha, $hora, $tipo_funcion, $idioma)
    {
        $sql = "INSERT INTO funciones_crud_php (id_pelicula, id_sala, fecha, hora, tipo_funcion, idioma) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("iissss", $id_pelicula, $id_sala, $fecha, $hora, $tipo_funcion, $idioma);
        return $stmt->execute();
    }

    public function obtenerFuncionPorId($id)
    {
        $sql = "SELECT * FROM funciones_crud_php WHERE id_funcion = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function actualizarFuncion($id, $id_pelicula, $id_sala, $fecha, $hora, $tipo_funcion, $idioma)
    {
        $sql = "UPDATE funciones_crud_php SET id_pelicula = ?, id_sala = ?, fecha = ?, hora = ?, tipo_funcion = ?, idioma = ? WHERE id_funcion = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("iissssi", $id_pelicula, $id_sala, $fecha, $hora, $tipo_funcion, $idioma, $id);
        return $stmt->execute();
    }

    public function eliminarFuncion($id)
{
    // Comprobar si existen entradas asociadas
    $sqlCheckEntries = "SELECT COUNT(*) as count FROM entradas_crud_php WHERE id_funcion = ?";
    $stmtCheckEntries = $this->con->prepare($sqlCheckEntries);
    $stmtCheckEntries->bind_param("i", $id);
    $stmtCheckEntries->execute();
    $result = $stmtCheckEntries->get_result();
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        // Si existen entradas asociadas, no eliminar y retornar un mensaje de error
        return false;
    }

    // Si no hay entradas asociadas, eliminamos la función
    $sql = "DELETE FROM funciones_crud_php WHERE id_funcion = ?";
    $stmt = $this->con->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

}
?>
