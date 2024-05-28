<!DOCTYPE html>
<html lang="es">

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Direcciones</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Formulario de Direcciones</h1>
        <form method="post" action="IDirecciones.php">
            <div class="form-group">
                <label for="CALLE">Calle:</label>
                <input type="text" class="form-control" id="CALLE" name="CALLE" required>
            </div>

            <div class="form-group">
                <label for="NUMERO">Número:</label>
                <input type="text" class="form-control" id="NUMERO" name="NUMERO" required>
            </div>

            <div class="form-group">
                <label for="COLONIA">Colonia:</label>
                <input type="text" class="form-control" id="COLONIA" name="COLONIA" required>
            </div>

            <div class="form-group">
                <label for="MUNICIPIO">Municipio:</label>
                <input type="text" class="form-control" id="MUNICIPIO" name="MUNICIPIO" required>
            </div>

            <div class="form-group">
                <label for="CODIGOPOSTAL">Código Postal:</label>
                <input type="number" class="form-control" id="CODIGOPOSTAL" name="CODIGOPOSTAL" required>
            </div>

            <div class="form-group">
                <label for="ESTADO">Estado:</label>
                <input type="text" class="form-control" id="ESTADO" name="ESTADO" required>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
