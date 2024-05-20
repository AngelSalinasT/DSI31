<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario de Centros de Verificación</title>
        <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    </head>
    <body>
        <div class="container">
            <h2>Subir o tomar foto</h2>

            <form id="uploadForm" enctype="multipart/form-data">
                <input type="radio" id="uploadOption" name="photoOption" value="upload" checked>
                <label for="uploadOption">Subir archivo</label><br>
                <input type="radio" id="cameraOption" name="photoOption" value="camera">
                <label for="cameraOption">Tomar foto</label><br><br>
                
                <input type="file" id="fileInput" name="fileInput"><br><br>
                
                <video id="camera" width="400" height="300" autoplay></video><br>
                <canvas id="canvas" width="400" height="300"></canvas><br>
                
                <button type="submit">Enviar</button>
            </form>
    </body>
</html>

<?php
include("../../controlador/controlador.php");

if(isset($_REQUEST['Valor'])){
    $Valor=$_REQUEST['Valor'];
    $Atributo=$_REQUEST['Atributo'];
    $Con = Conectar();
    $SQL = "SELECT * FROM centrosverificacion WHERE $Atributo='$Valor'";
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

