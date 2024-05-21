<?php
include("../controlador/controlador.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['username'];
    $password = $_POST['password'];
    
    if (isset($_FILES['hashfile']) && $_FILES['hashfile']['error'] == 0) {
        $file_tmp_path = $_FILES['hashfile']['tmp_name'];
        $hash = file_get_contents($file_tmp_path);
        
        $Con = Conectar();
        $SQL = "SELECT * FROM cuentas WHERE userName='$usuario'";
        $ResultSet = Ejecutar($Con, $SQL);
        
        if (mysqli_num_rows($ResultSet) > 0) {
            $Fila = mysqli_fetch_assoc($ResultSet);
            
            if (trim($password) == $Fila['password'] && trim($hash) == $Fila['hash']) {
                $intentos = 0;
                $SQL_update = "UPDATE cuentas SET intentos=$intentos WHERE userName='$usuario'";
                Ejecutar($Con, $SQL_update);
                if ($Fila['status'] == 1) {
                    if ($Fila['bloqueo'] == 0) {
                        if ($Fila['tipo'] == "U") {
                            header("Location: ../navbar/MenuUsuario.html");
                        } else {
                            header("Location: ../navbar/MenuAdmin.html");
                        }
                    } else {
                        echo "Cuenta BLOQUEADA";
                    }
                } else {
                    echo "Cuenta NO Activa";
                }
            } else {
                $intentos = $Fila['intentos'] + 1;
                $SQL_update = "UPDATE cuentas SET intentos=$intentos WHERE userName='$usuario'";
                Ejecutar($Con, $SQL_update);

                if ($intentos >= 4) {
                    $SQL_bloquear = "UPDATE cuentas SET bloqueo=1 WHERE userName='$usuario'";
                    Ejecutar($Con, $SQL_bloquear);
                    echo "La cuenta ha sido bloqueada debido a múltiples intentos fallidos.";
                } else {
                    echo "Contraseña o hash incorrecto. Intentos: $intentos";
                }
            }
        } else {
            echo "Nombre de usuario o contraseña incorrectos.";
        }
        
        Desconectar($Con);
    } else {
        echo "Error al subir el archivo de hash.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
