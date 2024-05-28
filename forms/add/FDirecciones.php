<!DOCTYPE html>
<html lang="es">

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Direcciones</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Direcciones</h1>
        <form method="post" action="../../php forms/add/IDirecciones.php">
            <label for="CALLE">Calle:</label>
            <input type="text" id="CALLE" name="CALLE" required><br>
            
            <label for="NUMERO">Número:</label>
            <input type="text" id="NUMERO" name="NUMERO" required><br>
            
            <label for="COLONIA">Colonia:</label>
            <input type="text" id="COLONIA" name="COLONIA" required><br>
            
            <label for="MUNICIPIO">Municipio:</label>
            <input type="text" id="MUNICIPIO" name="MUNICIPIO" required><br>
            
            <label for="CODIGOPOSTAL">Código Postal:</label>
            <input type="number" id="CODIGOPOSTAL" name="CODIGOPOSTAL" required><br>
            
            <label for="ESTADO">Estado:</label>
            <input type="text" id="ESTADO" name="ESTADO" required><br>
            
            <br>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
