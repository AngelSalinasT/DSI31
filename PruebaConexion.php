<?php
    include("controlador.php");

    $SQL = "INSERT INTO OFICIALES VALUES('','1', '1', '1', '1')";
    $Result = mysqli_query($Con, $SQL);

    $Con = Conectar();
    $ResultSet = Ejecutar($Con,$SQL);//mysql_queri devuelce 0 o 1 o error
    
    if ($ResultSet) {
        print("Registro insertado");
        Desconectar($Con);
    } else {
        print("Error");
    }
?>
