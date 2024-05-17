<?php
    include("../../controlador/controlador.php");

    $folio = $_GET['FOLIO'];
    $vigencia = $_GET['VIGENCIA'];
    $fechaExpedicion = $_GET['FECHAEXPEDICION'];
    $movimiento = $_GET['MOVIMIENTO'];
    $tipoServicio = $_GET['TIPOSERVICIO'];
    $vehiculo = $_GET['VEHICULO'];
    $propietario = $_GET['PROPIETARIO'];
    $operacion = $_GET['OPERACION'];
    $origen = $_GET['ORIGEN'];
    $tamotor = $_GET['NOMOTOR'];

    print("Folio: $folio <br>");
    print("Vigencia: $vigencia <br>");
    print("Fecha de Expedición: $fechaExpedicion <br>");
    print("Movimiento: $movimiento <br>");
    print("Tipo de Servicio: $tipoServicio <br>");
    print("Vehículo: $vehiculo <br>");
    print("Propietario: $propietario <br>");
    print("Operación: $operacion <br>");
    print("Origen: $origen <br>");
    print("Origen: $tamotor <br>");

    $SQL = "INSERT INTO tarjetascirculacion (FOLIO, VIGENCIA, FECHAEXPEDICION, MOVIMIENTO, TIPOSERVICIO, VEHICULO, PROPIETARIO, OPERACION, ORIGEN, NOMOTOR) 
    VALUES ('$folio', '$vigencia', '$fechaExpedicion', '$movimiento', '$tipoServicio', '$vehiculo', '$propietario', '$operacion', '$origen', '$tamotor');";
    print($SQL);

    $Con = Conectar();
    $ResultSet = Ejecutar($Con,$SQL);
    
    if ($ResultSet) {
        print("Registro insertado");
        Desconectar($Con);
    } else {
        print("Error");
    }
?>
