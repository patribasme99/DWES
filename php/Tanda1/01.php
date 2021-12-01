<?php
    //Muestra la fecha actual con el formato dado en la hoja:

    echo '<strong>Fecha actual: </strong>';
    echo date("dS F Y,l")."<br><br>";
    
    
    //Muestra cuántos días quedan para finalizar el año:
    
    $fechaActual = "2021-09-14";
    $finAnio = "2021-12-31";
    
    $diferencia = abs(strtotime($finAnio) - strtotime($fechaActual));
    
    $anios  = floor($diferencia / (365 * 60 * 60 * 24));
    $meses = floor(($diferencia - $anios * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $dias   = floor(($diferencia - $anios * 365 * 60 * 60 * 24 - $meses * 30 * 60 * 60 *24) / (60 * 60 * 24));

    echo '<strong>Falta para terminar el año: </strong>';
    echo $anios." año, ".$meses." meses y ".$dias." dias<br><br>";
    
    
    //Crea una cadena/frase a partir de los elementos de un array de palabras y la visualiza:
    
    $cadena = array(
        1 => "Hola", 2 => "que", 3 => "tal");
    echo '<strong>Cadena creada a través de un array: </strong>';
    echo $cadena[1].", ¿".$cadena[2]." ".$cadena[3]."?<br><br>";


    //A partir de una cadena con eñes, crea y visualiza otra que reemplace las eñes por "gn":
    
    $cadenaGN ='montañista';
    
    $cadenaModificada = str_replace('ñ', 'gn', $cadenaGN);
    echo '<strong>Cambiamos la Ñ de '.$cadenaGN.': </strong>';
    echo $cadenaModificada."<br><br>";
    
    
    /*Función que devuelve un array con N números aletorios
    entre limite1 y limite2 (n, limite1, limite2 son parámetros de la función):*/
    
    function numerosAleatorios ($n, $lim1, $lim2) {
        $cont = 0;
        $numsAleatorios = array();
    
        while ($cont <= $n) {
            $numero = random_int($lim1, $lim2);
            array_push($numsAleatorios, $numero);
            $cont++;
        }

        return $numsAleatorios;
    }
    
    echo '<strong>Números aleatorios entre 2 y 20: </strong>';
    $numsAleatorios = numerosAleatorios(5, 2, 20);
    for($i = 1; $i < count($numsAleatorios); $i++){
        echo $numsAleatorios[$i]." ";
    }
    echo "<br><br>";
?>

