<?php
require_once "ConductorService.php";
require_once "Conductor.php";

if ($argc < 4) {
    die("Uso: php agregar.php 'Nombre' 'CI' 'Placa'\n");
}

$conductor = new Conductor($argv[1], $argv[2], $argv[3]);
$service = new ConductorService();
$service->agregarConductor($conductor);
?>