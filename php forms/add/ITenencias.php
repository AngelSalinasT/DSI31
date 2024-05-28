<?php
    include("../../controlador/controlador.php");
    include('../../login/validar_A.php');

    $folio = $_REQUEST['FOLIO'];
    $capturaPago = $_REQUEST['CAPTURAPAGO'];
    $fechaLimite = $_REQUEST['FECHALIMITE'];
    $importe = $_REQUEST['IMPORTE'];
    $tipoPago = $_REQUEST['TIPOPAGO'];
    $fechaActual = $_REQUEST['FECHAACTUAL'];
    $hora = $_REQUEST['HORA'];
    $lineaCaptura = $_REQUEST['LINEACAPTURA'];
    $tarjetaCirculacion = $_REQUEST['TARJETACIRCULACION'];

    print("Folio: $folio <br>");
    print("Captura de Pago: $capturaPago <br>");
    print("Fecha Límite: $fechaLimite <br>");
    print("Importe: $importe <br>");
    print("Tipo de Pago: $tipoPago <br>");
    print("Fecha Actual: $fechaActual <br>");
    print("Hora: $hora <br>");
    print("Línea de Captura: $lineaCaptura <br>");
    print("Tarjeta de Circulación: $tarjetaCirculacion <br>");

    $SQL = "INSERT INTO tenencias (FOLIO, CAPTURAPAGO, FECHALIMITE, IMPORTE, TIPOPAGO, FECHAACTUAL, HORA, LINEACAPTURA, TARJETACIRCULACION) 
    VALUES ('$folio', '$capturaPago', '$fechaLimite', '$importe', '$tipoPago', '$fechaActual', '$hora', '$lineaCaptura', '$tarjetaCirculacion');";
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