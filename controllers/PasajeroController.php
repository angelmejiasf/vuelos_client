<?php

require_once './Services/PasajeroService.php';
class PasajerosController {

   
    private $service;

    public function __construct() {
        
        $this->service = new PasajerosService();
    }
    
    /**
     * Método para mostrar todos los pasajeros.
     *
     * @return void
     */
    public function mostrarTodosLosPasajeros() {
        // Realizar la solicitud cURL para obtener los vuelos
        $pasajeros = $this->service->request_curl();
        
    }
}