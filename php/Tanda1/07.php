<?php

    $handle = fopen("Enlaces.txt", "r");
    while (!feof($handle)) {
        $linea = fgets($handle);
        $datos = explode('-', $linea);
        echo '<a href="'.$datos[0].'">'.$datos[1].'</a><br>';
    }
    fclose($handle);
?>