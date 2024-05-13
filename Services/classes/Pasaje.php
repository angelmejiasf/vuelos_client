<?php


    /**
     * Clase Pasaje
     *
     * Esta clase representa un pasaje y tiene propiedades y métodos
     * para manejar y controlar la información del pasaje.
     */
class Pasaje {
    /**
     * @var int|null ID del pasaje.
     */
    private $idpasaje;
    
    /**
     * @var int Código del pasajero asociado al pasaje.
     */
    private $pasajerocod;
    
    /**
     * @var int ID del vuelo asociado al pasaje.
     */
    private $identificador;
    
    /**
     * @var int Número de asiento del pasaje.
     */
    private $numasiento;
    
    /**
     * @var string Clase del pasaje (Turista, Primera, Business).
     */
    private $clase;
    
    /**
     * @var float Precio del pasaje.
     */
    private $pvp;

    /**
     * Constructor de la clase Pasaje.
     *
     * @param array $assoc Array asociativo con los datos del pasaje.
     * @throws Exception Si faltan datos en el array asociativo.
     */
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
    
    /**
     * Convierte el objeto Pasaje a un array.
     *
     * @return array Array con las propiedades del pasaje.
     */
    public function toArray() {
        return get_object_vars($this);
    }
    
    /**
     * Getter para el ID del pasaje.
     *
     * @return int|null ID del pasaje.
     */
    public function getIdPasaje() {
        return $this->idpasaje;
    }

    /**
     * Setter para el ID del pasaje.
     *
     * @param int|null $idpasaje ID del pasaje.
     * @return void
     */
    public function setIdPasaje($idpasaje) {
        $this->idpasaje = $idpasaje;
    }

    /**
     * Getter para el código del pasajero.
     *
     * @return int Código del pasajero.
     */
    public function getPasajeroCod() {
        return $this->pasajerocod;
    }

    /**
     * Setter para el código del pasajero.
     *
     * @param int $pasajerocod Código del pasajero.
     * @return void
     */
    public function setPasajeroCod($pasajerocod) {
        $this->pasajerocod = $pasajerocod;
    }

    /**
     * Getter para el ID del vuelo.
     *
     * @return int ID del vuelo.
     */
    public function getIdentificador() {
        return $this->identificador;
    }

    /**
     * Setter para el ID del vuelo.
     *
     * @param int $identificador ID del vuelo.
     * @return void
     */
    public function setIdentificador($identificador) {
        $this->identificador = $identificador;
    }

    /**
     * Getter para el número de asiento.
     *
     * @return int Número de asiento.
     */
    public function getNumAsiento() {
        return $this->numasiento;
    }

    /**
     * Setter para el número de asiento.
     *
     * @param int $numasiento Número de asiento.
     * @return void
     */
    public function setNumAsiento($numasiento) {
        $this->numasiento = $numasiento;
    }

    /**
     * Getter para la clase del pasaje.
     *
     * @return string Clase del pasaje.
     */
    public function getClase() {
        return $this->clase;
    }

    /**
     * Setter para la clase del pasaje.
     *
     * @param string $clase Clase del pasaje.
     * @return void
     */
    public function setClase($clase) {
        $this->clase = $clase;
    }

    /**
     * Getter para el precio del pasaje.
     *
     * @return float Precio del pasaje.
     */
    public function getPVP() {
        return $this->pvp;
    }

    /**
     * Setter para el precio del pasaje.
     *
     * @param float $pvp Precio del pasaje.
     * @return void
     */
    public function setPVP($pvp) {
        $this->pvp = $pvp;
    }    
}
?>
