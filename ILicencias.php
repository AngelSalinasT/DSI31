<?php
    include("controlador.php");

    $numeroLicencia = $_GET['NOLICENCIA'];
    $tipoLicencia = $_GET['TIPO'];
    $fechaExpedicion = $_GET['FECHAEXPEDICION'];
    $vigencia = $_GET['VIGENCIA'];
    $antiguedad = $_GET['ANTIGUEDAD'];
    $idConductor = $_GET['CONDUCTOR'];
    $restricciones = $_GET['RESTRICCIONES'];

    print("Número de Licencia: $numeroLicencia <br>");
    print("Tipo: $tipoLicencia <br>");
    print("Fecha de Expedición: $fechaExpedicion <br>");
    print("Vigencia: $vigencia <br>");
    print("Antigüedad: $antiguedad <br>");
    print("ID del Conductor: $idConductor <br>");
    print("Restricciones: $restricciones <br>");

    $SQL = "INSERT INTO licencias VALUES ('$numeroLicencia','$tipoLicencia','$fechaExpedicion','$vigencia','$antiguedad','$idConductor', '$restricciones');";
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