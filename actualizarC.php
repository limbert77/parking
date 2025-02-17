<?php
require_once "ConductorService.php";

if ($argc < 5) {
    die("Uso: php actualizar.php ID 'Nuevo Nombre' 'Nuevo CI' 'Nueva Placa'\n");
}

$service = new ConductorService();
$service->actualizarConductor($argv[1], $argv[2], $argv[3], $argv[4]);
?>
