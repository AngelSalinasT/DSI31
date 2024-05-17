<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
</head>
<h1>Verificaciones</h1> 
    <form action="CVerificaciones.php">
    <label>Valor</label>
    <input type="text" name="Valor" id="Valor">
    <br>
    <label>Atributo</label>
    <input type="radio" name="Atributo" id="Atributo" value="FOLIO" checked>FOLIO
    <input type="radio" name="Atributo" id="Atributo" value="FECHA">FECHA
    <input type="radio" name="Atributo" id="Atributo" value="DICTAMEN">DICTAMEN
    <input type="radio" name="Atributo" id="Atributo" value="TECNICO">TECNICO
    <input type="radio" name="Atributo" id="Atributo" value="HORAENTRADA">HORAENTRADA
    <input type="radio" name="Atributo" id="Atributo" value="HORASALIDA">HORASALIDA
    <input type="radio" name="Atributo" id="Atributo" value="FOLIOPRUEBA">FOLIOPRUEBA
    <input type="radio" name="Atributo" id="Atributo" value="VIGENCIA">VIGENCIA
    <input type="radio" name="Atributo" id="Atributo" value="SEMESTRE">SEMESTRE
    <input type="radio" name="Atributo" id="Atributo" value="TIPO">TIPO
    <input type="radio" name="Atributo" id="Atributo" value="CENTROVERIFICACION">CENTROVERIFICACION
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
    $SQL = "SELECT * FROM verificaciones WHERE $Atributo='$Valor'";
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
