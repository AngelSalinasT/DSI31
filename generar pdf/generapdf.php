<?php
require('../librerias/fpdf.php');

$pdf = new FPDF('P','mm','A4');//genera un objeto qye apunta a lac alse fpdf se denomna como un CONSTUCTOR
//se pueden poner atribulos, como es el caslo de un string que determina la otientatcion, puede ser P o Portrait(normal) / L para orizontal
//tambueb se pueden agregar las unidades de mediad pt = punto, mm = milimetro, cm = centimetro, in = pulgada
//el ultimo parametro, es el tamaño, puede ser el A3,A5,A4,Letter, Legal
//para un tamaño personalizaod es $pdf = newPDF('P','cm','A5')
$pdf->AddPage('P','A4',0);//se agrega un addpage, agrega una nueva pagina a un documento y tiene yn conjunto de parametros, tambien tiene los de orientacion
//el d epor defecto es el del constructor anterior
//se puede ajsutar la rotacuin, permite que cambiar el angulo a la hora de rotar 
$pdf->SetFont('Arial','B',30);//define el tipo de fuente
//acepra familia, Arial, time new roma, etc
//acetsa si es bold, italica, underline
//acepta el tamaño, y todo es obligartorio menos la familia de a fuente
$pdf->Cell(40,10,'¡Hola, Mundo!',1,1,'C');//todo lo que vy a escribir en el documento
//primer parametro, el ancho, el alto, la cadena d e texto, el bodrde 1,0, el saltp de linea 1,2,0, la siposicion (centrar, a la derecha, izquierda, C,R,L)
$pdf->SetXY(80,80);
$pdf->SetFont('Arial','B',30);//define el tipo de fuente
//acepra familia, Arial, time new roma, etc
//acetsa si es bold, italica, underline
//acepta el tamaño, y todo es obligartorio menos la familia de a fuente
//$pdf->Cell(40,10,'¡Hola, Mundo!',1);//todo lo que vy a escribir en el documento
//primer parametro, el ancho, el alto, la cadena d e texto, el bodrde, el saltp de linea

$pdf->Output('F');//tienen dos parametrs, la I lo abre en nelm navegaro, la D lo descarga, y la F lo guarda en el fichero local, solo que la S lo guarda en forma de cadena, despies se puede poner el nombre

?>