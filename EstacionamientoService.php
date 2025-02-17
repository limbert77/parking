<?php
require_once "Database.php";

class EstacionamientoService {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function agregarEstacionamiento($estacionamiento) {
        $conn = $this->db->connect();
        $query = "INSERT INTO estacionamientos (nombre, direccion, capacidad) VALUES ($1, $2, $3)";
        $result = pg_query_params($conn, $query, [$estacionamiento->nombre, $estacionamiento->direccion, $estacionamiento->capacidad]);

        if ($result) {
            echo "Estacionamiento agregado: {$estacionamiento->nombre}\n";
        } else {
            echo "Error al agregar estacionamiento\n";
        }

        $this->db->close();
    }

    public function listarEstacionamientos() {
        $conn = $this->db->connect();
        $query = "SELECT id, nombre, direccion, capacidad FROM estacionamientos";
        $result = pg_query($conn, $query);

        if (!$result) {
            die("Error al consultar la tabla\n");
        }

        while ($row = pg_fetch_assoc($result)) {
            echo "ID: {$row['id']} | Nombre: {$row['nombre']} | Dirección: {$row['direccion']} | Capacidad: {$row['capacidad']}\n";
        }

        $this->db->close();
    }

    public function actualizarEstacionamiento($id, $nombre, $direccion, $capacidad) {
        $conn = $this->db->connect();
        $query = "UPDATE estacionamientos SET nombre = $1, direccion = $2, capacidad = $3 WHERE id = $4";
        $result = pg_query_params($conn, $query, [$nombre, $direccion, $capacidad, $id]);

        if ($result) {
            echo "Estacionamiento con ID $id actualizado\n";
        } else {
            echo "Error al actualizar estacionamiento\n";
        }

        $this->db->close();
    }

    public function eliminarEstacionamiento($id) {
        $conn = $this->db->connect();
        $query = "DELETE FROM estacionamientos WHERE id = $1";
        $result = pg_query_params($conn, $query, [$id]);

        if ($result) {
            echo "Estacionamiento con ID $id eliminado\n";
        } else {
            echo "Error al eliminar estacionamiento\n";
        }

        $this->db->close();
    }
}
?>
