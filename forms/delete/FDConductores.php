<!DOCTYPE html>
<html lang="en">
<head>

    <?php
    include("../../login/validar_A.php");
?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Conductor</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <form method="post" action="../../php forms/delete/DConductores.php">
            <h1>ELIMINAR CONDUCTOR</h1>
            <label for="ID">Inserte el Id del Conductor:</label>
            <input type="number" name="ID" id="ID">
            <button type="submit">Eliminar</button>
        </form>
    </div>
</body>
</html>
