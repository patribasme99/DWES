<?php
    
    function peliculaFavorita($pelicula) {
        $array = array(
           "Oihane" => array("Transformers","Fast & Furious","Skyfall"),
            "Joel" => array("Transformers","Capitana Marvel","Spider-Man"),
            "Claudia" => array("El Señor de los Anillos","Aquaman","Capitán América"),
            "Adriana" => array("Los Minions","Iron Man","Fast & Furious"),
            "Jesús" => array("Black Panther","Fast & Furious","Los Vengadores")
        );
        $numPersonas = 0;
        
        foreach ($array as $clave => $segundoArray) {
            if (in_array($pelicula, $segundoArray) == true) {
                $numPersonas++;
            }
            
            $peliculasAleatorias = array_rand($segundoArray, 2);
            echo 'Películas favoritas de '.$clave.': '.$segundoArray[$peliculasAleatorias[0]].' y '.$segundoArray[$peliculasAleatorias[1]].'<br>';
        }
        
        return $numPersonas;
    }       
    
    echo 'La película "Fast & Furious" es favorita de '. peliculaFavorita("Fast & Furious") . ' personas.';
?>