<?php
$SQL= "SELECT * FROM PROPIETARIOS";

include("../../controlador/controlador.php");
$Con = Conectar();
$ResultSet = Ejecutar($Con,$SQL);

print ("<table border='1'>");
echo ("<tr><th>ID</th><th>NOMBRE</th><th>APELLIDOS</th><th>CURP</th><th>TELEFONO</th><th>CORREO</th><th>RFC</th><th>DIRECCION</th></tr>");

while ($fila = mysqli_fetch_row($ResultSet)) {
    print ("<tr>");
    foreach ($fila as $valor) {
        print("<td>$valor</td>");
    }
    print ("</tr>");
}

print ("</table>");

Desconectar($Con);
?>
