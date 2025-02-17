<?php
require_once "Database.php";
require_once "Administrador.php";

class AdministradorService {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function agregarAdministrador($admin) {
        $conn = $this->db->connect();
        $query = "INSERT INTO administrador (nombre, apellidos, email, contrasena) VALUES ($1, $2, $3, $4)";
        $result = pg_query_params($conn, $query, [$admin->nombre, $admin->apellidos, $admin->email, $admin->contrasena]);

        if ($result) {
            echo "Administrador agregado: {$admin->nombre} {$admin->apellidos}\n";
        } else {
            echo "Error al agregar administrador\n";
        }

        $this->db->close();
    }

    public function listarAdministradores() {
        $conn = $this->db->connect();
        $query = "SELECT id_admin, nombre, apellidos, email,contrasena FROM administrador";
        $result = pg_query($conn, $query);

        if (!$result) {
            die("Error al consultar la tabla\n");
        }

        while ($row = pg_fetch_assoc($result)) {
            echo "ID: {$row['id_admin']} | Nombre: {$row['nombre']} {$row['apellidos']} | Email: {$row['email']} | Contra: {$row['contrasena']}\n";
        }

        $this->db->close();
    }

    public function actualizarAdministrador($id, $nombre, $apellidos, $email, $contrasena) {
        $conn = $this->db->connect();
        $query = "UPDATE administrador SET nombre = $1, apellidos = $2, email = $3, contrasena= $4 WHERE id_admin = $5";
        $result = pg_query_params($conn, $query, [$nombre, $apellidos, $email, $contrasena, $id]);

        if ($result) {
            echo "Administrador con ID $id actualizado\n";
        } else {
            echo "Error al actualizar administrador\n";
        }

        $this->db->close();
    }

    public function eliminarAdministrador($id) {
        $conn = $this->db->connect();
        $query = "DELETE FROM administrador WHERE id_admin = $1";
        $result = pg_query_params($conn, $query, [$id]);

        if ($result) {
            echo "Administrador con ID $id eliminado\n";
        } else {
            echo "Error al eliminar administrador\n";
        }

        $this->db->close();
    }
}
?>
