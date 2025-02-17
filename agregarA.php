<?php
require_once "AdministradorService.php";
require_once "Administrador.php";

if ($argc < 5) {
    die("Uso: php agregar.php 'Nombre' 'Apellidos' 'Email' 'Contraseña'\n");
}

$admin = new Administrador($argv[1], $argv[2], $argv[3], $argv[4]);
$service = new AdministradorService();
$service->agregarAdministrador($admin);
?>
