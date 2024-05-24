<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Id = $_POST['ID'];

    include("../../controlador/controlador.php");

    try {
        $Con = Conectar();

        // Verificar si el ID existe antes de intentar eliminarlo
        $checkSQL = "SELECT * FROM TARJETASCIRCULACION WHERE FOLIO = '$Id'";
        $checkResult = Ejecutar($Con, $checkSQL);

        if (mysqli_num_rows($checkResult) > 0) {
            $SQL = "DELETE FROM TARJETASCIRCULACION WHERE FOLIO = '$Id'";
            $ResultSet = Ejecutar($Con, $SQL);

            if ($ResultSet) {
                echo "REGISTRO ELIMINADO";
            } else {
                echo "ERROR AL ELIMINAR EL REGISTRO";
            }
        } else {
            echo "NO SE ENCONTRÓ EL REGISTRO CON EL ID PROPORCIONADO";
        }

        Desconectar($Con);
    } catch (mysqli_sql_exception $e) {
        echo "ERROR: No se puede eliminar el registro debido a restricciones de clave foránea.";
    }
}
?>
