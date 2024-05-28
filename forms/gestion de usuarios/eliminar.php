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
        <h1>ELIMINAR USUARIO</h1>
        <form method="post" action="../../php forms/delete/DUsers.php">
            <label>Inserte el Nombre de Usuario: </label>
            <input type="text" name="userName" id="userName">
            <button type="submit">Eliminar</button>
        </form>
    </div>
</body>

</html>S