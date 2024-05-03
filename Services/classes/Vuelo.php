<?php

class Vuelo {

    private $identificador;
    private $aeropuertoorigen;
    private $aeropuertodestino;
    private $tipovuelo;
    private $fechavuelo;
    private $descuento;

    public function __construct($assoc) {
        
        if (isset($assoc['identificador'])) {
            
            
            $this->identificador = $assoc['identificador'] ?? null;
            $this->aeropuertoorigen = $assoc['aeropuertoorigen'] ?? null;
            $this->aeropuertodestino = $assoc['aeropuertodestino'] ?? null;
            $this->tipovuelo = $assoc['tipovuelo'] ?? null;
            $this->fechavuelo = $assoc['fechavuelo'] ?? null;
            $this->descuento = $assoc['descuento'] ?? null;
        } else {
            throw new Exception("Faltan datos en el array asociativo");
        }
    }
    
    public function toArray() {
        return get_object_vars($this);
    }


    public function getIdentificador() {
        return $this->identificador;
    }

    public function getAeropuertoorigen() {
        return $this->aeropuertoorigen;
    }

    public function getAeropuertodestino() {
        return $this->aeropuertodestino;
    }

    public function getTipovuelo() {
        return $this->tipovuelo;
    }

    public function getFechavuelo() {
        return $this->fechavuelo;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function setIdentificador($identificador): void {
        $this->identificador = $identificador;
    }

    public function setAeropuertoorigen($aeropuertoorigen): void {
        $this->aeropuertoorigen = $aeropuertoorigen;
    }

    public function setAeropuertodestino($aeropuertodestino): void {
        $this->aeropuertodestino = $aeropuertodestino;
    }

    public function setTipovuelo($tipovuelo): void {
        $this->tipovuelo = $tipovuelo;
    }

    public function setFechavuelo($fechavuelo): void {
        $this->fechavuelo = $fechavuelo;
    }

    public function setDescuento($descuento): void {
        $this->descuento = $descuento;
    }



}
