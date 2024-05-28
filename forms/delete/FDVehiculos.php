<!DOCTYPE html>
<html>

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <title>Eliminar Vehiculo</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>ELIMINAR VEHÍCULO</h1>
        <form method="post" action="../../php forms/delete/DVehiculos.php">
            <label for="NUMSERIE">Inserte el número de Vehículo:</label>
            <input type="text" id="NUMSERIE" name="NUMSERIE"><br>
            <br>
            <br>
            <button type="submit">Eliminar</button>
        </form>
    </div>
</body>
</html>
