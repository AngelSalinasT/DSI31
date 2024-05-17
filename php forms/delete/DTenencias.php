<?php
    //Obtener datos
    $Id = $_POST['FOLIO'];

    $SQL= "DELETE FROM TENENCIAS WHERE FOLIO = '$Id'";

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