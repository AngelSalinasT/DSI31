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
            <h1>Formulario de Vehiculos</h1>
            <form method="post" action="../../php forms/add/IVehiculos.php">
                <label>Número de Serie:</label>
                <input type="text" id="NUMSERIE" name="NUMSERIE"><br>
                
                <label>Cilindraje:</label>
                <input type="number" id="CILINDRAJE" name="CILINDRAJE"><br>
                
                <label>Capacidad:</label>
                <input type="number" id="CAPACIDAD" name="CAPACIDAD"><br>
                
                <label>Puertas:</label>
                <input type="number" id="PUERTAS" name="PUERTAS"><br>
                
                <label>Asientos:</label>
                <input type="number" id="ASIENTOS" name="ASIENTOS"><br>
                
                <label>Combustible:</label>
                <input type="text" id="COMBUSTBLE" name="COMBUSTBLE"><br>
                
                <label>Transmisión:</label>
                <input type="number" id="TRASNMISION" name="TRASNMISION"><br>
                
                <label>Clase:</label>
                <input type="text" id="CLASE" name="CLASE"><br>
                
                <label>Tipo:</label>
                <input type="number" id="TIPO" name="TIPO"><br>
                
                <label>Uso:</label>
                <input type="number" id="USO" name="USO"><br>
                
                <label>RPA:</label>
                <input type="number" id="RPA" name="RPA"><br>
                
                <label>Modelo:</label>
                <input type="number" id="MODELO" name="MODELO"><br>
                
                <label>Folio:</label>
                <input type="number" id="FOLIO" name="FOLIO"><br>
                
                <label>Placa Anterior:</label>
                <input type="text" id="PLACAANT" name="PLACAANT"><br>
                
                <label>Marca y Sublínea:</label>
                <input type="text" id="MARCASUBLINEA" name="MARCASUBLINEA"><br>
                
                <label>Placa:</label>
                <input type="text" id="PLACA" name="PLACA"><br>
                
                <label>Orden:</label>
                <input type="text" id="ORDEN" name="ORDEN"><br>
                
                <label>Color:</label>
                <input type="text" id="COLOR" name="COLOR"><br>      
                <br>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </body>
</html>