<?php
    
    function tablaHoraria($diasSemana,$horaInicio,$horaFinal,$intervalo) {
    
        echo '<table style="border: 1px solid #000;">';
        
        echo '<tr>';
        echo '<td style="border: 1px solid #000;"></td>';
        for($i = 0; $i < count($diasSemana); $i++){
            echo '<td style="border: 1px solid #000;">'.$diasSemana[$i].'</td>';
        }
        echo '</tr>';
        
        $tiempoInicio = explode(':', $horaInicio);
        $tiempoFinal = explode(':', $horaFinal);
        
        $minutosInicio = (intval($tiempoInicio[0]) * 60) + intval($tiempoInicio[1]);
        $minutosFinales = (intval($tiempoFinal[0]) * 60) + intval($tiempoFinal[1]);
        $sombra = 0;
        
        while ($minutosInicio <= $minutosFinales) {
            echo '<tr>';
            
            if ($sombra == 0){
                if ($tiempoInicio[1] == 0) {
                    echo '<td style="border: 1px solid #000">'.$tiempoInicio[0].':00</td>';
                }
                for($i = 0; $i < count($diasSemana); $i++){
                    echo '<td style="border: 1px solid #000"></td>';
                }
                $sombra = 1;
            } else {
                if ($tiempoInicio[1] == 0) {
                    echo '<td style="border: 1px solid #000; background-color: gray">'.$tiempoInicio[0].':00</td>';
                }
                for($i = 0; $i < count($diasSemana); $i++){
                    echo '<td style="border: 1px solid #000; background-color: gray"></td>';
                }
                $sombra = 0;
            }
            
            echo '</tr>';
            
            $minutosInicio += $intervalo;
            $tiempoInicio[1] += $intervalo;
            if ($tiempoInicio[1]>59) {
                $tiempoInicio[1] -= 60;
                $tiempoInicio[0]++;
            }
        }      
        echo '</table>';   
    }
    $dias = array("Lun","Mar","Mie","Jue","Vie","Sab","Dom");
    $inicio = "8:00";
    $final = "15:00";
    $intervalo = 60;
    tablaHoraria($dias, $inicio, $final, $intervalo);
?>