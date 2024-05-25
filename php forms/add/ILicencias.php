<?php
include("../../controlador/controlador.php");
include('../../login/validar.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Datos recibidos del formulario
    $numeroLicencia = $_POST['NOLICENCIA'];
    $tipo = $_POST['TIPO'];
    $fechaExpedicion = $_POST['FECHAEXPEDICION'];
    $vigencia = $_POST['VIGENCIA'];
    $antiguedad = $_POST['ANTIGUEDAD'];
    $conductor = $_POST['CONDUCTOR'];
    $restricciones = $_POST['RESTRICCIONES'];

    // Verificación de la firma y la foto
    try {
        if (!isset($_FILES['foto']) || !isset($_FILES['firma'])) {
            throw new Exception('No se recibieron los archivos esperados.');
        }

        // Rutas de los directorios para guardar las fotos y firmas
        $signatureDir = '../../images/firma/';
        $photosDir = '../../images/fotos/';

        // Crea los directorios si no existen
        if (!is_dir($signatureDir) && !mkdir($signatureDir, 0777, true)) {
            throw new Exception('No se pudo crear el directorio de firma.');
        }

        if (!is_dir($photosDir) && !mkdir($photosDir, 0777, true)) {
            throw new Exception('No se pudo crear el directorio de fotos.');
        }

        // Genera nombres únicos para la foto y la firma
        $fotoName = uniqid('foto_', true) . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $firmaName = uniqid('firma_', true) . '.' . pathinfo($_FILES['firma']['name'], PATHINFO_EXTENSION);

        // Define las rutas completas para guardar los archivos
        $fotoPath = $photosDir . $fotoName;
        $firmaPath = $signatureDir . $firmaName;

        // Prepara la consulta SQL para insertar los datos en la base de datos
        $SQL = "INSERT INTO licencias (NOLICENCIA, TIPO, FECHAEXPEDICION, VIGENCIA, ANTIGUEDAD, CONDUCTOR, RESTRICCIONES, firma, foto) 
            VALUES ('$numeroLicencia', '$tipo', '$fechaExpedicion', '$vigencia', '$antiguedad', '$conductor', '$restricciones', '$firmaPath', '$fotoPath')";

        // Ejecuta la consulta SQL
        $Con = Conectar();
        $ResultSet = Ejecutar($Con, $SQL);

        // Verifica si la consulta fue exitosa
        if ($ResultSet) {
            // Mueve los archivos subidos a los directorios correspondientes
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath) && move_uploaded_file($_FILES['firma']['tmp_name'], $firmaPath)) {
                // Si los archivos se mueven correctamente, devuelve un mensaje de éxito
                echo json_encode(['message' => 'Los archivos se subieron correctamente y el registro se insertó.', 'fotoPath' => $fotoPath, 'firmaPath' => $firmaPath]);
            } else {
                // Si ocurre un error al mover los archivos, lanza una excepción
                throw new Exception('Error al subir los archivos.');
            }
        } else {
            // Si la consulta falla, lanza una excepción
            throw new Exception('Error al insertar el registro en la base de datos.');
        }

        // Desconecta la base de datos
        Desconectar($Con);
    } catch (Exception $e) {
        // Captura cualquier excepción y devuelve un mensaje de error
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    // Si la solicitud no es de tipo POST, devuelve un mensaje de error
    echo json_encode(["success" => false, "message" => "Método de solicitud no permitido"]);
}
?>
