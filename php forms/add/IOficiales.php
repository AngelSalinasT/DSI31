<?php
    include("../../controlador/controlador.php");
    include('../../login/validar.php');

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

    $Con = Conectar();
    $ResultSet = Ejecutar($Con,$SQL);//mysql_queri devuelce 0 o 1 o error
    
    if ($ResultSet) {
        print("Registro insertado");
        Desconectar($Con);
    } else {
        print("Error");
    }
?>