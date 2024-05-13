<?php

    /**
     * Clase Pasajero
     *
     * Esta clase representa un pasajero y tiene propiedades y métodos
     * para manejar y controlar la información del pasajero.
     */
class Pasajero {

    /**
     * @var int Código del pasajero.
     */
    private $pasajeroCod;

    /**
     * @var string Nombre del pasajero.
     */
    private $nombre;

    /**
     * @var string Teléfono del pasajero.
     */
    private $tlf;

    /**
     * @var string Dirección del pasajero.
     */
    private $direccion;

    /**
     * @var string País del pasajero.
     */
    private $pais;

    /**
     * Constructor de la clase Pasajero.
     *
     * @param array $assoc Array asociativo con los datos del pasajero.
     * @throws Exception Si faltan datos en el array asociativo.
     */
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

    /**
     * Convierte el objeto Pasajero a un array.
     *
     * @return array Array con las propiedades del pasajero.
     */
    public function toArray() {
        return get_object_vars($this);
    }

    /**
     * Getter para el código del pasajero.
     *
     * @return int Código del pasajero.
     */
    public function getPasajeroCod() {
        return $this->pasajeroCod;
    }

    /**
     * Setter para el código del pasajero.
     *
     * @param int $pasajeroCod Código del pasajero.
     * @return void
     */
    public function setPasajeroCod($pasajeroCod) {
        $this->pasajeroCod = $pasajeroCod;
    }

    /**
     * Getter para el nombre del pasajero.
     *
     * @return string Nombre del pasajero.
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Setter para el nombre del pasajero.
     *
     * @param string $nombre Nombre del pasajero.
     * @return void
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /**
     * Getter para el teléfono del pasajero.
     *
     * @return string Teléfono del pasajero.
     */
    public function getTlf() {
        return $this->tlf;
    }

    /**
     * Setter para el teléfono del pasajero.
     *
     * @param string $tlf Teléfono del pasajero.
     * @return void
     */
    public function setTlf($tlf) {
        $this->tlf = $tlf;
    }

    /**
     * Getter para la dirección del pasajero.
     *
     * @return string Dirección del pasajero.
     */
    public function getDireccion() {
        return $this->direccion;
    }

    /**
     * Setter para la dirección del pasajero.
     *
     * @param string $direccion Dirección del pasajero.
     * @return void
     */
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    /**
     * Getter para el país del pasajero.
     *
     * @return string País del pasajero.
     */
    public function getPais() {
        return $this->pais;
    }

    /**
     * Setter para el país del pasajero.
     *
     * @param string $pais País del pasajero.
     * @return void
     */
    public function setPais($pais) {
        $this->pais = $pais;
    }
}
?>
