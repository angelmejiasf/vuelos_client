<?php

class PasajesService {
    

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
                echo '<form action="index.php?controller=Pasaje&action=mostrarForm" method="post">';
                echo "<button class='volver-btn'>Volver</button>";
                echo "</form>";
                
            } else {
                // Mostrar un mensaje genérico si no se pudo obtener el resultado
                echo "No se pudo obtener el resultado del servicio.";
                 echo '<form action="index.php?controller=Pasaje&action=mostrarForm" method="post">';
                echo "<button class='volver-btn'>Volver</button>";
                echo "</form>";
            }
        }
        curl_close($conexion);
    }
}
