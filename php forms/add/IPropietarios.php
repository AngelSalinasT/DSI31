<?php

    include("../../controlador/controlador.php");

    $Nombre = $_GET['NOMBRE'];
    $Apellidos = $_GET['APELLIDOS'];
    $Telefono = $_GET['TELEFONO'];
    $Correo = $_GET['CORREO'];
    $RFC = $_GET['RFC'];
    $CURP = $_GET['CURP'];
    $Direccion = $_GET['DIRECCION'];

    print("Nombre ".$Nombre."<br>");
    print("Apellidos ".$Apellidos."<br>");
    print("Telefono ".$Telefono."<br>");
    print("Correo ".$Correo."<br>");
    print("CURP".$CURP."<br>");
    print("RFC ".$RFC."<br>");
    print("Direccion ".$Direccion."<br>");

    $SQL = "INSERT INTO propietarios (NOMBRE, APELLIDOS, CURP, TELEFONO, CORREO, RFC, DIRECCION) 
    VALUES ('$Nombre', '$Apellidos', '$CURP', '$Telefono', '$Correo', '$RFC', '$Direccion');";    
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