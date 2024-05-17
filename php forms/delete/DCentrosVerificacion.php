<?php
    //Obtener datos
    $IdPropietario = $_POST['ID'];

    $SQL= "DELETE FROM CENTROSVERIFICACION WHERE ID = '$IdPropietario'";

    include("../../controlador/controlador.php");
    $Con = Conectar();
    $ResultSet = Ejecutar($Con,$SQL);
    Desconectar($Con);

    if($ResultSet){
        print("REGISTRO ELIMINADO");
    } else {
        print("REGISTRO NO ELIMINADO");
    }
?>