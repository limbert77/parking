<?php

class Conductor {
    public $id;
    public $nombre;
    public $ci;
    public $placa_vehiculo;

    public function __construct($nombre, $ci, $placa_vehiculo, $id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ci = $ci;
        $this->placa_vehiculo = $placa_vehiculo;
    }
}
?>
