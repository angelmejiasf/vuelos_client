<?php

class Pasajero {

    private $pasajeroCod;
    private $nombre;
    private $tlf;
    private $direccion;
    private $pais;

    public function __construct($assoc) {
        
        if (!isset($assoc['pasajeroCod'])) {

            
            $this->pasajeroCod = $assoc['pasajerocod'] ?? null;
            $this->nombre = $assoc['nombre'] ?? null;
            $this->tlf = $assoc['tlf'] ?? null;
            $this->direccion = $assoc['direccion'] ?? null;
            $this->pais = $assoc['pais'] ?? null;
        } else {
            throw new Exception("Faltan datos en el array asociativo");
        }
    }

    public function toArray() {
        return get_object_vars($this);
    }


    public function getPasajeroCod() {
        return $this->pasajeroCod;
    }


    public function setPasajeroCod($pasajeroCod) {
        $this->pasajeroCod = $pasajeroCod;
    }


    public function getNombre() {
        return $this->nombre;
    }


    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getTlf() {
        return $this->tlf;
    }


    public function setTlf($tlf) {
        $this->tlf = $tlf;
    }


    public function getDireccion() {
        return $this->direccion;
    }


    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }


    public function getPais() {
        return $this->pais;
    }

    public function setPais($pais) {
        $this->pais = $pais;
    }
}
