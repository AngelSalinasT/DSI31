<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userName'])) {
    $userName = $_POST['userName'];

    include("../../controlador/controlador.php");

    try {
        $Con = Conectar();

        // Utilizar una consulta preparada para evitar la inyección SQL
        $SQL = "DELETE FROM cuentas WHERE userName = ?";
        $stmt = mysqli_prepare($Con, $SQL);
        mysqli_stmt_bind_param($stmt, "s", $userName);
        mysqli_stmt_execute($stmt);

        $rowsAffected = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);

        if ($rowsAffected > 0) {
            echo "USUARIO ELIMINADO";
        } else {
            echo "USUARIO NO ENCONTRADO O NO ELIMINADO";
        }

        Desconectar($Con);
    } catch (mysqli_sql_exception $e) {
        echo "ERROR: No se pudo completar la operación.";
    }
} else {
    echo "ERROR: No se proporcionó el nombre de usuario.";
}
?>
