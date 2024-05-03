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
}

?>
