<?php
require_once "EstacionamientoService.php";
require_once "Estacionamiento.php";

if ($argc < 4) {
    die("Uso: php agregar.php 'Nombre' 'Direccion' 'Capacidad'\n");
}

$estacionamiento = new Estacionamiento($argv[1], $argv[2], $argv[3]);
$service = new EstacionamientoService();
$service->agregarEstacionamiento($estacionamiento);
?>
