<?php

    //CIFRADO CESAR:

    $valores = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    $palabra = $_POST['textoACifrar'];
    $palabra = strtoupper($palabra);
    $numero;
    $palabraCifrada="";
    $aux=0;
    
    if (isset($_POST["desplazamiento"]) && !empty($_POST["cifradoCesar"])){
        $numeroDesplazamiento = $_POST['desplazamiento'];
        foreach ($numeroDesplazamiento as $valor) {
            print_r($valor);
        }
        
    }
    
    if (isset($_POST["cifradoCesar"]) && !empty($_POST["cifradoCesar"])) {
        
        /*for($i = 0;$i < strlen($palabra);$i++){
            for($j = 0;$j < count($valores);$j++){
                if (strcmp($palabra[$i], $valores[$j])){
                    if ($j + $numero > count($valores)){
                        $aux = ($j + $numero) - count($valores);
                        $palabraCifrada .= $valores[$aux];
                    } else {
                        $palabraCifrada .= $valores[$j + $numero];
                    }
                }
            }
        }*/
    
        //echo $numero;
        echo $palabra."-----".$palabraCifrada.'<br><br>';
    }
    
    
    //CIFRADO POR SUSTITUCIÓN:
    
    
?>

