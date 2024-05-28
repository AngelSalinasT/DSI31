<?php

    include("../../controlador/controlador.php");
    include('../../login/validar_A.php');

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