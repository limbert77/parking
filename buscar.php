<?php
require_once "ConductorService.php";

if ($argc < 2) {
    die("Uso: php buscar.php 'Nombre'\n");
}

$service = new ConductorService();
$service->buscarConductorPorNombre($argv[1]);
?>