<?php

require_once './Services/PasajeroService.php';
require_once './views/PasajeView.php';
require_once './Services/VuelosService.php';
require_once './Services/PasajesService.php';

class PasajeController {

    private $pasajerosService;
    private $pasajeView;
    private $vuelosService;
    private $pasajeService;

    public function __construct() {
        $this->pasajerosService = new PasajerosService();
        $this->pasajeView = new PasajeView();
        $this->vuelosService = new VuelosService();
        $this->pasajeService= new PasajesService();
    }

    /**
     * Método para mostrar el formulario de inserción de pasajes.
     *
     * @return void
     */
    public function mostrarForm() {
        // Obtener los pasajeros del servicio de pasajeros
        $pasajeros = $this->pasajerosService->obtenerPasajeros();
        $vuelos = $this->vuelosService->obtenerIdentificador();

        // Pasar los pasajeros a la vista para mostrar el formulario
        $this->pasajeView->mostrarFormulario($pasajeros, $vuelos);
        $this->pasajeView->volverMenu();
        
    }

    /**
     * Método para insertar un pasaje en la base de datos.
     *
     * @return void
     */
     public function insertarPasaje() {
        try {
            if ($this->pasajeService->request_post($_POST["pasajerocod"], $_POST["identificador"], $_POST["numasiento"], $_POST["clase"], $_POST["pvp"])) {
               
                quit();
            } else {
                throw new Exception("<h2>Error 404 . No se ha podido insertar el pasaje");
            }
        } catch (Exception $exc) {
           
        }
    }

}
