<!DOCTYPE html>
<html lang="es">

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <title>Formulario de Oficiales</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>

<body>

    <div class="container">
        <h1>Formulario de Oficiales</h1>
        <form method="get" action="../../php forms/add/IOficiales.php">
            <label for="NOMBRE">Nombre:</label>
            <input type="text" id="NOMBRE" name="NOMBRE"><br>

            <label for="APELLIDOS">Apellidos:</label>
            <input type="text" id="APELLIDOS" name="APELLIDOS"><br>

            <label for="FIRMA">Firma:</label>
            <input type="file" id="FIRMA" name="FIRMA"><br>

            <br>

            <label for="REGION">Región:</label>
            <input type="text" id="REGION" name="REGION">
            <br>
            <br>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>
