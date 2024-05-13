<?php

// VuelosController.php

include_once './Services/VuelosService.php';

class VuelosController {

    private $view;
    private $service;
   

    public function __construct() {
        $this->view = new VuelosView();
        $this->service=new VuelosService();
        
    }

    /**
     * Método para mostrar todos los vuelos.
     *
     * @return void
     */
    public function mostrarTodosLosVuelos() {
        // Realizar la solicitud cURL para obtener los vuelos
        $vuelos = $this->service->request_curl();
        
        
        // Verificar si se obtuvieron los vuelos correctamente
        if ($vuelos !== false) {
            // Mostrar los vuelos utilizando la vista
            $this->view->mostrarTodosLosVuelos($vuelos);
            $this->view->volverMenu();
        } else {
            $mensaje= 'Error: No se pudieron obtener los datos de los vuelos.';
            $this->view->mostrarMensaje($mensaje);
            $this->view->volverMenu();
        }
    }
    
    /**
     * Método para obtener los identificadores de los vuelos.
     *
     * @return void
     */
    
    public function obtenerIdentificadores() {
        $identificadores=$this->service->obtenerIdentificador();
        
    }
    
    
}
?>
