<?php
    //Crear un array con 10 ciudades, puede contener repetidos:

    $ciudades = array("Madrid","Barcelona","Vitoria","Bilbao","San Sebastián","Barcelona","San Sebastián","Madrid","Pamplona","Valencia");
    
    //Visualizar dicho array en una lista numerada y sin repetidos:
    
    $ciudadesNoRepetidas = array_unique($ciudades);
    
    echo '<ol>';
        foreach ($ciudadesNoRepetidas as $ciudad) {
            echo '<li>'.$ciudad.'</li>';
        }
    echo '</ol>';
?>