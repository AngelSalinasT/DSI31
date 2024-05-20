<?php
require('../librerias/fpdf.php');
include("../controlador/controlador.php");

$Id = $_POST['ID'];

$Con = Conectar();

$SQL = "SELECT * FROM vtarjetaultra WHERE VERIFOLIO = '$Id';";

$ResultSet = Ejecutar($Con, $SQL);

$Fila = mysqli_fetch_row($ResultSet);

Desconectar($Con);

function generarXML($id, $fila) {
    $fechaGeneracion = date('Y-m-d H:i:s');

    $xmlContent = "\n<TarjetaCirculacion>\n";
    $xmlContent .= "    <TipoServicio>{$fila[4]}</TipoServicio>\n";
    $xmlContent .= "    <Holograma>ESTAMPA</Holograma>\n";
    $xmlContent .= "    <Folio>{$fila[0]}</Folio>\n";
    $xmlContent .= "    <Vigencia>{$fila[1]}</Vigencia>\n";
    $xmlContent .= "    <Placa>{$fila[31]}</Placa>\n";
    $xmlContent .= "    <RFC>{$fila[9]}</RFC>\n";
    $xmlContent .= "    <NumeroSerie>{$fila[15]}</NumeroSerie>\n";
    $xmlContent .= "    <Modelo>{$fila[27]}</Modelo>\n";
    $xmlContent .= "    <Localidad>{$fila[13]}</Localidad>\n";
    $xmlContent .= "    <MarcaLineaSublinea>{$fila[30]}</MarcaLineaSublinea>\n";
    $xmlContent .= "    <Operacion>{$fila[8]}</Operacion>\n";
    $xmlContent .= "    <Municipio>{$fila[12]}</Municipio>\n";
    $xmlContent .= "    <PlacaAnterior>{$fila[29]}</PlacaAnterior>\n";
    $xmlContent .= "    <NCI>{$fila[28]}</NCI>\n";
    $xmlContent .= "    <Cilindraje>{$fila[17]}</Cilindraje>\n";
    $xmlContent .= "    <CVVVehicular>{$fila[15]}</CVVVehicular>\n";
    $xmlContent .= "    <FechaExpedicion>{$fila[2]}</FechaExpedicion>\n";
    $xmlContent .= "    <Puertas>{$fila[19]}</Puertas>\n";
    $xmlContent .= "    <Clase>{$fila[23]}</Clase>\n";
    $xmlContent .= "    <Asientos>{$fila[20]}</Asientos>\n";
    $xmlContent .= "    <Tipo>{$fila[24]}</Tipo>\n";
    $xmlContent .= "    <OficinaExpendidora>{$fila[15]}</OficinaExpendidora>\n";
    $xmlContent .= "    <Origen>{$fila[9]}</Origen>\n";
    $xmlContent .= "    <Color>{$fila[33]}</Color>\n";
    $xmlContent .= "    <Combustible>{$fila[21]}</Combustible>\n";
    $xmlContent .= "    <Transmision>{$fila[22]}</Transmision>\n";
    $xmlContent .= "    <Uso>{$fila[25]}</Uso>\n";
    $xmlContent .= "    <RPA>{$fila[26]}</RPA>\n";
    $xmlContent .= "    <Movimiento>{$fila[3]}</Movimiento>\n";
    $xmlContent .= "    <NumeroMotor>{$fila[34]}</NumeroMotor>\n";
    $xmlContent .= "    <Fabricacion>HECHO EN MÉXICO</Fabricacion>\n";
    $xmlContent .= "    <FechaGeneracion>{$fechaGeneracion}</FechaGeneracion>\n";
    $xmlContent .= "</TarjetaCirculacion>";

    $xmlFileName = 'TarjetaCirculacion_' . $id . '.xml';
    $fileHandle = fopen($xmlFileName, 'a');

    if ($fileHandle) {
        fwrite($fileHandle, $xmlContent);
        fclose($fileHandle);
        return $xmlFileName;
    } else {
        throw new Exception('No se pudo crear o abrir el archivo XML.');
    }
}

try {
    $xmlFileName = generarXML($Id, $Fila);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}

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
$pdf->Cell(0, 10, utf8_decode($localidad), 0, 1);

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
