<?php

class Estacionamiento {
    public $id;
    public $nombre;
    public $direccion;
    public $capacidad;

    public function __construct($nombre, $direccion, $capacidad, $id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->capacidad = $capacidad;
    }
}
?>
