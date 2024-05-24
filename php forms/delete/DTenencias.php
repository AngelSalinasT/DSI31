<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['FOLIO'])) {
    $Id = $_POST['FOLIO'];

    include("../../controlador/controlador.php");

    try {
        $Con = Conectar();

        // Verificar si el ID existe antes de intentar eliminarlo
        $checkSQL = "SELECT * FROM TENENCIAS WHERE FOLIO = '$Id'";
        $checkResult = Ejecutar($Con, $checkSQL);

        if (mysqli_num_rows($checkResult) > 0) {
            $SQL = "DELETE FROM TENENCIAS WHERE FOLIO = '$Id'";
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
        echo "ERROR: No se puede eliminar el registro debido a restricciones de clave foránea.";
    }
} else {
    echo "ERROR: No se proporcionó el FOLIO.";
}
?>
