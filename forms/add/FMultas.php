<!DOCTYPE html>
<html>

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <title>Formulario de Multas</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Multas</h1>
        <form method="get" action="../../php forms/add/IMultas.php">
            <label>Fecha:</label>
            <input type="date" id="FECHA" name="FECHA"><br>
            
            <label>Reporte de Sección:</label>
            <input type="text" id="REPORTESECCION" name="REPORTESECCION"><br>
            
            <label>Fundamento:</label>
            <input type="text" id="FUNDAMENTO" name="FUNDAMENTO"><br>
            
            <label>Motivo:</label>
            <input type="text" id="MOTIVO" name="MOTIVO"><br>
            
            <label>Garantía Retenida:</label>
            <input type="text" id="GARANTIARETENIDA" name="GARANTIARETENIDA"><br>
            
            <label>No. Parte Accidente:</label>
            <input type="text" id="NOPARTEACCIDENTE" name="NOPARTEACCIDENTE"><br>
            
            <label>Convenio:</label>
            <input type="text" id="CONVENIO" name="CONVENIO"><br>
            
            <label>Puesto a Disposición:</label>
            <input type="text" id="PUESTODISPOSICION" name="PUESTODISPOSICION"><br>
            
            <label>Depósito Oficial:</label>
            <input type="number" id="DEPOSITOOFICIAL" name="DEPOSITOOFICIAL"><br>
            
            <label>Observaciones Operativo:</label>
            <input type="text" id="OBSERVAOPERATICO" name="OBSERVAOPERATICO"><br>
            
            <label>Observaciones Conductor:</label>
            <input type="text" id="OBSERVACONDUCTOR" name="OBSERVACONDUCTOR"><br>
            
            <label>Calificación de la Boleta:</label>
            <input type="text" id="CALIFICACIONBOLETA" name="CALIFICACIONBOLETA"><br>
            
            <label>No. Licencia:</label>
            <input type="text" id="NOLICENCIA" name="NOLICENCIA"><br>
            
            <label>Id Oficiales:</label>
            <input type="number" id="OFICIALES" name="OFICIALES"><br>
            
            <label>Folio de la Tarjeta de Circulación:</label>
            <input type="text" id="TARJETACIRCULACION" name="TARJETACIRCULACION"><br>
            
            <label>Vía:</label>
            <input type="text" id="VIA" name="VIA"><br>
            
            <label>Kilómetro:</label>
            <input type="number" id="KILOMETRO" name="KILOMETRO"><br>
            
            <label>Carretera:</label>
            <input type="text" id="CARRETERA" name="CARRETERA"><br>
            
            <label>Velocímetro:</label>
            <input type="text" id="VELOCIMETRO" name="VELOCIMETRO"><br>
            
            <label>Hora:</label>
            <input type="time" id="HORA" name="HORA"><br>
            
            <br>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
