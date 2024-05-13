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
        $this->pasajeService = new PasajesService();
    }

    /**
     * Muestra todos los pasajes obtenidos mediante una solicitud cURL.
     *
     * Realiza una solicitud cURL para obtener los pasajes y los muestra utilizando la vista.
     * Si no se pueden obtener los pasajes, muestra un mensaje de error.
     *
     * @return void
     */
    public function mostrarPasajes() {
        // Realizar la solicitud cURL para obtener los vuelos
        $pasajes = $this->pasajeService->request_curl();

        // Verificar si se obtuvieron los vuelos correctamente
        if ($pasajes !== false) {
            // Mostrar los vuelos utilizando la vista
            $this->pasajeView->mostrarPasajes($pasajes);
        } else {
            $mensaje = 'Error: No se pudieron obtener los datos de los pasajes';
            $this->pasajeView->mostrarMensaje($mensaje);
        }

        $this->mostrarForm();
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

        if ($pasajeros != null) {
            // Pasar los pasajeros a la vista para mostrar el formulario
            $this->pasajeView->mostrarFormulario($pasajeros, $vuelos);
        } else {
            $mensaje = "En estos momentos no se puede insertar un pasaje. Vuelva a intentarlo mas tarde.";
            $this->pasajeView->mostrarMensaje($mensaje);
        }



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
                throw new Exception("Error 404 . No se ha podido insertar el pasaje");
            }
        } catch (Exception $exc) {
            
        }
    }

    /**
     * Elimina un pasaje.
     *
     * Verifica si se ha enviado el formulario para eliminar un pasaje.
     * Si se ha enviado, obtiene el ID del pasaje a eliminar y llama a la función correspondiente en el servicio para eliminar el pasaje.
     *
     * @return void
     */
    public function eliminarPasaje() {
        if (isset($_POST['eliminar_pasaje'])) {
            // Obtener el ID del pasaje a eliminar desde el formulario
            $idPasaje = $_POST['id_pasaje'];

            // Llamar a la función para eliminar el pasaje en el servicio correspondiente
            $this->pasajeService->request_delete($idPasaje);
        }
    }

    /**
     * Muestra el formulario de actualización del pasaje.
     *
     * Verifica si se ha enviado el ID del pasaje a actualizar.
     * Si se ha enviado, obtiene el pasaje correspondiente y los vuelos disponibles para mostrar en el formulario.
     * Luego, muestra el formulario de actualización junto con los datos del pasaje y los vuelos disponibles.
     * Si no se proporciona un ID de pasaje, muestra un mensaje de error.
     *
     * @return void
     */
    public function mostrarFormActualizacion() {
        if (isset($_POST['id_pasaje'])) {
            $idPasaje = $_POST['id_pasaje'];
            $vuelos = $this->vuelosService->obtenerIdentificador(); // Obtener los vuelos disponibles
            $pasaje = $this->pasajeService->request_curlONE($idPasaje);
            if ($pasaje) {
                $this->pasajeView->mostrarFormActualizacion($pasaje, $vuelos);
                $this->pasajeView->volveraPasajes();
            } else {
                echo "Error al obtener el pasaje.";
                $this->pasajeView->volveraPasajes();
            }
        } else {
            echo "No se proporcionó un ID de pasaje.";
            $this->pasajeView->volveraPasajes();
        }
    }

    /**
     * Actualiza un pasaje con los datos proporcionados desde el formulario.
     *
     * Verifica si se ha enviado la solicitud para actualizar el pasaje.
     * Si se ha enviado, obtiene los datos del formulario y llama a la función para actualizar el pasaje en el servicio correspondiente.
     *
     * @return void
     */
    public function actualizarPasaje() {


        if (isset($_POST['actualizar_pasaje'])) {
            // Obtener los datos del formulario
            $idPasaje = $_POST['id_pasaje'];
            $pasajerocod = $_POST['pasajerocod'];
            $identificador = $_POST['identificador'];
            $asiento = $_POST['asiento'];
            $clase = $_POST['clase'];
            $pvp = $_POST['pvp'];

            // Llamar a la función para actualizar el pasaje en el servicio correspondiente
            $this->pasajeService->request_put($idPasaje, $pasajerocod, $identificador, $asiento, $clase, $pvp);
        }
    }
}
