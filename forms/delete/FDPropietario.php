<!DOCTYPE html>
<html lang="en">

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Propietario</title>
    <!-- Enlace a tu archivo de estilos -->
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <!-- Div de clase container para mantener el contenido centrado y con márgenes -->
    <div class="container">
        <form method="post" action="../../php forms/delete/DPropietarios.php">
            <!-- Encabezado principal -->
            <h1>ELIMINAR PROPIETARIO</h1>
            <!-- Etiqueta y campo de entrada para el ID del propietario -->
            <label for="ID">Inserte el Id del Propietario:</label>
            <input type="number" name="ID" id="ID">
            <!-- Botón de envío del formulario -->
            <button type="submit">Eliminar</button>
        </form>
    </div>
</body>
</html>
