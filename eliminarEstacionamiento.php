<?php
require_once "EstacionamientoService.php";

if ($argc < 2) {
    die("Uso: php eliminar.php ID\n");
}

$service = new EstacionamientoService();
$service->eliminarEstacionamiento($argv[1]);
?>
