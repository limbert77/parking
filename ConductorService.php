<?php
require_once "Database.php";
require_once "Conductor.php";

class ConductorService {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function agregarConductor($conductor) {
        $conn = $this->db->connect();
        $query = "INSERT INTO conductor (nombre, ci, placa_vehiculo) VALUES ($1, $2, $3)";
        $result = pg_query_params($conn, $query, [$conductor->nombre, $conductor->ci, $conductor->placa_vehiculo]);

        if ($result) {
            echo "Conductor agregado: {$conductor->nombre}\n";
        } else {
            echo "Error al agregar conductor\n";
        }

        $this->db->close();
    }

    public function listarConductores() {
        $conn = $this->db->connect();
        $query = "SELECT id, nombre, ci, placa_vehiculo FROM conductor";
        $result = pg_query($conn, $query);

        if (!$result) {
            die("Error al consultar la tabla\n");
        }

        while ($row = pg_fetch_assoc($result)) {
            echo "ID: {$row['id']} | Nombre: {$row['nombre']} | CI: {$row['ci']} | Placa: {$row['placa_vehiculo']}\n";
        }

        $this->db->close();
    }

    public function actualizarConductor($id, $nombre, $ci, $placa_vehiculo) {
        $conn = $this->db->connect();
        $query = "UPDATE conductor SET nombre = $1, ci = $2, placa_vehiculo = $3 WHERE id = $4";
        $result = pg_query_params($conn, $query, [$nombre, $ci, $placa_vehiculo, $id]);

        if ($result) {
            echo "Conductor con ID $id actualizado\n";
        } else {
            echo "Error al actualizar conductor\n";
        }

        $this->db->close();
    }

    public function eliminarConductor($id) {
        $conn = $this->db->connect();
        $query = "DELETE FROM conductor WHERE id = $1";
        $result = pg_query_params($conn, $query, [$id]);

        if ($result) {
            echo "Conductor con ID $id eliminado\n";
        } else {
            echo "Error al eliminar conductor\n";
        }

        $this->db->close();
    }
    public function buscarConductorPorNombre($nombre) {
        $conn = $this->db->connect();
        $query = "SELECT id, nombre, ci, placa_vehiculo FROM conductor WHERE nombre = $1";
        $result = pg_query_params($conn, $query, [$nombre]);

        if ($result) {
            while ($row = pg_fetch_assoc($result)) {
                echo "ID: {$row['id']} | Nombre: {$row['nombre']} | CI: {$row['ci']} | Placa: {$row['placa_vehiculo']}\n";
            }
        } else {
            echo "No se encontraron conductores con el nombre '{$nombre}'\n";
        }

        $this->db->close();
    }
}
?>