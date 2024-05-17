<?php
include("controlador.php");

$usuario = $_POST['username']; 

$Con = Conectar();

$SQL = "UPDATE cuentas SET status=1 WHERE userName='$usuario'";

Ejecutar($Con, $SQL);

echo "Usuario $usuario activado.";

Desconectar($Con);
?>
