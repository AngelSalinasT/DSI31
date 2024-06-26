<!DOCTYPE html>
<html>

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <title>Formulario de Licencias</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Licencias</h1>
        <form id="licenciaForm" method="POST" enctype="multipart/form-data" action="../../php forms/add/IMultas.php" >
            <fieldset>
                <legend>Información de la Licencia</legend>
                <label for="NOLICENCIA">Número de Licencia:</label>
                <input type="text" id="NOLICENCIA" name="NOLICENCIA" required><br>

                <label for="TIPO">Tipo:</label>
                <select id="TIPO" name="TIPO" required> 
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select><br>

                <label for="FECHAEXPEDICION">Fecha de Expedición:</label>
                <input type="date" id="FECHAEXPEDICION" name="FECHAEXPEDICION" required><br>

                <label for="VIGENCIA">Años de Vigencia:</label>
                <select id="VIGENCIA" name="VIGENCIA" required>
                    <option value="3">3</option>
                    <option value="5">5</option>
                </select><br>

                <label for="ANTIGUEDAD">Antigüedad:</label>
                <input type="number" id="ANTIGUEDAD" name="ANTIGUEDAD" required><br>

                <label for="CONDUCTOR">ID del Conductor:</label>
                <input type="text" id="CONDUCTOR" name="CONDUCTOR" required><br>

                <label for="RESTRICCIONES">Restricciones:</label>
                <input type="text" id="RESTRICCIONES" name="RESTRICCIONES" required><br>
            </fieldset>

            <fieldset>
                <legend>Fotografía</legend>
                <div id="seccion-foto">
                    <video id="video" width="300" height="200" autoplay></video>
                    <br> 
                    <img id="preview" class="hidden" alt="Vista previa de la foto">
                    <canvas id="canvas" class="hidden" width="300" height="200"></canvas>
                    <br>
                    <button id="takePhotoButton" type="button">Tomar foto</button>
                    <button id="retakePhotoButton" type="button">Volver a tomar</button>
                </div>
            </fieldset>

            <fieldset>
                <legend>Firma</legend>
                <div id="seccion-firma">
                    <canvas id="signature-pad" width="300" height="200" required></canvas>
                    <button id="clearSignature" type="button">Limpiar firma</button>
                </div>
            </fieldset>

            <br>
            <button id="submit">Enviar</button>
        </form>
        <div id="message"></div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script src="../../js/scriptFirmaWebcam.js"></script>
</body>
</html>
