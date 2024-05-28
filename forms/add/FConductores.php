<!DOCTYPE html>
<html>

<?php
    include("../../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <title>Formulario de Conductores</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Conductores</h1>
        <form method="get" action="../../php forms/add/IConductores.php">
            <label>Nombre:</label>
            <input type="text" id="NOMBRE" name="NOMBRE"><br>
            
            <label>Apellidos:</label>
            <input type="text" id="APELLIDOS" name="APELLIDOS"><br>
            
            <label>CURP:</label>
            <input type="text" id="CURP" name="CURP"><br>
            
            <label>Teléfono:</label>
            <input type="number" id="TELEFONO" name="TELEFONO"><br>
            
            <label>Correo:</label>
            <input type="email" id="CORREO" name="CORREO"><br>
            
            <label>RFC:</label>
            <input type="text" id="RFC" name="RFC"><br>
            
            <label for="TIPOSANGRE">Tipo de Sangre:</label>
            <select id="TIPOSANGRE" name="TIPOSANGRE">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select><br>

            <label for="DONADORACTIVO">Donador Activo:</label>
            <select id="DONADORACTIVO" name="DONADORACTIVO">
                <option value="1">Si</option>
                <option value="0">No</option>
            </select><br>
                    
            <label>Número de Emergencia:</label>
            <input type="number" id="NUMEMER" name="NUMEMER"><br>
            
            <label>Id Dirección:</label>
            <input type="number" id="DIRECCION" name="DIRECCION"><br>
            
            <label>Fecha de nacimiento:</label>
            <input type="date" id="fechan" name="fechan"><br>

            <label>Firma:</label>
            <input type="file" id="firma" name="firma"><br>



            <br>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
