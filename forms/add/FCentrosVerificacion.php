<!DOCTYPE html>
<html>

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <title>Formulario de los Centros de Verificación</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de los Centros de Verificación</h1>
        <form method="post" action="../../php forms/add/ICentrosVerificacion.php">
            <label>ID del Centro de Verificación:</label>
            <input type="number" id="ID" name="ID">
            <br>
            <label>Razón Social:</label>
            <input type="text" id="RAZONSOCIAL" name="RAZONSOCIAL">
            <br>
            <label>ID Dirección:</label>
            <input type="number" id="DIRECCION" name="DIRECCION">
            <br>
            <label>Teléfono:</label>
            <input type="number" id="TELEFONO" name="TELEFONO">
            <br>
            <br>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
