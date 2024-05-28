<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['NUMSERIE'])) {
    $Id = $_POST['NUMSERIE'];

    include("../../controlador/controlador.php");

    $Con = Conectar();

    $checkSQL = "SELECT * FROM vehiculos WHERE NUMSERIE = '$Id'";
    $checkResult = Ejecutar($Con, $checkSQL);

    if (mysqli_num_rows($checkResult) > 0) {
        $SQL = "DELETE FROM vehiculos WHERE NUMSERIE = '$Id'";
        $ResultSet = Ejecutar($Con, $SQL);

        if ($ResultSet) {
            echo "REGISTRO ELIMINADO";
        } else {
            echo "ERROR AL ELIMINAR EL REGISTRO";
        }
    } else {
        echo "NO SE ENCONTRÓ EL REGISTRO CON EL NUMERO DE SERIE PROPORCIONADO";
    }

    Desconectar($Con);
} else {
    echo "ERROR: No se proporcionó el número de serie.";
}
?>
