<?php
require_once "ConductorService.php";

if ($argc < 2) {
    die("Uso: php eliminar.php ID\n");
}

$service = new ConductorService();
$service->eliminarConductor($argv[1]);
?>