<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Vehículos</h1> 
        <form action="CVehiculos.php">
            <label>Valor</label>
            <input type="text" name="Valor" id="Valor">
            <br>
            <label>Atributo</label>
            <input type="radio" name="Atributo" id="Atributo" value="NUMSERIE" checked>NUMSERIE
            <input type="radio" name="Atributo" id="Atributo" value="CILINDRAJE">CILINDRAJE
            <input type="radio" name="Atributo" id="Atributo" value="CAPACIDAD">CAPACIDAD
            <input type="radio" name="Atributo" id="Atributo" value="PUERTAS">PUERTAS
            <input type="radio" name="Atributo" id="Atributo" value="ASIENTOS">ASIENTOS
            <input type="radio" name="Atributo" id="Atributo" value="COMBUSTBLE">COMBUSTBLE
            <input type="radio" name="Atributo" id="Atributo" value="TRASNMISION">TRASNMISION
            <input type="radio" name="Atributo" id="Atributo" value="CLASE">CLASE
            <input type="radio" name="Atributo" id="Atributo" value="TIPO">TIPO
            <input type="radio" name="Atributo" id="Atributo" value="USO">USO
            <input type="radio" name="Atributo" id="Atributo" value="RPA">RPA
            <input type="radio" name="Atributo" id="Atributo" value="MODELO">MODELO
            <input type="radio" name="Atributo" id="Atributo" value="FOLIO">FOLIO
            <input type="radio" name="Atributo" id="Atributo" value="PLACAANT">PLACAANT
            <input type="radio" name="Atributo" id="Atributo" value="MARCASUBLINEA">MARCASUBLINEA
            <input type="radio" name="Atributo" id="Atributo" value="PLACA">PLACA
            <input type="radio" name="Atributo" id="Atributo" value="ORDEN">ORDEN
            <input type="radio" name="Atributo" id="Atributo" value="COLOR">COLOR
            <br><br>
            <input type="submit" value="Evaluar">    <button type="submit" value="Evaluar">Buscar</button>    
        </form>
    </div>
</body>
</html>

<?php
include("../../controlador/controlador.php");

if(isset($_REQUEST['Valor'])){
    $Valor=$_REQUEST['Valor'];
    $Atributo=$_REQUEST['Atributo'];
    $Con = Conectar();
    $SQL = "SELECT * FROM vehiculos WHERE $Atributo='$Valor'";
    $ResultSet = Ejecutar($Con, $SQL);
    $n = mysqli_num_rows($ResultSet);
    $automatic = mysqli_num_fields($ResultSet);
    print("Se ha encontrado el siguiente numero de resultados: ".$n."<br><br>");

    print("<table border='1'>");
    print("<tr>");
    while ($field_info = mysqli_fetch_field($ResultSet)) {
        print("<th>" . $field_info->name . "</th>");
    }
    print("</tr>");

    while ($Fila = mysqli_fetch_row($ResultSet)) {
        print("<tr>");
        for ($j = 0; $j < $automatic; $j++) {
            print("<td>" . $Fila[$j] . "</td>");
        }
        print("</tr>");
    }
    print("</table>");

    Desconectar($Con);
}
?>

