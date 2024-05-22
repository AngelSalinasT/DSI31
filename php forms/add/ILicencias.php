<?php
include("../../controlador/controlador.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numeroLicencia = $_POST['NOLICENCIA'];
    $tipoLicencia = $_POST['TIPO'];
    $fechaExpedicion = $_POST['FECHAEXPEDICION'];
    $vigencia = $_POST['VIGENCIA'];
    $antiguedad = $_POST['ANTIGUEDAD'];
    $idConductor = $_POST['CONDUCTOR'];
    $restricciones = $_POST['RESTRICCIONES'];

    // Handle signature
    $signatureData = $_POST['signature'];
    $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
    $signatureData = str_replace(' ', '+', $signatureData);
    $signatureDecoded = base64_decode($signatureData);
    $signatureFileName = 'signatures/' . uniqid() . '.png';
    file_put_contents($signatureFileName, $signatureDecoded);

    // Handle photo
    if (isset($_FILES['file']) && $_FILES['file']['size'] > 0) {
        $photoFileName = 'uploads/' . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $photoFileName);
    } else {
        $photoData = $_POST['photo'];
        $photoData = str_replace('data:image/png;base64,', '', $photoData);
        $photoData = str_replace(' ', '+', $photoData);
        $photoDecoded = base64_decode($photoData);
        $photoFileName = 'uploads/' . uniqid() . '.png';
        file_put_contents($photoFileName, $photoDecoded);
    }

    // Display the received data
    print("Número de Licencia: $numeroLicencia <br>");
    print("Tipo: $tipoLicencia <br>");
    print("Fecha de Expedición: $fechaExpedicion <br>");
    print("Vigencia: $vigencia <br>");
    print("Antigüedad: $antiguedad <br>");
    print("ID del Conductor: $idConductor <br>");
    print("Restricciones: $restricciones <br>");
    print("Firma: $signatureFileName <br>");
    print("Foto: $photoFileName <br>");

    // Prepare SQL query
    $SQL = "INSERT INTO licencias (noLicencia, tipo, fechaExpedicion, vigencia, antiguedad, conductor, restricciones, firma, foto) VALUES ('$numeroLicencia', '$tipoLicencia', '$fechaExpedicion', '$vigencia', '$antiguedad', '$idConductor', '$restricciones', '$signatureFileName', '$photoFileName');";
    print($SQL);

    // Execute the query
    $Con = Conectar();
    $ResultSet = Ejecutar($Con, $SQL);

    if ($ResultSet) {
        print("Registro insertado");
        Desconectar($Con);
    } else {
        print("Error");
    }
} else {
    echo json_encode(["success" => false, "message" => "Método de solicitud no permitido"]);
}
?>
