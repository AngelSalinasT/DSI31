<!DOCTYPE html>
<html lang="en">

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Dirección</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <form method="post" action="../../php forms/delete/DDirecciones.php">
            <h1>ELIMINAR DIRECCIÓN</h1>
            <label for="ID">Inserte el Id de la Dirección:</label>
            <input type="number" name="ID" id="ID">
            <button type="submit">Eliminar</button>
        </form>
    </div>
</body>
</html>
