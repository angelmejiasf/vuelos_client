<?php

    /**
     * Clase Vuelo
     *
     * Esta clase representa un vuelo y tiene propiedades y métodos
     * para manejar y controlar la información del vuelo.
     */
class Vuelo {

    /**
     * @var string Identificador del vuelo.
     */
    private $identificador;

    /**
     * @var string Aeropuerto de origen del vuelo.
     */
    private $aeropuertoorigen;

    /**
     * @var string Aeropuerto de destino del vuelo.
     */
    private $aeropuertodestino;

    /**
     * @var string Tipo de vuelo.
     */
    private $tipovuelo;

    /**
     * @var string Fecha del vuelo.
     */
    private $fechavuelo;

    /**
     * @var float Descuento del vuelo.
     */
    private $descuento;

    /**
     * Constructor de la clase Vuelo.
     *
     * @param array $assoc Array asociativo con los datos del vuelo.
     * @throws Exception Si faltan datos en el array asociativo.
     */
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

    /**
     * Convierte el objeto Vuelo a un array.
     *
     * @return array Array con las propiedades del vuelo.
     */
    public function toArray() {
        return get_object_vars($this);
    }

    /**
     * Getter para el identificador del vuelo.
     *
     * @return string Identificador del vuelo.
     */
    public function getIdentificador() {
        return $this->identificador;
    }

    /**
     * Getter para el aeropuerto de origen del vuelo.
     *
     * @return string Aeropuerto de origen del vuelo.
     */
    public function getAeropuertoorigen() {
        return $this->aeropuertoorigen;
    }

    /**
     * Getter para el aeropuerto de destino del vuelo.
     *
     * @return string Aeropuerto de destino del vuelo.
     */
    public function getAeropuertodestino() {
        return $this->aeropuertodestino;
    }

    /**
     * Getter para el tipo de vuelo.
     *
     * @return string Tipo de vuelo.
     */
    public function getTipovuelo() {
        return $this->tipovuelo;
    }

    /**
     * Getter para la fecha del vuelo.
     *
     * @return string Fecha del vuelo.
     */
    public function getFechavuelo() {
        return $this->fechavuelo;
    }

    /**
     * Getter para el descuento del vuelo.
     *
     * @return float Descuento del vuelo.
     */
    public function getDescuento() {
        return $this->descuento;
    }

    /**
     * Setter para el identificador del vuelo.
     *
     * @param string $identificador Identificador del vuelo.
     * @return void
     */
    public function setIdentificador($identificador): void {
        $this->identificador = $identificador;
    }

    /**
     * Setter para el aeropuerto de origen del vuelo.
     *
     * @param string $aeropuertoorigen Aeropuerto de origen del vuelo.
     * @return void
     */
    public function setAeropuertoorigen($aeropuertoorigen): void {
        $this->aeropuertoorigen = $aeropuertoorigen;
    }

    /**
     * Setter para el aeropuerto de destino del vuelo.
     *
     * @param string $aeropuertodestino Aeropuerto de destino del vuelo.
     * @return void
     */
    public function setAeropuertodestino($aeropuertodestino): void {
        $this->aeropuertodestino = $aeropuertodestino;
    }

    /**
     * Setter para el tipo de vuelo.
     *
     * @param string $tipovuelo Tipo de vuelo.
     * @return void
     */
    public function setTipovuelo($tipovuelo): void {
        $this->tipovuelo = $tipovuelo;
    }

    /**
     * Setter para la fecha del vuelo.
     *
     * @param string $fechavuelo Fecha del vuelo.
     * @return void
     */
    public function setFechavuelo($fechavuelo): void {
        $this->fechavuelo = $fechavuelo;
    }

    /**
     * Setter para el descuento del vuelo.
     *
     * @param float $descuento Descuento del vuelo.
     * @return void
     */
    public function setDescuento($descuento): void {
        $this->descuento = $descuento;
    }

}
?>
