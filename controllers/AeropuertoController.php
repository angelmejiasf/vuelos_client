<?php

include_once './views/AeropuertoView.php';

class AeropuertoController {

    private $view;

    public function __construct() {
        $this->view = new AeropuertoView();
    }

    /**
     * Método para mostrar las opciones relacionadas con los aeropuertos.
     *
     * @return void
     */
    public function mostrarOpciones() {
        $this->view->mostrarOpcionesView();
    }
}
