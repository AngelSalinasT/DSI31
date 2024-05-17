<?php
    //Obtener datos
    $Id = $_POST['ID'];

    $SQL= "DELETE FROM TARJETASCIRCULACION WHERE FOLIO = '$Id'";

    include("controlador.php");
    $Con = Conectar();
    $ResultSet = Ejecutar($Con,$SQL);
    Desconectar($Con);

    if($ResultSet){
        print("REGISTRO ELIMINADO");
    } else {
        print("REGISTRO NO ELIMINADO");
    }
?>