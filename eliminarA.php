<?php
require_once "AdministradorService.php";

if ($argc < 2) {
    die("Uso: php eliminar.php ID\n");
}

$service = new AdministradorService();
$service->eliminarAdministrador($argv[1]);
?>
