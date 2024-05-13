<?php

require_once __DIR__ . '/classes/Pasaje.php';

class PasajesService {

    public $pasajeView;

    public function __construct() {

        $this->pasajeView = new PasajeView();
    }

    /**
     * Realiza una solicitud GET a un servicio web para obtener los pasajes.
     *
     * @return array|false Arreglo de objetos Pasaje obtenidos o false si ocurre un error.
     */
    public function request_curl() {
        $urlmiservicio = "http://localhost/_serWeb/serVuelos/Pasaje.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            // Convertir la respuesta JSON a un array asociativo
            $pasajesData = json_decode($res, true);

            // Verificar si se obtuvieron los pasajes correctamente
            if ($pasajesData !== null) {
                // Crear objetos Pasaje a partir de los datos obtenidos
                $pasajes = [];
                foreach ($pasajesData as $pasajeData) {
                    $pasaje = new Pasaje($pasajeData);
                    $pasajes[] = $pasaje;
                }
                return $pasajes;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Realiza una solicitud POST a un servicio web para insertar un pasaje.
     *
     * @param int $pasajerocod Código del pasajero.
     * @param string $identificador Identificador del vuelo.
     * @param int $numasiento Número de asiento.
     * @param string $clase Clase del pasaje.
     * @param float $pvp Precio del pasaje.
     * @return void
     */
    function request_post($pasajerocod, $identificador, $numasiento, $clase, $pvp) {
        $envio = json_encode(array(
            "pasajerocod" => $pasajerocod,
            "identificador" => $identificador,
            "numasiento" => $numasiento,
            "clase" => $clase,
            "pvp" => $pvp
        ));
        $urlmiservicio = "http://localhost/_serWeb/serVuelos/Pasaje.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        // Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        // Tipo de petición
        curl_setopt($conexion, CURLOPT_POST, TRUE);
        // Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        // para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        if ($res) {
            // Decodificar la respuesta JSON
            $respuesta = json_decode($res, true);
            // Verificar si se obtuvo un resultado
            if (isset($respuesta['resultado'])) {
                // Mostrar el resultado obtenido
                echo $respuesta['resultado'];
                $this->pasajeView->volveraPasajes();
            } else {
                // Mostrar un mensaje genérico si no se pudo obtener el resultado
                $mensaje = "Error con el servicio.";
                $this->pasajeView->mostrarMensaje($mensaje);
                $this->pasajeView->volveraPasajes();
            }
        }
        curl_close($conexion);
    }

    /**
     * Realiza una solicitud DELETE a un servicio web para eliminar un pasaje.
     *
     * @param int $idPasaje ID del pasaje a eliminar.
     * @return void
     */
    function request_delete($idPasaje) {
        // URL del servicio web para eliminar un pasaje
        $urlMiServicio = "http://localhost/_serWeb/serVuelos/Pasaje.php?id=" . $idPasaje;

        // Inicializar la conexión cURL
        $conexion = curl_init();

        // Configurar la URL y el método de la solicitud
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true); // Indica a cURL que devuelva la respuesta en lugar de imprimirla
        // Realizar la solicitud y recibir la respuesta
        $res = curl_exec($conexion);

        // Verificar si se realizó la eliminación correctamente
        if ($res) {
            // Mostrar el mensaje de respuesta obtenido
            echo $res;
            $this->pasajeView->volveraPasajes();
        } else {
            // Mostrar un mensaje de error si no se pudo realizar la eliminación
            $mensaje = "Error al eliminar el pasaje.";
            $this->pasajeView->mostrarMensaje($mensaje);
            $this->pasajeView->volverMenu();
        }

        // Cerrar la conexión cURL
        curl_close($conexion);
    }

    /**
     * Realiza una solicitud PUT a un servicio web para actualizar un pasaje.
     *
     * @param int $idPasaje ID del pasaje a actualizar.
     * @param int $pasajerocod Código del pasajero.
     * @param string $identificador Identificador del vuelo.
     * @param int $numasiento Número de asiento.
     * @param string $clase Clase del pasaje.
     * @param float $pvp Precio del pasaje.
     * @return void
     */
    function request_put($idPasaje, $pasajerocod, $identificador, $numasiento, $clase, $pvp) {
        // Datos a enviar en la solicitud
        $datos = array(
            "idpasaje" => $idPasaje,
            "pasajerocod" => $pasajerocod,
            "identificador" => $identificador,
            "numasiento" => $numasiento,
            "clase" => $clase,
            "pvp" => $pvp
        );

        // Convertir los datos a formato JSON
        $envio = json_encode($datos);

        // URL del servicio web para actualizar un pasaje
        $urlMiServicio = "http://localhost/_serWeb/serVuelos/Pasaje.php";

        // Inicializar la conexión cURL
        $conexion = curl_init();

        // Configurar la URL y el método de la solicitud
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'PUT');

        // Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));

        // Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);

        // para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        // Realizar la solicitud y recibir la respuesta
        $res = curl_exec($conexion);

        // Verificar si se realizó la actualización correctamente
        if ($res) {
            // Mostrar el mensaje de respuesta obtenido
            echo $res;

            $this->pasajeView->volveraPasajes();
        } else {
            // Mostrar un mensaje genérico si no se pudo realizar la actualización
            $mensaje = "Error al actualizar el pasaje.";
            $this->pasajeView->mostrarMensaje($mensaje);
            $this->pasajeView->volveraPasajes();
        }

        // Cerrar la conexión cURL
        curl_close($conexion);
    }

    /**
     * Realiza una solicitud cURL para obtener un pasaje por su ID.
     *
     * @param int $idPasaje ID del pasaje a obtener.
     * @return Pasaje|false Objeto Pasaje si se encontró el pasaje, o false si no se encontró.
     */
    public function request_curlONE($idPasaje) {
        $urlmiservicio = "http://localhost/_serWeb/serVuelos/Pasaje.php?idpasaje=" . $idPasaje;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            // Convertir la respuesta JSON a un array asociativo
            $pasajeData = json_decode($res, true);

            // Verificar si se obtuvo el pasaje correctamente
            if ($pasajeData !== null) {
                // Crear un objeto Pasaje a partir de los datos obtenidos
                $pasaje = new Pasaje($pasajeData);
                return $pasaje;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
