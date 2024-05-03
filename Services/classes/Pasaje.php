<?php

class Pasaje {
    private $idpasaje;
    private $pasajerocod;
    private $identificador;
    private $numasiento;
    private $clase;
    private $pvp;

    public function __construct($assoc) {
        
        if (isset($assoc['pasajerocod'])){
            
            $this->idpasaje = $assoc['idpasaje'] ?? null;
            $this->pasajerocod = $assoc['pasajerocod'] ?? null;
            $this->identificador = $assoc['identificador'] ?? null;
            $this->numasiento = $assoc['numasiento'] ?? null;
            $this->clase = $assoc['clase'] ?? null;
            $this->pvp = $assoc['pvp'] ?? null;
        } else {
            throw new Exception("Faltan datos en el array asociativo");
        }
    }
    
    public function toArray() {
        return get_object_vars($this);
    }
    
    
    public function getIdPasaje() {
        return $this->idpasaje;
    }

   
    public function setIdPasaje($idpasaje) {
        $this->idpasaje = $idpasaje;
    }

    
    public function getPasajeroCod() {
        return $this->pasajerocod;
    }

    
    public function setPasajeroCod($pasajerocod) {
        $this->pasajerocod = $pasajerocod;
    }

   
    public function getIdentificador() {
        return $this->identificador;
    }

    
    public function setIdentificador($identificador) {
        $this->identificador = $identificador;
    }

   
    public function getNumAsiento() {
        return $this->numasiento;
    }

    
    public function setNumAsiento($numasiento) {
        $this->numasiento = $numasiento;
    }

    
    public function getClase() {
        return $this->clase;
    }

   
    public function setClase($clase) {
        $this->clase = $clase;
    }

    
    public function getPVP() {
        return $this->pvp;
    }

    
    public function setPVP($pvp) {
        $this->pvp = $pvp;
    }    
}
