<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Licencias</h1> 
        <form action="CLicencias.php">
        <label>Valor</label>
        <input type="text" name="Valor" id="Valor">
        <br>
        <label>Atributo</label>
        <input type="radio" name="Atributo" id="Atributo" value="NOLICENCIA" checked>NOLICENCIA
        <input type="radio" name="Atributo" id="Atributo" value="TIPO">TIPO
        <input type="radio" name="Atributo" id="Atributo" value="FECHAEXPEDICION">FECHAEXPEDICION
        <input type="radio" name="Atributo" id="Atributo" value="VIGENCIA">VIGENCIA
        <input type="radio" name="Atributo" id="Atributo" value="ANTIGUEDAD">ANTIGUEDAD
        <input type="radio" name="Atributo" id="Atributo" value="CONDUCTOR">CONDUCTOR
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
    $SQL = "SELECT * FROM licencias WHERE $Atributo='$Valor'";
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
