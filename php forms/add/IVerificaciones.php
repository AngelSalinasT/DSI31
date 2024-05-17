<?php
    include("../../controlador/controlador.php");

    $fecha = $_POST['FECHA'];
    $dictamen = $_POST['DICTAMEN'];
    $tecnico = $_POST['TECNICO'];
    $horaEntrada = $_POST['HORAENTRADA'];
    $horaSalida = $_POST['HORASALIDA'];
    $folioPrueba = $_POST['FOLIOPRUEBA'];
    $vigencia = $_POST['VIGENCIA'];
    $semestre = $_POST['SEMESTRE'];
    $tipo = $_POST['TIPO'];
    $centrosVerificacion = $_POST['CENTTROSVERIFICACION'];
    $tarjetaCirculacion = $_POST['TARJETACIRCULACION'];

    print("Fecha: $fecha <br>");
    print("Dictamen: $dictamen <br>");
    print("Técnico: $tecnico <br>");
    print("Hora de Entrada: $horaEntrada <br>");
    print("Hora de Salida: $horaSalida <br>");
    print("Folio de Prueba: $folioPrueba <br>");
    print("Vigencia: $vigencia <br>");
    print("Semestre: $semestre <br>");
    print("Tipo: $tipo <br>");
    print("Centros de Verificación: $centrosVerificacion <br>");
    print("Tarjeta de Circulación: $tarjetaCirculacion <br>");

    $SQL = "INSERT INTO verificaciones (FECHA, DICTAMEN, TECNICO, HORAENTRADA, HORASALIDA, FOLIOPRUEBA, VIGENCIA, SEMESTRE, TIPO, CENTROVERIFICACION, TARJETACIRCULACION) 
    VALUES ('$fecha', '$dictamen', '$tecnico', '$horaEntrada', '$horaSalida', '$folioPrueba', '$vigencia', '$semestre', '$tipo', '$centrosVerificacion','$tarjetaCirculacion');";
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