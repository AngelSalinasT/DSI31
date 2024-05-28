<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IdPropietario = $_POST['ID'];

    include("../../controlador/controlador.php");

    try {
        $Con = Conectar();

        // Verificar si existe el registro con el ID proporcionado
        $checkSQL = "SELECT * FROM centrosverificacion WHERE ID = '$IdPropietario'";
        $checkResult = Ejecutar($Con, $checkSQL);

        if (mysqli_num_rows($checkResult) > 0) {
            // Eliminar el registro si existe
            $SQL = "DELETE FROM centrosverificacion WHERE ID = '$IdPropietario'";
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
