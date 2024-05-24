<?php
    include("../../controlador/controlador.php");
    include('../../login/validar.php');

    $idCentroVerificacion = $_POST['ID'];
    $razonSocial = $_POST['RAZONSOCIAL'];
    $direccion = $_POST['DIRECCION'];
    $telefono = $_POST['TELEFONO'];
    
    print("ID del Centro de Verificación: $idCentroVerificacion <br>");
    print("Razón Social: $razonSocial <br>");
    print("Dirección: $direccion <br>");
    print("Teléfono: $telefono <br>");

    $SQL = "INSERT INTO centrosverificacion VALUES ('$idCentroVerificacion','$razonSocial','$direccion','$telefono');";
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