<?php

include_once './Services/classes/Vuelo.php';

class VuelosView {
    /**
     * Muestra todos los vuelos en una tabla.
     *
     * @param array $vuelos Lista de objetos Vuelo.
     * @return void
     */
    public function mostrarTodosLosVuelos($vuelos) {
        echo "<h2>Vuelos</h2>";
        echo "<table border='1' >";
        echo "<tr><th>ID Vuelo</th><th>Aeropuerto Origen</th><th>Aeropuerto Destino</th><th>Tipo de Vuelo</th><th>Fecha de Vuelo</th><th>Descuento</th></tr>";

        foreach ($vuelos as $vuelo) {
            echo "<tr>";
            echo "<td>{$vuelo->getIdentificador()}</td>";
            echo "<td>{$vuelo->getAeropuertoOrigen()}</td>";
            echo "<td>{$vuelo->getAeropuertoDestino()}</td>";
            echo "<td>{$vuelo->getTipoVuelo()}</td>";
            echo "<td>{$vuelo->getFechaVuelo()}</td>";
            echo "<td>{$vuelo->getDescuento()}</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    
    /**
     * Muestra un botón para volver al menú principal.
     *
     * @return void
     */
    public function volverMenu() {
        echo '<form action="index.php?controller=Aeropuerto&action=mostrarOpciones" method="post">';
        echo "<button class='volver-btn'>Volver al Menu</button>";
        echo "</form>";
    }
}


