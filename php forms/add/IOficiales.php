<?php
    include("../../controlador/controlador.php");
    include('../../login/validar_A.php');

    $nombre = $_REQUEST['NOMBRE'];
    $apellidos = $_REQUEST['APELLIDOS'];
    $firma = $_REQUEST['FIRMA'];
    $region = $_REQUEST['REGION'];
    
    print("Nombre: $nombre <br>");
    print("Apellidos: $apellidos <br>");
    print("Firma: $firma <br>");
    print("Región: $region <br>");

    $SQL = "INSERT INTO oficiales (NOMBRE, APELLIDOS, FIRMA, REGION) VALUES ('$nombre','$apellidos','$firma','$region');";   
    print($SQL);

    try {
        $Con = Conectar();
        $ResultSet = Ejecutar($Con, $SQL);
        
        if ($ResultSet) {
            print("Registro insertado");
        } else {
            throw new Exception("Error al insertar el registro.");
        }
        
        Desconectar($Con);
    } catch (Exception $e) {
        print("<br><br>Se ha producido un error, favor de ingresar valores validos y que existan en la base de datos");
    }
?>