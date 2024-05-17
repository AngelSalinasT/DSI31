<?php
    include("controlador.php");

    $Con = Conectar();
    $SQL = "SELECT * FROM PROPIETARIOS";
    $ResulSet = Ejecutar($Con, $SQL);

            //$Resultado = mysqli_num_rows($ResulSet);
            //devueve el numero de filas
            //$Resultado = mysqli_num_fields($ResulSet);
            //devuelve el numero de columnas
            /* while ($Resultado = mysqli_fetch_array($ResulSet)) {
                print_r($Resultado); // Imprime el array por eso es un bucle
            }
            while ($Resultado = mysqli_fetch_assoc($ResulSet)) {
                print_r($Resultado); // Imprime el array por eso es un bucle
            }
            while ($Resultado = mysqli_fetch_row($ResulSet)) {
                print_r($Resultado); // Imprime el array por eso es un bucle
            }
            while ($Campo = mysqli_fetch_field($ResulSet)) {
                print_r($Campo); // Imprime la información de cada campo
            }
            while ($Campos = mysqli_fetch_fields($ResulSet)) {
                foreach ($Campos as $Campo) {
                    print_r($Campo); // Imprime la información de cada campo
                }
            }*/
            $Resultado = mysqli_field_count();
            print_r($Resultado);
    Desconectar($Con);
?>

