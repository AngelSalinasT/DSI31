<?php
include("controlador.php");

$usuario = $_POST['username']; 

$Con = Conectar();

$SQL = "UPDATE cuentas SET bloqueo=0 WHERE userName='$usuario'";
$SQL2 = "UPDATE cuentas SET intentos=0 WHERE userName='$usuario'";
Ejecutar($Con, $SQL2);
Ejecutar($Con, $SQL);

echo "Usuario $usuario desbloqueado.";

Desconectar($Con);
?>
