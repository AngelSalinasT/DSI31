<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" type="text/css" href="../../css/stylelogin.css">
</head>

    <body>
        <div class="container">
            <h1>Ofciales</h1> 
            <form action="COficiales.php">
            <label>Valor</label>
            <input type="text" name="Valor" id="Valor">
            <br>
            <label>Atributo</label>
            <input type="radio" name="Atributo" id="Atributo" value="ID" checked>ID
            <input type="radio" name="Atributo" id="Atributo" value="NOMBRE">NOMBRE
            <input type="radio" name="Atributo" id="Atributo" value="APELLIDOS">APELLIDOS
            <input type="radio" name="Atributo" id="Atributo" value="FIRMA">FIRMA
            <input type="radio" name="Atributo" id="Atributo" value="REGION">REGION
            <br><br>
            <button type="submit">Enviar</button>
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
    $SQL = "SELECT * FROM oficiales WHERE $Atributo='$Valor'";
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
