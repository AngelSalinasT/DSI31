<?php
require('../librerias/fpdf.php');
include('../controlador/controlador.php');
$Id = $_POST['ID'];

$Con = Conectar();

$SQL = "SELECT * FROM vdatoslicencia WHERE noLicencia = '$Id';";

$ResultSet = Ejecutar($Con,$SQL);

$Fila = mysqli_fetch_row($ResultSet);

$SQLD = "SELECT * FROM vdirecciones WHERE  id = '$Fila[7]';";

$ResultSet2 = Ejecutar($Con,$SQLD);


$FilaD = mysqli_fetch_row($ResultSet2);

Desconectar($Con);

// jaja si se guardo mi cambio xxddxdxdx

function generarXML($id, $fila, $filaD) {
    $fechaGeneracion = date('Y-m-d H:i:s');

    $xmlContent = "\n<Licencia>\n";
    $xmlContent .= "    <NoLicencia>{$fila[0]}</NoLicencia>\n";
    $xmlContent .= "    <Nombre>{$fila[1]}</Nombre>\n";
    $xmlContent .= "    <Apellidos>{$fila[2]}</Apellidos>\n";
    $xmlContent .= "    <FechaNacimiento>{$fila[3]}</FechaNacimiento>\n";
    $xmlContent .= "    <FechaExpedicion>{$fila[4]}</FechaExpedicion>\n";
    $xmlContent .= "    <ValidaHasta>{$fila[5]}</ValidaHasta>\n";
    $xmlContent .= "    <Antiguedad>{$fila[6]}</Antiguedad>\n";
    $xmlContent .= "    <Direccion>{$filaD[1]} {$filaD[2]} {$filaD[3]} {$filaD[5]} {$filaD[4]}</Direccion>\n";
    $xmlContent .= "    <TipoSangre>{$fila[8]}</TipoSangre>\n";
    $xmlContent .= "    <DonadorOrganos>{$fila[9]}</DonadorOrganos>\n";
    $xmlContent .= "    <NumeroEmergencias>{$fila[10]}</NumeroEmergencias>\n";
    $xmlContent .= "    <Tipo>{$fila[12]}</Tipo>\n";
    $xmlContent .= "    <Restricciones>{$fila[11]}</Restricciones>\n";
    $xmlContent .= "    <FechaGeneracion>{$fechaGeneracion}</FechaGeneracion>\n";
    $xmlContent .= "</Licencia>";

    $xmlFileName = '../XML files/licencia/' .'Licencia_' . $id . '.xml';
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
    $xmlFileName = generarXML($Id, $Fila, $FilaD);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}

$pdf = new FPDF('P', 'mm', array(54, 90));
$pdf->AddPage();

$pdf->Image("../images/pieCredencial.png", 2, 0, 40, 10);

$pdf->SetXY(16, 23); 
$pdf->SetFont('Arial', 'I', 4);
$pdf->Cell(0, 5, 'No. de Licencia:', 0, 0);
$pdf->SetXY(11, 25); 
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(0, 5, $Fila[0], 0, 1);

$pdf->SetXY(8, 27); 
$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(0, 5, 'CHOFER PARTICULAR', 0, 1);

$pdf->Image("../images/messi.jpg", 29, 11, 22, 30);


$pdf->SetXY(44, 40); 
$pdf->SetFont('Arial', 'I', 4);
$pdf->Cell(0, 5, 'Nombre:', 0, 1);
$pdf->SetXY(47, 42); 
$pdf->SetFont('Arial', 'B', 5.5);

$apellidos = explode(" ", $Fila[2]);
$pdf->Cell(0, 5, $apellidos[0], 0, 0,'C');
$pdf->SetXY(47, 44); 
$pdf->Cell(0, 5, $apellidos[1], 0, 0,'C');
$pdf->SetXY(47, 46); 
$pdf->Cell(0, 5, $Fila[1], 0, 0,'C');

$pdf->SetXY(1, 48); 
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(0, 5, 'Fecha de Nacimiento:', 0, 1);
$pdf->SetXY(1, 50); 
$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(0, 5, $Fila[3], 0, 1);

$pdf->SetXY(1, 52); 
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(0, 5, 'Fecha de Expedicion:', 0, 1);
$pdf->SetXY(1, 54); 
$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(0, 5, $Fila[4], 0, 1);

$pdf->SetXY(1, 56); 
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(0, 5, 'Valida hasta:', 0, 1);
$pdf->SetXY(1, 58); 
$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(0, 5, $Fila[5]);

$pdf->SetXY(1, 60); 
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(0, 5, 'Antiguedad:', 0, 1);
$pdf->SetXY(1, 62); 
$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(0, 5, $Fila[6], 0, 1);

$pdf->SetXY(8, 64); 
$pdf->SetFont('Arial', 'I', 4);
$pdf->Cell(0, 5, 'Firma:', 0, 1);

$pdf->Image("../images/Firma_de_Lionel_Messi.png",6,68,6,6);
//$pdf->Cell(0, 5, $Fila[12], 0, 1);
$pdf->Image("../images/Autorizo.png",4,75,14,6);

$pdf->SetXY(38, 60); 
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(0, 5, 'Tipo :', 0, 1);

$pdf->SetXY(45, 60); 
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(0, 5, $Fila[12], 0, 1);

$pdf->SetXY(38, 50); 
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(0, 5, 'Restricciones:', 0, 1);

$pdf->SetXY(30, 52); 
$pdf->SetFont('Arial', 'B', 4);
$pdf->Cell(0, 5, $Fila[11], 0, 1);

$pdf->Image("../images/banner.png",0,84,54,3);

$pdf->AddPage();

$pdf->Image("../images/qr.png", 4, 6, 20, 20);

$pdf->Image("../images/911.jpg", 30, 1, 10, 8);

$pdf->Image("../images/089.jpg", 39, 1, 10, 8);

$pdf->SetXY(40, 9); 
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(0, 5, 'Domicilio:', 0, 1);
$pdf->SetXY(25, 11); 
$pdf->SetFont('Arial', 'B', 4);
$pdf->Cell(0, 5, $FilaD[1], 0, 1);
$pdf->SetXY(46, 11); 
$pdf->SetFont('Arial', 'B', 4);
$pdf->Cell(0, 5, $FilaD[2], 0, 1);
$pdf->SetXY(25, 13); 
$pdf->SetFont('Arial', 'B', 4);
$pdf->Cell(0, 5, $FilaD[3], 0, 1);
$pdf->SetXY(42, 13); 
$pdf->SetFont('Arial', 'B', 4);
$pdf->Cell(0, 5, 'C.P. ', 0, 1);
$pdf->SetXY(46, 13); 
$pdf->SetFont('Arial', 'B', 4);
$pdf->Cell(0, 5, $FilaD[5], 0, 1);
$pdf->SetXY(35, 15); 
$pdf->SetFont('Arial', 'B', 4);
$pdf->Cell(0, 5, $FilaD[4], 0, 1,'C');

$pdf->SetXY(35, 35); 
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(15, 5, 'Tipo de Sangre', 0, 1,'R');
$pdf->SetXY(35, 37); 
$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(15, 5, $Fila[8], 0, 1,'R');

$pdf->SetXY(35, 39); 
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(15, 5, 'Donador de organos', 0, 1,'R');
$pdf->SetXY(35, 41); 
$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(15, 5, $Fila[9], 0, 1,'R');

$pdf->SetXY(35, 43); 
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(15, 5, 'Numero de emergrencias', 0, 1,'R');
$pdf->SetXY(35, 45); 
$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(15, 5, $Fila[10], 0, 1,'R');

$pdf->SetXY(3, 25); 
$pdf->SetFont('Arial', '', 4);
$pdf->Cell(0, 5, 'Observaciones', 0, 1,'L');
$pdf->SetXY(3, 27); 
$pdf->SetFont('Arial', '', 4);
$pdf->Cell(0, 5, '', 0, 1,'L');

$pdf->Image("../images/leyes.png",4,58,45,7);

$pdf->Image("../images/secre.png",8,70,40,9);

$pdf->Image("../images/banner.png",0,84,54,3);

$pdf->Output('I', 'Licencia.pdf');
?>
