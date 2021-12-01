<?php
    
    function tablaImagenes($array) {
        $imagenesNoRepetidas = array_unique($array);
        $posicionArray = 0;
        echo '<table border="1"><caption>TABLA EVOLUTIVA</caption>';
        for($i = 0; $i < 3; $i++){
            echo '<tr>';
            for($j = 0; $j < 3; $j++){
                echo '<td><a href="'.$imagenesNoRepetidas[$posicionArray].'" target="_blank"><img src="'.$imagenesNoRepetidas[$posicionArray].'" heigth="80" width="80" /></a></td>';
                $posicionArray++;
            }
            echo '</tr>';
        }
        echo '</table>';
    }
    
    $imagenes = array(
        "imagenes/bulbasur.png",
        "imagenes/ivisaur.png",
        "imagenes/venasaur.png",
        "imagenes/squirtle.png",
        "imagenes/wartortle2.png",
        "imagenes/blastoise.png",
        "imagenes/charmander.png",
        "imagenes/charmeleon.png",
        "imagenes/charizard.png");
    
    tablaImagenes($imagenes);
?>