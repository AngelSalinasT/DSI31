<?php
include("../../controlador/controlador.php");
include('../../login/validar_A.php');

$fecha = $_REQUEST['FECHA'];
$reporteSeccion = $_REQUEST['REPORTESECCION'];
$fundamento = $_REQUEST['FUNDAMENTO'];
$motivo = $_REQUEST['MOTIVO'];
$garantiaRetenida = $_REQUEST['GARANTIARETENIDA'];
$noParteAccidente = $_REQUEST['NOPARTEACCIDENTE'];
$convenio = $_REQUEST['CONVENIO'];
$puestoDisposicion = $_REQUEST['PUESTODISPOSICION'];
$depositoOficial = $_REQUEST['DEPOSITOOFICIAL'];
$observacionesOperativo = $_REQUEST['OBSERVAOPERATICO'];
$observacionesConductor = $_REQUEST['OBSERVACONDUCTOR'];
$calificacionBoleta = $_REQUEST['CALIFICACIONBOLETA'];
$noLicencia = $_REQUEST['NOLICENCIA'];
$oficiales = $_REQUEST['OFICIALES'];
$tarjetaCirculacion = $_REQUEST['TARJETACIRCULACION'];
$via = $_REQUEST['VIA'];
$kilometro = $_REQUEST['KILOMETRO'];
$carretera = $_REQUEST['CARRETERA'];
$velocimetro = $_REQUEST['VELOCIMETRO'];
$hora = $_REQUEST['HORA'];

print("Fecha: $fecha <br>");
print("Reporte de Sección: $reporteSeccion <br>");
print("Fundamento: $fundamento <br>");
print("Motivo: $motivo <br>");
print("Garantía Retenida: $garantiaRetenida <br>");
print("No. Parte Accidente: $noParteAccidente <br>");
print("Convenio: $convenio <br>");
print("Puesto a Disposición: $puestoDisposicion <br>");
print("Depósito Oficial: $depositoOficial <br>");
print("Observaciones Operativo: $observacionesOperativo <br>");
print("Observaciones Conductor: $observacionesConductor <br>");
print("Calificación de la Boleta: $calificacionBoleta <br>");
print("No. Licencia: $noLicencia <br>");
print("Oficiales: $oficiales <br>");
print("Tarjeta de Circulación: $tarjetaCirculacion <br>");
print("Vía: $via <br>");
print("Kilómetro: $kilometro <br>");
print("Carretera: $carretera <br>");
print("Velocímetro: $velocimetro <br>");
print("Hora: $hora <br>");

$SQL = "INSERT INTO multas (FECHA, REPORTESECCION, FUNDAMENTO, MOTIVO, GARANTIARETENIDA, NOPARTEACCIDENTE, CONVENIO, PUESTODISPOSICION, DEPOSITOOFICIAL, OBSERVAOPERATICO, OBSERVACONDUCTOR, CALIFICACIONBOLETA, NOLICENCIA, OFICIALES, TARJETACIRCULACION, VIA, KILOMETRO, CARRETERA, VELOCIMETRO, HORA) 
VALUES ('$fecha','$reporteSeccion','$fundamento','$motivo','$garantiaRetenida','$noParteAccidente','$convenio','$puestoDisposicion','$depositoOficial','$observacionesOperativo','$observacionesConductor','$calificacionBoleta','$noLicencia','$oficiales','$tarjetaCirculacion','$via','$kilometro','$carretera','$velocimetro','$hora');";
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
