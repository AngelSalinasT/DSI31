<?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $IdPropietario = $_POST['ID'];

            include("../../controlador/controlador.php");

            try {
                $Con = Conectar();
                $checkSQL = "SELECT * FROM CENTROSVERIFICACION WHERE ID = '$IdPropietario'";
                $checkResult = Ejecutar($Con, $checkSQL);

                if (mysqli_num_rows($checkResult) > 0) {
                
                    $SQL = "DELETE FROM CENTROSVERIFICACION WHERE ID = '$IdPropietario'";
                    $ResultSet = Ejecutar($Con, $SQL);

                    if ($ResultSet) {
                        echo "<p style='color: green;'>REGISTRO ELIMINADO</p>";
                    } else {
                        echo "<p style='color: red;'>ERROR AL ELIMINAR EL REGISTRO</p>";
                    }
                } else {
                  
                    echo "<p style='color: red;'>NO SE ENCONTRÓ EL REGISTRO CON EL ID PROPORCIONADO</p>";
                }

                Desconectar($Con);
            } catch (mysqli_sql_exception $e) {
                echo "<p style='color: red;'>ERROR: No se puede eliminar el registro debido a restricciones de clave foránea.</p>";
            }
        }
        ?>