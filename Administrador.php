<?php

class Administrador {
    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $contrasena;

    public function __construct($nombre, $apellidos, $email, $contrasena, $id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->contrasena = $contrasena;
    }
}
?>
