<!DOCTYPE html>
<html lang="es">

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <title>Generar Documento</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <h1>GENERAR DOCUMENTO</h1>
            <p>Seleccione el tipo de documento:</p>
            <input type="radio" id="licencia" name="documento" value="licencia" onclick="changeAction('generarLicencia.php')">
            <label for="licencia">Licencia</label><br>
            <input type="radio" id="verificacion" name="documento" value="verificacion" onclick="changeAction('generarTVerificacion.php')">
            <label for="verificacion">Verificación</label><br>
            <input type="radio" id="circulacion" name="documento" value="circulacion" onclick="changeAction('generarTCirculacion.php')">
            <label for="circulacion">Tarjeta de Circulación</label><br>
            <input type="radio" id="multa" name="documento" value="multa" onclick="changeAction('generarMultas.php')">
            <label for="multa">Multas</label><br>
        </form>

        </form>

        <form method="post" action="../../generar pdf/xd/generarLicencia.php" id="form-licencia" style="display: none;">
            <h1>GENERAR LICENCIA</h1>
            <label for="licenciaID">Inserte el folio: </label>
            <input type="text" name="ID" id="licenciaID">
            <button type="submit">Enviar</button>
        </form>

        <form method="post" action="../../generar pdf/xd/generarTVerificacion.php" id="form-verificacion" style="display: none;">
            <h1>GENERAR VERIFICACIÓN</h1>
            <label for="verificacionID">Inserte el folio: </label>
            <input type="text" name="ID" id="verificacionID">
            <button type="submit">Enviar</button>
        </form>

        <form method="post" action="../../generar pdf/xd/generarTCirculacion.php" id="form-circulacion" style="display: none;">
            <h1>GENERAR TARJETA DE CIRCULACIÓN</h1>
            <label for="circulacionID">Inserte el folio: </label>
            <input type="text" name="ID" id="circulacionID">
            <button type="submit">Enviar</button>
        </form>

        <form method="post" action="../../generar pdf/xd/generarMultas.php" id="form-multa" style="display: none;">
            <h1>GENERAR MULTAS</h1>
            <label for="multasID">Inserte el folio: </label>
            <input type="text" name="ID" id="multasID">
            <button type="submit">Enviar</button>
        </form>

    </div>

    <script>
        function changeAction(action) {
            document.getElementById("form-licencia").style.display = "none";
            document.getElementById("form-verificacion").style.display = "none";
            document.getElementById("form-circulacion").style.display = "none";
            document.getElementById("form-multa").style.display = "none";


            switch (action) {
                case 'generarLicencia.php':
                    document.getElementById("form-licencia").style.display = "block";
                    break;
                case 'generarTVerificacion.php':
                    document.getElementById("form-verificacion").style.display = "block";
                    break;
                case 'generarTCirculacion.php':
                    document.getElementById("form-circulacion").style.display = "block";
                    break;
                case 'generarMultas.php':
                    document.getElementById("form-multa").style.display = "block";
                    break;
            }
        }
    </script>
</body>
</html>
