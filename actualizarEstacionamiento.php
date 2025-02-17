<?php
require_once "EstacionamientoService.php";

if ($argc < 5) {
    die("Uso: php actualizar.php ID 'Nuevo Nombre' 'Nueva Dirección' Nueva Capacidad\n");
}

$service = new AdministradorService();
$service->actualizarEstacionamiento($argv[1], $argv[2], $argv[3], $argv[4]);
?>
