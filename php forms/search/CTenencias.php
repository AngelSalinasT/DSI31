<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
</head>
<h1>Tenencias</h1> 
    <form action="CTenencias.php">
    <label>Valor</label>
    <input type="text" name="Valor" id="Valor">
    <br>
    <label>Atributo</label>
    <input type="radio" name="Atributo" id="Atributo" value="FOLIO" checked>FOLIO
    <input type="radio" name="Atributo" id="Atributo" value="CAPTURAPAGO">CAPTURAPAGO
    <input type="radio" name="Atributo" id="Atributo" value="FECHALIMITE">FECHALIMITE
    <input type="radio" name="Atributo" id="Atributo" value="IMPORTE">IMPORTE
    <input type="radio" name="Atributo" id="Atributo" value="TIPOPAGO">TIPOPAGO
    <input type="radio" name="Atributo" id="Atributo" value="FECHAACTUAL">FECHAACTUAL
    <input type="radio" name="Atributo" id="Atributo" value="HORA">HORA
    <input type="radio" name="Atributo" id="Atributo" value="LINEACAPTURA">LINEACAPTURA
    <input type="radio" name="Atributo" id="Atributo" value="TARJETACIRCULACION">TARJETACIRCULACION
    <br><br>
    <input type="submit" value="Evaluar">
    </form>
</html>

<?php
include("../../controlador/controlador.php");

if(isset($_REQUEST['Valor'])){
    $Valor=$_REQUEST['Valor'];
    $Atributo=$_REQUEST['Atributo'];
    $Con = Conectar();
    $SQL = "SELECT * FROM tenencias WHERE $Atributo='$Valor'";
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
