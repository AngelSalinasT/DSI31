<!DOCTYPE html>
<html>

<?php
    include("../../login/validar_A.php");
?>

    <head>
        <meta charset="UTF-8">
        <title>Formulario de Direcciones</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    </head>
    <body>
        <div class="container">
            <h1>Formulario de Verificaciones</h1>
            <form method="post" action="../../php forms/add/IVerificaciones.php">
                <label>Fecha:</label>
                <input type="date" id="FECHA" name="FECHA"><br>

                <label>Dictamen:</label>
                <input type="text" id="DICTAMEN" name="DICTAMEN"><br>

                <label>Técnico:</label>
                <input type="text" id="TECNICO" name="TECNICO"><br>

                <label>Hora de Entrada:</label>
                <input type="time" id="HORAENTRADA" name="HORAENTRADA"><br>

                <label>Hora de Salida:</label>
                <input type="time" id="HORASALIDA" name="HORASALIDA"><br>

                <label>Folio de Prueba:</label>
                <input type="number" id="FOLIOPRUEBA" name="FOLIOPRUEBA"><br>

                <label>Vigencia:</label>
                <input type="text" id="VIGENCIA" name="VIGENCIA"><br>

                <label>Semestre:</label>
                <input type="number" id="SEMESTRE" name="SEMESTRE"><br>

                <label>Tipo:</label>
                <input type="text" id="TIPO" name="TIPO"><br>

                <label>Id Centros de Verificación:</label>
                <input type="number" id="CENTTROSVERIFICACION" name="CENTTROSVERIFICACION"><br>

                <label>Folio Tarjeta de Circulación:</label>
                <input type="text" id="TARJETACIRCULACION" name="TARJETACIRCULACION">
                <br>
                <br>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </body>
</html>