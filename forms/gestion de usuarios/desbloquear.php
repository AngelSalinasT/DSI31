<!DOCTYPE html>
<html lang="es">

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desbloquear Usuario</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de usuarios</h1>
        <form action="../../php gestion de usuarios/desbloquar_usuario.php" method="post">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>
            <button type="submit">Desbloquear</button>
        </form>
    </div>
</body>
</html>

