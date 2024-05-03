<?php

require_once 'classes/Pasajero.php';
class PasajerosService {

    /**
     * Obtiene la lista de pasajeros desde un servicio web.
     *
     * @return array|false Un array de objetos Pasajero si la solicitud es exitosa, false si hay un error.
     */
    public function obtenerPasajeros() {
        $urlMiServicio = "http://localhost/_serWeb/serVuelos/Pasajeros.php";
        $conexion = curl_init();

        // Configurar la URL y el método de la solicitud
        curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        // Realizar la solicitud GET
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            // Convertir la respuesta JSON a un array de objetos Pasajero
            $pasajerosData = json_decode($res, true);

            // Crear un array para almacenar los objetos Pasajero
            $pasajeros = [];

            // Recorrer los datos de los pasajeros y crear objetos Pasajero
            foreach ($pasajerosData as $pasajeroData) {
                $pasajero = new Pasajero($pasajeroData);
                $pasajeros[] = $pasajero;
            }

            return $pasajeros;
        } else {
            return false;
        }
    }
}
