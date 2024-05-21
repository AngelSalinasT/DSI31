<?php
include("../controlador/controlador.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['username'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo'];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $Con = Conectar();
    $SQL = "INSERT INTO cuentas (userName, password, hash, tipo, status, bloqueo, intentos) VALUES ('$usuario', '$password', '$hash', '$tipo', 1, 0, 0)";
    $Resultado = Ejecutar($Con, $SQL);

    if ($Resultado) {
        $filename = "hash_$usuario.cer";
        file_put_contents($filename, $hash);
        
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filename).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        
        unlink($filename);

        exit(); 
    } else {
        echo "Error en el registro: " . mysqli_error($Con);
    }
    
    Desconectar($Con);
} else {
    echo "Método de solicitud no permitido.";
}
?>
