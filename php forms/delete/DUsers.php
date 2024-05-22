<?php
    $userName = $_POST['userName'];

    $SQL = "DELETE FROM cuentas WHERE userName = '$userName'";

    include("../../controlador/controlador.php");
    $Con = Conectar();
    $ResultSet = Ejecutar($Con, $SQL);
    Desconectar($Con);

    if($ResultSet){
        echo "USUARIO ELIMINADO";
    } else {
        echo "USUARIO NO ELIMINADO";
    }
?>
