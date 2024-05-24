<?php
require('../librerias/fpdf.php');
include('../controlador/controlador.php');

$Id = $_POST['ID'];

$Con = Conectar();

$SQL = "SELECT * FROM vtarjetaultra WHERE FOLIOTA = '$Id';";
$ResultSet = Ejecutar($Con, $SQL);
$Fila = mysqli_fetch_assoc($ResultSet); // Obtiene los datos como un array asociativo
if (!$Fila || !is_array($Fila)) {
    die('Error: No se encontraron registros para el ID proporcionado.');
}
Desconectar($Con);

function generarXML($id, $fila) {
    $fechaGeneracion = date('Y-m-d H:i:s');

    $xmlContent = "\n<TarjetaCirculacion>\n";
    $xmlContent .= "    <TipoServicio>{$fila['TIPOSERVICIO']}</TipoServicio>\n";
    $xmlContent .= "    <Holograma>ESTAMPA</Holograma>\n";
    $xmlContent .= "    <Folio>{$fila['FOLIO']}</Folio>\n";
    $xmlContent .= "    <Vigencia>{$fila['VIGENCIA']}</Vigencia>\n";
    $xmlContent .= "    <Placa>{$fila['PLACA']}</Placa>\n";
    $xmlContent .= "    <RFC>{$fila['RFC']}</RFC>\n";
    $xmlContent .= "    <NumeroSerie>{$fila['NUMSERIE']}</NumeroSerie>\n";
    $xmlContent .= "    <Modelo>{$fila['MODELO']}</Modelo>\n";
    $xmlContent .= "    <Localidad>{$fila['DIRECCION']}</Localidad>\n";
    $xmlContent .= "    <MarcaLineaSublinea>{$fila['MARCASUBLINEA']}</MarcaLineaSublinea>\n";
    $xmlContent .= "    <Operacion>{$fila['OPERACION']}</Operacion>\n";
    $xmlContent .= "    <Municipio>{$fila['MUNICIPIO']}</Municipio>\n";
    $xmlContent .= "    <PlacaAnterior>{$fila['PLACAANT']}</PlacaAnterior>\n";
    $xmlContent .= "    <NCI>{$fila['VERIFOLIO']}</NCI>\n";
    $xmlContent .= "    <Cilindraje>{$fila['CILINDRAJE']}</Cilindraje>\n";
    $xmlContent .= "    <CVVVehicular>{$fila['NUMSERIE']}</CVVVehicular>\n";
    $xmlContent .= "    <FechaExpedicion>{$fila['FECHAEXPEDICION']}</FechaExpedicion>\n";
    $xmlContent .= "    <Puertas>{$fila['PUERTAS']}</Puertas>\n";
    $xmlContent .= "    <Clase>{$fila['CLASE']}</Clase>\n";
    $xmlContent .= "    <Asientos>{$fila['ASIENTOS']}</Asientos>\n";
    $xmlContent .= "    <Tipo>{$fila['TIPO']}</Tipo>\n";
    $xmlContent .= "    <OficinaExpendidora>{$fila['CENTROVERIFICACION']}</OficinaExpendidora>\n";
    $xmlContent .= "    <Origen>{$fila['ORIGEN']}</Origen>\n";
    $xmlContent .= "    <Color>{$fila['COLOR']}</Color>\n";
    $xmlContent .= "    <Combustible>{$fila['COMBUSTBLE']}</Combustible>\n";
    $xmlContent .= "    <Transmision>{$fila['TRASNMISION']}</Transmision>\n";
    $xmlContent .= "    <Uso>{$fila['USO']}</Uso>\n";
    $xmlContent .= "    <RPA>{$fila['RPA']}</RPA>\n";
    $xmlContent .= "    <Movimiento>{$fila['MOVIMIENTO']}</Movimiento>\n";
    $xmlContent .= "    <NumeroMotor>{$fila['NOMOTOR']}</NumeroMotor>\n";
    $xmlContent .= "    <Fabricacion>HECHO EN MÉXICO</Fabricacion>\n";
    $xmlContent .= "    <FechaGeneracion>{$fechaGeneracion}</FechaGeneracion>\n";
    $xmlContent .= "</TarjetaCirculacion>";

    $xmlFileName = '../XML files/circulacion/' .'TarjetaCirculacion_' . $id . '.xml';

    // Crear la carpeta si no existe
    $carpetaXML = dirname($xmlFileName);
    if (!file_exists($carpetaXML)) {
        mkdir($carpetaXML, 0777, true);
    }

    $fileHandle = fopen($xmlFileName, 'w');

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

$tiposervicio = 'Tipo de Servicio: ' . $Fila['TIPOSERVICIO'];
$holograma = 'Holograma: ESTAMPA';
$folio = 'Folio: ' . $Fila['FOLIO'];
$vigencia = 'Vigencia: ' . $Fila['VIGENCIA'];
$placa = 'Placa: ' . $Fila['PLACA'];
$rfc = 'RFC: ' . $Fila['RFC'];
$numserie = 'Número de Serie: ' . $Fila['NUMSERIE'];
$modelo = 'Modelo: ' . $Fila['MODELO'];
$localidad = 'Localidad: ' . $Fila['DIRECCION'];
$marcalineasublinea = 'Marca/Línea/Sublínea: ' . $Fila['MARCASUBLINEA'];
$operacion = 'Operación: ' . $Fila['OPERACION'];
$municipio = 'Municipio: ' . $Fila['MUNICIPIO'];
$placaant = 'Placa Anterior: ' . $Fila['PLACAANT'];
$NCI = 'NCI: ' . $Fila['VERIFOLIO'];
$cilindraje = 'Cilindraje: ' . $Fila['CILINDRAJE'];
$cvvvehicular = 'CVV Vehicular: ' . $Fila['NUMSERIE'];
$fechaexpedicion = 'Fecha de Expedición: ' . $Fila['FECHAEXPEDICION'];
$puertas = 'Puertas: ' . $Fila['PUERTAS'];
$clase = 'Clase: ' . $Fila['CLASE'];
$asientos = 'Asientos: ' . $Fila['ASIENTOS'];
$tipo = 'Tipo: ' . $Fila['TIPO'];
$oficinaexpendidora = 'Oficina Expendidora: ' . $Fila['CENTROVERIFICACION'];
$origen = 'Origen: ' . $Fila['ORIGEN'];
$color = 'Color: ' . $Fila['COLOR'];
$combustible = 'Combustible: ' . $Fila['COMBUSTBLE'];
$transmicion = 'Transmisión: ' . $Fila['TRASNMISION'];
$uso = 'Uso: ' . $Fila['USO'];
$rpa = 'RPA: ' . $Fila['RPA'];
$movimiento = 'Movimiento: ' . $Fila['MOVIMIENTO'];
$nummotor = 'Número de Motor: ' . $Fila['NOMOTOR'];
$fabricacion = 'Fabricación: HECHO EN MÉXICO';

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
$pdf->Cell(0, 10, utf8_decode($NCI), 0, 1);

$pdf->SetXY(160, 86);
$pdf->Cell(0, 10, utf8_decode($placaant), 0, 1);

$pdf->SetXY(10, 98);
$pdf->Cell(0, 10, utf8_decode($cilindraje), 0, 1);

$pdf->SetXY(60, 98);
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

$pdf->Image('../images/F1.png', 0, 170, 234, 5);
$pdf->Image('../images/F2.png', 0, 175, 234, 35);
$pdf->Image('../images/qr.png', 232, 146, 65, 65);
$pdf->Image('../images/logoPro.jpg', 0, 0, 60, 30);
$pdf->Image('../images/banner.png', 60, 10, 300, 10);

$pdf->SetXY(60, 3);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, 'TARJETA DE CIRCULACION', 0, 1);

$pdf->Output('I', 'TarjetaCirculacion.pdf');
?>
