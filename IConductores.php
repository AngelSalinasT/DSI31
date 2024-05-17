<?php
    include("controlador.php");

    $nombre = $_REQUEST['NOMBRE'];
    $apellidos = $_REQUEST['APELLIDOS'];
    $curp = $_REQUEST['CURP'];
    $telefono = $_REQUEST['TELEFONO'];
    $correo = $_REQUEST['CORREO'];
    $rfc = $_REQUEST['RFC'];
    $tipoSangre = $_REQUEST['TIPOSANGRE'];
    $donadorActivo = $_REQUEST['DONADORACTIVO'];
    $numEmergencia = $_REQUEST['NUMEMER'];
    $direccion = $_REQUEST['DIRECCION'];
    $fechaNac = $_REQUEST['fechan'];
    $firma = $_REQUEST['firma'];
    
    print("Nombre: $nombre <br>");
    print("Apellidos: $apellidos <br>");
    print("CURP: $curp <br>");
    print("Teléfono: $telefono <br>");
    print("Correo: $correo <br>");
    print("RFC: $rfc <br>");
    print("Tipo de Sangre: $tipoSangre <br>");
    print("Donador Activo: $donadorActivo <br>");
    print("Número de Emergencia: $numEmergencia <br>");
    print("Dirección: $direccion <br>");   
    print("Fecha de nacimento: $fechaNac <br>");
    print("Firma: $firma <br>"); 

    $SQL = "INSERT INTO conductores (NOMBRE, APELLIDOS, CURP, TELEFONO, CORREO, RFC, TIPOSANGRE, DONADORACTIVO, NUMEMER, DIRECCION,FECHANAC,Firma) VALUES ('$nombre','$apellidos','$curp','$telefono','$correo','$rfc','$tipoSangre','$donadorActivo','$numEmergencia','$direccion','$fechaNac','$firma');";
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