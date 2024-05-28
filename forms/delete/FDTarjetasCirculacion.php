<!DOCTYPE html>
<html lang="en">

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Dirección</title>
    <!-- Enlace a tu archivo de estilos -->
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <!-- Div de clase container para mantener el contenido centrado y con márgenes -->
    <div class="container">
        <form method="post" action="../../php forms/delete/DTarjetasCirculacion.php">
            <!-- Encabezado principal -->
            <h1>ELIMINAR TARJETA DE CIRCULACIÓN</h1>
            <!-- Etiqueta y campo de entrada para el folio de la tarjeta -->
            <label for="ID">Inserte el folio de la Tarjeta:</label>
            <input type="text" name="ID" id="ID">
            <!-- Botón de envío del formulario -->
            <button type="submit">Eliminar</button>
        </form>
    </div>
</body>
</html>
