<?php
require('../../librerias/fpdf.php');
include('../../controlador/controlador.php');

$Id = $_POST['ID'];

$Con = Conectar();

$SQL = "SELECT * FROM vverficiacionesultra WHERE mamalon = '$Id';";

$ResultSet = Ejecutar($Con, $SQL);

if (!$ResultSet || mysqli_num_rows($ResultSet) == 0) {
    die('Error: No se encontraron registros para el ID proporcionado.');
}

$Fila = mysqli_fetch_assoc($ResultSet); 

if (!$Fila || !is_array($Fila)) {
    die('Error: No se encontraron registros para el ID proporcionado.');
}
if (!isset($Fila['DICTAMEN'], $Fila['MARCASUBLINEA'], $Fila['PLACA'], $Fila['NUMSERIE'], $Fila['CLASE'], $Fila['COMBUSTBLE'], $Fila['RPA'], $Fila['CILINDRAJE'], $Fila['TIPO'], $Fila['ESTADO'], $Fila['MUNICIPIO'], $Fila['ID'], $Fila['TARJETAFOLIO'], $Fila['HORAENTRADA'], $Fila['HORASALIDA'], $Fila['ORDEN'], $Fila['FOLIO'], $Fila['SEMESTRE'], $Fila['VIGENCIAVERIFICACION'], $Fila['TECNICO'])) {
    die('Error: Algunos campos requeridos no están presentes en el resultado de la consulta.');
}

Desconectar($Con);

function generarXML($Id, $Fila) {
    $fechaGeneracion = date('Y-m-d H:i:s');
    $xmlContent = "\n<VerificacionVehiculo>\n";
    $xmlContent .= "    <TipoServicio>{$Fila['DICTAMEN']}</TipoServicio>\n";
    $xmlContent .= "    <Marca>{$Fila['MARCASUBLINEA']}</Marca>\n"; // Usando solo la primera parte después de explode
    $xmlContent .= "    <Placas>{$Fila['PLACA']}</Placas>\n";
    $xmlContent .= "    <NumeroSerie>{$Fila['NUMSERIE']}</NumeroSerie>\n";
    $xmlContent .= "    <Clase>{$Fila['CLASE']}</Clase>\n";
    $xmlContent .= "    <TipoCombustible>{$Fila['COMBUSTBLE']}</TipoCombustible>\n";
    $xmlContent .= "    <NIV>{$Fila['RPA']}</NIV>\n";
    $xmlContent .= "    <NumCilindraje>{$Fila['CILINDRAJE']}</NumCilindraje>\n";
    $xmlContent .= "    <TipoCarroceria>{$Fila['TIPO']}</TipoCarroceria>\n";
    $xmlContent .= "    <EntidadFederativa>{$Fila['ESTADO']}</EntidadFederativa>\n";
    $xmlContent .= "    <Municipio>{$Fila['MUNICIPIO']}</Municipio>\n";
    $xmlContent .= "    <NoCentro>{$Fila['ID']}</NoCentro>\n";
    $xmlContent .= "    <NoLineaVerificacion>LINEA 1</NoLineaVerificacion>\n";
    $xmlContent .= "    <Tecnico>{$Fila['TECNICO']}</Tecnico>\n";
    $xmlContent .= "    <Fecha>{$fechaGeneracion}</Fecha>\n";
    $xmlContent .= "    <HoraEntrada>{$Fila['HORAENTRADA']}</HoraEntrada>\n";
    $xmlContent .= "    <HoraSalida>{$Fila['HORASALIDA']}</HoraSalida>\n";
    $xmlContent .= "    <Motivo>{$Fila['ORDEN']}</Motivo>\n";
    $xmlContent .= "    <Folio>{$Fila['FOLIO']}</Folio>\n";
    $xmlContent .= "    <Semestre>{$Fila['SEMESTRE']}</Semestre>\n";
    $xmlContent .= "    <Folio2>{$Fila['TARJETAFOLIO']}</Folio2>\n";
    $xmlContent .= "    <Vigencia>{$Fila['VIGENCIAVERIFICACION']}</Vigencia>\n";
    $xmlContent .= "</VerificacionVehiculo>";

    $xmlFileName = '../../XML files/verificacion/' . 'VerificacionVehiculo_' . $Id . '.xml';
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


$pdf = new FPDF('L', 'mm', array(279, 150));
$pdf->AddPage();

$pdf->SetXY(20, 30);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 5, 'DATOS DEL VEHICULO', 0, 1, 'L');

$pdf->SetXY(20, 35);
$pdf->SetFont('Arial', '', 10);

$pdf->Cell(100, 5, 'TIPO DE SERVICIO', 0, 0);
$pdf->SetXY(80, 35);
$pdf->Cell(0, 5, $Fila['TARJETAFOLIO'], 0, 1);

$marca = explode(" ", $Fila['MARCASUBLINEA']);

$pdf->SetXY(20, 40);
$pdf->Cell(100, 5, 'MARCA', 0, 0);
$pdf->SetXY(80, 40);
$pdf->Cell(0, 5, $marca[0], 0, 1);

$pdf->SetXY(20, 45);
$pdf->Cell(100, 5, 'SUBMARCA', 0, 0);
$pdf->SetXY(80, 45);
$pdf->Cell(0, 5, $marca[1], 0, 1);

$pdf->SetXY(20, 50);
$pdf->Cell(100, 5, 'MODELO', 0, 0);
$pdf->SetXY(80, 50);
$pdf->Cell(0, 5, $Fila['MODELO'], 0, 1);

$pdf->SetXY(20, 55);
$pdf->Cell(100, 5, 'PLACAS', 0, 0);
$pdf->SetXY(80, 55);
$pdf->Cell(0, 5, $Fila['PLACA'], 0, 1);

// Espacio entre secciones
$pdf->Ln(5);

// Segundo dato
$pdf->SetXY(160, 35);
$pdf->Cell(0, 5, 'NUMERO DE SERIE:', 0, 0);
$pdf->SetXY(210, 35);
$pdf->Cell(0, 5, $Fila['NUMSERIE'], 0, 1);
$pdf->SetXY(160, 40);
$pdf->Cell(0, 5, 'CLASE:', 0, 0);
$pdf->SetXY(210, 40);
$pdf->Cell(0, 5, $Fila['CLASE'], 0, 1);
$pdf->SetXY(160, 45);
$pdf->Cell(0, 5, 'TIPO COMBUSTIBLE:', 0, 0);
$pdf->SetXY(210, 45);
$pdf->Cell(0, 5, $Fila['COMBUSTBLE'], 0, 1);
$pdf->SetXY(160, 50);
$pdf->Cell(0, 5, 'NIV:', 0, 0);
$pdf->SetXY(210, 50);
// $pdf->Cell(0, 5, $Fila['NIV'], 0, 1);
$pdf->SetXY(160, 55);
$pdf->Cell(0, 5, 'NUM CILINDRAJE:', 0, 0);
$pdf->SetXY(210, 55);
$pdf->Cell(0, 5, $Fila['CILINDRAJE'], 0, 1);
$pdf->SetXY(160, 60);
$pdf->Cell(0, 5, 'TIPO CARROCERIA:', 0, 0);
$pdf->SetXY(210, 60);
$pdf->Cell(0, 5, $Fila['TIPO'], 0, 1);
$pdf->SetXY(160, 68);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 5, 'ENTIDAD FEDERATIVA:', 0, 0);
$pdf->SetXY(210, 68);
$pdf->Cell(0, 5, $Fila['ESTADO'], 0, 1);
$pdf->SetXY(160, 73);
$pdf->Cell(0, 5, 'MUNICIPIO:', 0, 0);
$pdf->SetXY(210, 73);
$pdf->Cell(0, 5, $Fila['MUNICIPIO'], 0, 1);

// Espacio entre secciones
$pdf->Ln(5);

// Tercer dato
$pdf->SetX(20);
$pdf->Cell(0, 5, 'NO. DEL CENTRO:', 0, 0);
$pdf->SetX(100);
$pdf->Cell(0, 5, $Fila['ORDEN'], 0, 1);
$pdf->SetFont('Arial', '', 10);
$pdf->SetX(20);
$pdf->Cell(0, 5, 'NO. DE LINEA DE VERICACION:', 0, 0);
$pdf->SetX(100);
$pdf->Cell(0, 5, 'LINEA 1', 0, 1);
$pdf->SetX(20);
$pdf->Cell(0, 5, 'TECNICO:', 0, 0);
$pdf->SetX(100);
$pdf->Cell(0, 5, $Fila['TECNICO'], 0, 1);
$pdf->SetX(20);

$fecha = date("Y-m-d");
$pdf->Cell(0, 5, 'FECHA:', 0, 0);
$pdf->SetX(100);
$pdf->Cell(0, 5, $fecha, 0, 1);
$pdf->SetX(20);
$pdf->Cell(0, 5, 'HORA ENTRADA:', 0, 0);
$pdf->SetX(100);
$pdf->Cell(0, 5, $Fila['HORAENTRADA'], 0, 1);
$pdf->SetX(20);
$pdf->Cell(0, 5, 'HORA SALIDA:', 0, 0);
$pdf->SetX(100);
$pdf->Cell(0, 5, $Fila['HORASALIDA'], 0, 1);
$pdf->SetX(20);
$pdf->Cell(0, 5, 'MOTIVO:', 0, 0);
$pdf->SetX(100);
$pdf->Cell(0, 5, $Fila['DICTAMEN'], 0, 1);
$pdf->SetX(20);
$pdf->Cell(0, 5, 'FOLIO:', 0, 0);
$pdf->SetX(100);
$pdf->Cell(0, 5, $Fila['FOLIO'], 0, 1);
$pdf->SetX(20);
$pdf->Cell(0, 5, 'SEMESTRE:', 0, 0);
$pdf->SetX(100);
$pdf->Cell(0, 5, $Fila['SEMESTRE'], 0, 1);

$pdf->SetXY(215, 90);
$pdf->Cell(0, 5, 'FOLIO:', 0, 0);
$pdf->SetXY(215, 95);
$pdf->Cell(0, 5, $Fila['ID'], 0, 1);

$pdf->SetXY(215, 100);
$pdf->Cell(0, 5, 'VIGENCIA:', 0, 0);
$pdf->SetXY(215, 105);
$pdf->Cell(0, 5, $Fila['VIGENCIA'], 0, 1);

$pdf->Image('../../images/F2.png', 10, 5, 60, 15);
$pdf->Image('../../images/letras.png', 80, 5, 140, 15);
$pdf->Image('../../images/qr.png', 170, 80, 35, 35);
$pdf->Image('../../images/barras1.png', 160, 120, 90, 15);
$pdf->Image('../../images/banner.png', 0, 140, 280, 5);
$pdf->Output('I', 'TarjetaVericacion.pdf');
?>