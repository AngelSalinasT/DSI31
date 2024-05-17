<?php
    //Obtener datos
    $Id = $_POST['NUMSERIE'];

    $SQL= "DELETE FROM VEHICULOS WHERE NUMSERIE = '$Id'";

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