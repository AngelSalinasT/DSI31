<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['FOLIO'])) {
    $Id = $_POST['FOLIO'];

    include("../../controlador/controlador.php");

    try {
        $Con = Conectar();

        $checkSQL = "SELECT * FROM VERIFICACIONES WHERE FOLIO = '$Id'";
        $checkResult = Ejecutar($Con, $checkSQL);

        if (mysqli_num_rows($checkResult) > 0) {
            $SQL = "DELETE FROM VERIFICACIONES WHERE FOLIO = '$Id'";
            $ResultSet = Ejecutar($Con, $SQL);

            if ($ResultSet) {
                echo "REGISTRO ELIMINADO";
            } else {
                echo "ERROR AL ELIMINAR EL REGISTRO";
            }
        } else {
            echo "NO SE ENCONTRÓ EL REGISTRO CON EL FOLIO PROPORCIONADO";
        }

        Desconectar($Con);
    } catch (mysqli_sql_exception $e) {
        echo "ERROR: No se pudo completar la operación.";
    }
} else {
    echo "ERROR: No se proporcionó el FOLIO.";
}
?>
