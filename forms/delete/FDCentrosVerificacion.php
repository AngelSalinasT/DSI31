<!DOCTYPE html>
<html>

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>

<body>
    <div class="container">
        <h1>ELIMINAR CENTRO DE VERIFICACIÓN</h1>
        </p>
        <form method="post" action="../../php forms/delete/DCentrosVerificacion.php">
            <label>Inserte el Id del Centro de Verificacion: </label>
            <input type="number" name="ID" id="ID">
            <input type="submit">
        </form>
    </div>
</body>

</html>