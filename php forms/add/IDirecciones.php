<?php
include("../../controlador/controlador.php");
include('../../login/validar_A.php');

$calle = $_REQUEST['CALLE'];
$numero = $_REQUEST['NUMERO'];
$colonia = $_REQUEST['COLONIA'];
$municipio = $_REQUEST['MUNICIPIO'];
$codigoPostal = $_REQUEST['CODIGOPOSTAL'];
$estado = $_REQUEST['ESTADO'];

print("Calle: $calle <br>");
print("Número: $numero <br>");
print("Colonia: $colonia <br>");
print("Municipio: $municipio <br>");
print("Código Postal: $codigoPostal <br>");
print("Estado: $estado <br>");

$SQL = "INSERT INTO direcciones (CALLE, NUMERO, COLONIA, MUNICIPIO, CODIGOPOSTAL, ESTADO) VALUES ('$calle','$numero','$colonia','$municipio','$codigoPostal','$estado');";
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
