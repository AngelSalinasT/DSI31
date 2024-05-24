<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['foto']) && isset($_FILES['firma'])) {
        $foto = $_FILES['foto'];
        $firma = $_FILES['firma'];

        $signaturDir = 'images/firma/';
        $photosDir = 'images/fotos/';

        if (!is_dir($signaturDir)) {
            mkdir($signaturDir, 0777, true);
        }

        if (!is_dir($photosDir)) {
            mkdir($photosDir, 0777, true);
        }

        $fotoPath = $photosDir . basename($foto['name']);
        $firmaPath = $signaturDir . basename($firma['name']);

        if (move_uploaded_file($foto['tmp_name'], $fotoPath) && move_uploaded_file($firma['tmp_name'], $firmaPath)) {
            echo json_encode(['message' => 'Los archivos se subieron correctamente.']);
        } else {
            echo json_encode(['error' => 'Error al subir los archivos.']);
        }
    } else {
        echo json_encode(['error' => 'No se recibieron los archivos esperados.']);
    }
} else {
    echo json_encode(['error' => 'Método de solicitud no válido.']);
}
?>
