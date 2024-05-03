<?php

class VuelosService {

    /**
     * Realiza una solicitud cURL para obtener la información de todos los vuelos.
     *
     * @return array|false Un array de objetos Vuelo si la solicitud es exitosa, o false si hay un error.
     */
    public function request_curl() {
        $urlmiservicio = "http://localhost/_serWeb/serVuelos/Vuelos.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($conexion);
        curl_close($conexion);

        if ($res) {
            // Convertir la respuesta JSON a un array asociativo
            $vuelosData = json_decode($res, true);

            // Verificar si se obtuvieron los vuelos correctamente
            if ($vuelosData !== null) {
                // Crear objetos Vuelo a partir de los datos obtenidos
                $vuelos = [];
                foreach ($vuelosData as $vueloData) {
                    $vuelo = new Vuelo($vueloData);
                    $vuelos[] = $vuelo;
                }
                return $vuelos;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    /**
     * Realiza una solicitud cURL para obtener los identificadores de los vuelos.
     *
     * @return array|false Un array de objetos Vuelo con los identificadores si la solicitud es exitosa, o false si hay un error.
     */
    public function obtenerIdentificador(){
        
    $urlMiServicio = "http://localhost/_serWeb/serVuelos/Identificadores.php";
    $conexion = curl_init();

    // Configurar la URL y el método de la solicitud
    curl_setopt($conexion, CURLOPT_URL, $urlMiServicio);
    curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

    // Realizar la solicitud
    $res = curl_exec($conexion);
    curl_close($conexion);

    if ($res) {
        // Convertir la respuesta JSON a un array asociativo
        $identificadorData = json_decode($res, true);
        
        $identificador=[];
        
        foreach ($identificadorData as $identiData) {
                $id = new Vuelo($identiData);
                $identificador[] = $id;
            }
        return $identificador;
    } else {
        return false;
    }
}

    }

