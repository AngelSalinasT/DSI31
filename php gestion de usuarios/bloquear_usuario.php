<?php
include("../controlador/controlador.php");

$usuario = $_POST['username']; 

$Con = Conectar();

$SQL = "UPDATE cuentas SET bloqueo=1 WHERE userName='$usuario'";
Ejecutar($Con, $SQL);

echo "Usuario $usuario bloqueado.";

Desconectar($Con);
?>
