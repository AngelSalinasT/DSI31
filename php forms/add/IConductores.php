<?php
    include("../../controlador/controlador.php");
    include('../../login/validar_A.php');

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

    $SQL = "INSERT INTO conductores (NOMBRE, APELLIDOS, CURP, TELEFONO, CORREO, RFC, TIPOSANGRE, DONADORACTIVO, NUMEMER, DIRECCION,FECHANAC) VALUES ('$nombre','$apellidos','$curp','$telefono','$correo','$rfc','$tipoSangre','$donadorActivo','$numEmergencia','$direccion','$fechaNac');";
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