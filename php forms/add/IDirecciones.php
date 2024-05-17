<?php
include("../../controlador/controlador.php");

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

$Con = Conectar();
$ResultSet = Ejecutar($Con,$SQL);//mysql_query devuelve 0 o 1 o error

if ($ResultSet) {
    print("Registro insertado");
    Desconectar($Con);
} else {
    print("Error");
}
?>
