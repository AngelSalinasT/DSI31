<!DOCTYPE html>
<html>

<?php
    include("../../login/validar_A.php");
?>

    <head>
        <meta charset="UTF-8">
        <title>Formulario de Tarjetas de Circulación</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    </head>
    <body>
        <div class="container">
            <h1>Formulario de Tarjetas de Circulación</h1>
            <form method="get" action="../../php forms/add/ITarjetasCirculacion.php">
                <label>Folio:</label>
                <input type="text" id="FOLIO" name="FOLIO"><br>
                
                <label>Vigencia:</label>
                <input type="date" id="VIGENCIA" name="VIGENCIA"><br>
                
                <label>Fecha de Expedición:</label>
                <input type="date" id="FECHAEXPEDICION" name="FECHAEXPEDICION"><br>
                
                <label>Movimiento:</label>
                <input type="text" id="MOVIMIENTO" name="MOVIMIENTO"><br>
                
                <label>Tipo de Servicio:</label>
                <input type="text" id="TIPOSERVICIO" name="TIPOSERVICIO"><br>
                
                <label>Folio Vehículo:</label>
                <input type="text" id="VEHICULO" name="VEHICULO"><br>
                
                <label>Propietario:</label>
                <input type="text" id="PROPIETARIO" name="PROPIETARIO"><br>
                
                <label>Operación:</label>
                <input type="text" id="OPERACION" name="OPERACION"><br>
                
                <label>Origen:</label>
                <input type="text" id="ORIGEN" name="ORIGEN"><br>

                <label>Número de motor:</label>
                <input type="number" id="NOMOTOR" name="NOMOTOR"><br>
                
                <br>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </body>
</html>
