<!DOCTYPE html>
<html>

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <title>Formulario de Direcciones</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>ELIMINAR DIRECCIÓN</h1>
        <form method="post" action="../../php forms/delete/IDirecciones.php">
            <label>ID:</label>
            <input type="text" id="ID" name="ID"><br>
            <br>
            <br>
            <button type="submit">Eliminar</button>
        </form>
    </div>
</body>
</html>
