<?php
    
    //Mostramos las temperaturas del mes:

    $temperaturas = array(14,16,12,13,17,6);
    foreach ($temperaturas as $valor){
        echo $valor." ";
    }
    echo "<br><br>";
    
    
    //Calculamos su media sin bucle de forma redondeada y truncada:

    $suma = array_sum($temperaturas);
    $cont = count($temperaturas);
    $media = $suma / $cont;
    
    echo 'La media redondeada de las temperaturas es de '.round($media).'ºC<br>';
    echo 'La media truncada de las temperaturas es de '.floor($media).'ºC<br><br>';
    
    
    //Visualizar las 5 temperaturas más bajas y las 5 más altas:
    
    sort($temperaturas);
    echo 'Las 5 temperaturas más bajas:<br>';
    for($i = 0; $i < 5; $i++) {
        echo $temperaturas[$i].' ';
    }
    echo '<br><br>';
    rsort($temperaturas);
    echo 'Las 5 temperaturas más altas:<br>';
    for($i = 0; $i < 5; $i++) {
        echo $temperaturas[$i].' ';
    }
?>