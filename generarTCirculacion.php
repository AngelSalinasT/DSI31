<?php
require('fpdf.php');
include("controlador.php");
$Id = $_POST['ID'];

$Con = Conectar();

$SQL = "SELECT * FROM vtarjetaultra WHERE VERIFOLIO = '$Id';";

$ResultSet = Ejecutar($Con,$SQL);

$Fila = mysqli_fetch_row($ResultSet);

Desconectar($Con);

$tiposervicio = 'Tipo de Servicio: ' . $Fila[4];
$holograma = 'Holograma: ' . 'ESTAMPA';
$folio = 'Folio: ' . $Fila[0];

$vigencia = 'Vigencia: ' . $Fila[1];
$placa = 'Placa: ' . $Fila[31];
$rfc = 'RFC: ' . $Fila[9];
$numserie = 'Número de Serie: ' . $Fila[15];
$modelo = 'Modelo: ' . $Fila[27];
$localidad = 'Localidad: ' .$Fila[13];
$marcalineasublinea = 'Marca/Línea/Sublínea: ' . $Fila[30];
$operacion = 'Operación: ' . $Fila[8];
$municipio = 'Municipio: ' . $Fila[12];
$placaant = 'Placa Anterior: ' . $Fila[29];
$NCI = 'NCI: ' . $Fila[28];
$cilindraje = 'Cilindraje: ' . $Fila[17];
$cvvvehicular = 'CVV Vehicular: ' . $Fila[15];
$fechaexpedicion = 'Fecha de Expedición: ' . $Fila[2];
$puertas = 'Puertas: ' . $Fila[19];
$clase = 'Clase: ' . $Fila[23];
$asientos = 'Asientos: ' . $Fila[20];
$tipo = 'Tipo: ' . $Fila[24];
$oficinaexpendidora = 'Oficina Expendidora: ' . $Fila[15];
$origen = 'Origen: ' . $Fila[9];
$color = 'Color: ' . $Fila[33];
$combustible = 'Combustible: ' . $Fila[21];
$transmicion = 'Transmisión: ' . $Fila[22];
$uso = 'Uso: ' . $Fila[25];
$rpa = 'RPA: ' . $Fila[26];
$movimiento = 'Movimiento: ' . $Fila[3];
$nummotor = 'Número de Motor: ' . $Fila[34];
$fabricacion = 'HECHO EN MÉXICO';



$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);



$pdf->SetXY(10, 30);
$pdf->Cell(0, 10, utf8_decode($tiposervicio), 0, 1);

$pdf->SetXY(110, 30);
$pdf->Cell(0, 10, utf8_decode($holograma), 0, 1);

$pdf->SetXY(160, 30);
$pdf->Cell(0, 10, utf8_decode($folio), 0, 1);

$pdf->SetXY(200, 30);
$pdf->Cell(0, 10, utf8_decode($vigencia), 0, 1);

$pdf->SetXY(250, 30);
$pdf->Cell(0, 10, utf8_decode($placa), 0, 1);



$pdf->SetXY(10, 50);
$pdf->Cell(0, 10, utf8_decode($rfc), 0, 1);

$pdf->SetXY(80, 50);
$pdf->Cell(0, 10, utf8_decode($numserie), 0, 1);

$pdf->SetXY(160, 50);
$pdf->Cell(0, 10, utf8_decode($modelo), 0, 1);



$pdf->SetXY(10, 62);
$pdf->Cell(0, 10,utf8_decode($localidad), 0, 1);

$pdf->SetXY(80, 62);
$pdf->Cell(0, 10, utf8_decode($marcalineasublinea), 0, 1);

$pdf->SetXY(160, 62);
$pdf->Cell(0, 10, utf8_decode($operacion), 0, 1);



$pdf->SetXY(10, 74);
$pdf->Cell(0, 10, utf8_decode($municipio), 0, 1);

$pdf->SetXY(160, 74);
$pdf->Cell(0, 10, utf8_decode($folio), 0, 1);



$pdf->SetXY(160, 86);
$pdf->Cell(0, 10, utf8_decode($placaant), 0, 1);



$pdf->SetXY(10, 98);
$pdf->Cell(0, 10, utf8_decode($NCI), 0, 1);

$pdf->SetXY(60, 98);
$pdf->Cell(0, 10, utf8_decode($cilindraje), 0, 1);

$pdf->SetXY(100, 98);
$pdf->Cell(0, 10, utf8_decode($cvvvehicular), 0, 1);

$pdf->SetXY(160, 98);
$pdf->Cell(0, 10, utf8_decode($fechaexpedicion), 0, 1);


$pdf->SetXY(60, 110);
$pdf->Cell(0, 10, utf8_decode($puertas), 0, 1);

$pdf->SetXY(100, 110);
$pdf->Cell(0, 10, utf8_decode($clase), 0, 1);

$pdf->SetXY(160, 110);
$pdf->Cell(0, 10, utf8_decode($oficinaexpendidora), 0, 1);



$pdf->SetXY(10, 122);
$pdf->Cell(0, 10, utf8_decode($origen), 0, 1);

$pdf->SetXY(60, 122);
$pdf->Cell(0, 10, utf8_decode($asientos), 0, 1);

$pdf->SetXY(100, 122);
$pdf->Cell(0, 10, utf8_decode($tipo), 0, 1);

$pdf->SetXY(160, 122);
$pdf->Cell(0, 10, utf8_decode($movimiento), 0, 1);



$pdf->SetXY(60, 136);
$pdf->Cell(0, 10, utf8_decode($combustible), 0, 1);

$pdf->SetXY(120, 136);
$pdf->Cell(0, 10, utf8_decode($uso), 0, 1);



$pdf->SetXY(10, 148);
$pdf->Cell(0, 10, utf8_decode($color), 0, 1);

$pdf->SetXY(60, 148);
$pdf->Cell(0, 10, utf8_decode($transmicion), 0, 1);

$pdf->SetXY(120, 148);
$pdf->Cell(0, 10, utf8_decode($rpa), 0, 1);

$pdf->SetXY(160, 148);
$pdf->Cell(0, 10, utf8_decode($nummotor), 0, 1);



$pdf->SetXY(160, 160);
$pdf->Cell(0, 10, utf8_decode($fabricacion), 0, 1);



$pdf->Image('F1.png', 0, 170, 234, 5); 
$pdf->Image('F2.png', 0, 175, 234, 35); 
$pdf->Image('qr.png', 232, 146, 65, 65); 
$pdf->Image('logoPro.jpg', 0, 0, 60, 30); 
$pdf->Image('banner.png', 60, 10, 300, 10); 

$pdf->SetXY(60, 3);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, 'TARJETA DE CIRCULACION', 0, 1);


$pdf->Output('I', 'TarjetaCirculacion.pdf');

?>