<!DOCTYPE html>
<html lang="en">

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <form method="post" action="../../php gestion de usuarios/generar_usuario.php" class="register-form">
            <h1>Registro</h1>
            <div class="form-group">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de Cuenta:</label>
                <select name="tipo" id="tipo" required>
                    <option value="U">Usuario</option>
                </select>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
