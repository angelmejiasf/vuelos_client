<?php

class PasajeView {

    /**
     * Muestra el formulario para insertar un pasaje.
     *
     * @param array $pasajeros Lista de pasajeros disponibles.
     * @param array $vuelos Lista de vuelos disponibles.
     * @return void
     */
    public function mostrarFormulario($pasajeros, $vuelos) {

        echo "<h2>Insertar Pasaje</h2>";
        echo "<form method='post' action='index.php?controller=Pasaje&action=insertarPasaje' class='pasaje-form'>";
        echo "<label class='clase-label'>Pasajero</label><br>";
        echo "<select name='pasajerocod'>";

        foreach ($pasajeros as $pasajero) {
            echo "<option value='" . $pasajero->getPasajeroCod() . "'>" . $pasajero->getPasajeroCod() . " - " . $pasajero->getNombre() . "</option>";
        }
        echo "</select><br>";
        echo "<label class='clase-label'>Vuelo</label><br>";
        echo "<select name='identificador'>";
        foreach ($vuelos as $vuelo) {
            echo "<option value='" . $vuelo->getIdentificador() . "'>" . $vuelo->getIdentificador() . " - " . $vuelo->getAeropuertoorigen() . $vuelo->getAeropuertodestino() . "</option>";
        }
        echo "</select><br>";

        echo "<label class='clase-label'>Numero de asiento</label>";
        echo "<input type='number' name='numasiento' class='pasaje-input' required><br>";

        echo '<div class="clase-options">';
        echo '<label class="clase-label">Selecciona clase</label><br>';
        echo '<label class="clase-radio"><input type="radio" name="clase" value="Turista" required> Turista</label>';
        echo '<label class="clase-radio"><input type="radio" name="clase" value="Primera" required> Primera</label>';
        echo '<label class="clase-radio"><input type="radio" name="clase" value="Business" required> Business</label>';
        echo '</div>';

        echo "<label class='clase-label'>PVP</label>";
        echo "<input type='number' name='pvp' class='pasaje-input' required><br>";

        echo "<input type='submit' value='Insertar Pasaje' class='submit-btn'>";
        echo "</form>";
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

    public function volveraPasajes() {
        echo '<form action="index.php?controller=Pasaje&action=mostrarPasajes" method="post">';
        echo "<button class='volver-btn'>Volver a Pasajes</button>";
        echo "</form>";
    }

    /**
     * Muestra los mensajes devueltos
     * 
     * @param type $mensaje
     */
    public function mostrarMensaje($mensaje) {
        echo "<h2>. $mensaje . </h2>";
    }

    public function mostrarPasajes($pasajes) {
        echo "<h2>Pasajes</h2>";
        echo "<table border='1' >";
        echo "<tr><th>ID Pasaje</th><th>ID Pasajero</th><th>Identificador</th><th>Asiento</th><th>Clase</th><th>PVP</th><th>Acciones</th></tr>";

        foreach ($pasajes as $pasaje) {
            echo "<tr>";
            echo "<td>{$pasaje->getIdPasaje()}</td>";
            echo "<td>{$pasaje->getPasajeroCod()}</td>";
            echo "<td>{$pasaje->getIdentificador()}</td>";
            echo "<td>{$pasaje->getNumAsiento()}</td>";
            echo "<td>{$pasaje->getClase()}</td>";
            echo "<td>{$pasaje->getPVP()}</td>";
            echo "<td>";
            echo "<form action='index.php?controller=Pasaje&action=eliminarPasaje' method='post'>";
            echo "<input type='hidden' name='id_pasaje' value='{$pasaje->getIdPasaje()}'>";
            echo "<input type='submit' name='eliminar_pasaje' value='Eliminar'>";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form action='index.php?controller=Pasaje&action=mostrarFormActualizacion' method='post'>";
            echo "<input type='hidden' name='id_pasaje' value='{$pasaje->getIdPasaje()}'>";
            echo "<input type='submit' name='actualizar_pasaje' value='Actualizar'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    /**
     * Muestra el formulario de actualización de un pasaje, permitiendo seleccionar el vuelo y actualizar los demás datos del pasaje.
     *
     * @param object $pasaje El objeto del pasaje que se va a actualizar.
     * @param array $vuelos Un array de objetos de vuelo para mostrar en el select.
     * @return void
     */
    public function mostrarFormActualizacion($pasaje, $vuelos) {
        echo "<form action='index.php?controller=Pasaje&action=actualizarPasaje' method='post' class='pasaje-form'>";
        echo "<input type='hidden' name='id_pasaje' value='{$pasaje->getIdPasaje()}'>";
        echo "<input type='hidden' name='pasajerocod' value='{$pasaje->getPasajeroCod()}'>";

        echo "<label class='clase-label'>Selecciona el vuelo</label><br>";
        echo "<select name='identificador'>";
        foreach ($vuelos as $vuelo) {

            echo "<option value='{$vuelo->getIdentificador()}'>{$vuelo->getIdentificador()}</option>";
        }
        echo "</select><br>";

        echo "<label class='clase-label'>Selecciona el asiento</label><br>";
        echo "<input type='text' name='asiento' value='{$pasaje->getNumAsiento()}'><br>";
        echo "<label class='clase-label'>Selecciona la clase</label><br>";
        echo "<input type='text' name='clase' value='{$pasaje->getClase()}'><br>";
        echo "<label class='clase-label'>Selecciona el precio</label><br>";
        echo "<input type='text' name='pvp' value='{$pasaje->getPVP()}'><br>";
        echo "<input type='submit' name='actualizar_pasaje' value='Actualizar' class='submit-btn'>";
        echo "</form>";
    }
}

?>
