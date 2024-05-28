<!DOCTYPE html>
<html>

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <title>Formulario de Propietarios</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Propietarios</h1>
        <form method="get" action="../../php forms/add/IPropietarios.php">
            <label for="NOMBRE">Nombre</label>
            <input type="text" id="NOMBRE" name="NOMBRE" class="input-field">
            <br>
            <label for="APELLIDOS">Apellidos</label>
            <input type="text" id="APELLIDOS" name="APELLIDOS" class="input-field">
            <br>
            <label for="TELEFONO">Telefono</label>
            <input type="number" id="TELEFONO" name="TELEFONO" class="input-field">
            <br>
            <label for="CORREO">Correo</label>
            <input type="email" id="CORREO" name="CORREO" class="input-field">
            <br>
            <label for="CURP">CURP</label>
            <input type="text" id="CURP" name="CURP" class="input-field">
            <br>
            <label for="RFC">RFC</label>
            <input type="text" id="RFC" name="RFC" class="input-field">
            <br>
            <label for="Id DIRECCION">Direccion</label>
            <input type="number" id="DIRECCION" name="DIRECCION" class="input-field">
            <br>
            <br>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
