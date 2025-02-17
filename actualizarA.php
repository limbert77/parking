<?php
require_once "AdministradorService.php";

if ($argc < 5) {
    die("Uso: php actualizar.php ID 'Nuevo Nombre' 'Nuevo Apellido' 'Nuevo Email'\n");
}

$service = new AdministradorService();
$service->actualizarAdministrador($argv[1], $argv[2], $argv[3], $argv[4], $argv[5]);
?>
