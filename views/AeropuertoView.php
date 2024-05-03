<?php

class AeropuertoView{
    /**
     * Muestra las opciones disponibles en la vista del aeropuerto.
     *
     * @return void
     */
    public function mostrarOpcionesView(){
        echo "<h1>Bienvenido a la pagina oficial del Aeropuerto</h1>";
        echo '<form action="index.php?controller=Vuelos&action=mostrarTodosLosVuelos" method="post">';
        echo '<input type="submit" name="mostrar_vuelos" value="Mostrar Vuelos" class="btn-menu">';
        echo '</form>';
        
        
        echo '<form action="index.php?controller=Pasaje&action=mostrarForm" method="post">';
        echo '<input type="submit" name="insertar_pasaje" value="Insertar Pasaje" class="btn-menu">';
        echo '</form>';
    }
}

