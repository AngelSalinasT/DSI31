<!DOCTYPE html>
<html>

<?php
    include("../../login/validar_A.php");
?>

    <head>
        <meta charset="UTF-8">
        <title>Formulario de Tenencias</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    </head>
    <body>
        <div class="container">
            <h1>Formulario de Tenencias</h1>
            <form method="post" action="../../php forms/add/ITenencias.php">
                <label>Folio:</label>
                <input type="text" id="FOLIO" name="FOLIO"><br>
                
                <label>Captura de Pago:</label>
                <input type="text" id="CAPTURAPAGO" name="CAPTURAPAGO"><br>
                
                <label>Fecha Límite:</label>
                <input type="date" id="FECHALIMITE" name="FECHALIMITE"><br>
                
                <label>Importe:</label>
                <input type="number" id="IMPORTE" name="IMPORTE"><br>
                
                <label for="TIPOPAGO">Tipo de Pago:</label>
                <select id="TIPOPAGO" name="TIPOPAGO">
                  <option value="Efectivo">Efectivo</option>
                  <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                  <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                  <option value="Otro">Otro</option>
                </select><br>
                
                <label>Fecha Actual:</label>
                <input type="date" id="FECHAACTUAL" name="FECHAACTUAL"><br>
                
                <label>Hora:</label>
                <input type="time" id="HORA" name="HORA"><br>
                
                <label>Línea de Captura:</label>
                <input type="text" id="LINEACAPTURA" name="LINEACAPTURA"><br>
                
                <label>Folio Tarjeta de Circulación:</label>
                <input type="text" id="TARJETACIRCULACION" name="TARJETACIRCULACION">
                <br>
                <br>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </body>
</html>