<?php
    //Abrir archivo
    $Manejador = fopen("Datos1.txt","a");
    //escribir
    fwrite($Manejador, "Hola");
    //cerrar
    fclose($Manejador);

     //Abrir archivo
     $Manejador = fopen("Datos1.txt","r");

     //escribir
    $Linea = fgets($Manejador);
    $Linea = fgets($Manejador);
    $Linea = fgets($Manejador);
    print($Linea);
     //cerrar
     fclose($Manejador);
?>