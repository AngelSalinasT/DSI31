<?php

$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];

$base_path = '/DSI31/';
$allowed_file = $base_path . 'login/login.html';
$allowed_directories = [$base_path . 'registro', $base_path . 'css'];

// Redirigir a login.html si se accede directamente al directorio
if ($request_uri === $base_path || $request_uri === rtrim($base_path, '/')) {
    header('Location: ' . $allowed_file);
    exit();
}

// Permitir el acceso a login.html
if ($request_uri === $allowed_file) {
    readfile(__DIR__ . '/login/login.html');
    exit();
}

// Permitir el acceso a los archivos en directorios permitidos
foreach ($allowed_directories as $dir) {
    if (strpos($request_uri, $dir) === 0) {
        // Obtener la ruta del archivo solicitada
        $file_path = __DIR__ . str_replace($base_path, '', $request_uri);

        // Verificar si el archivo existe y es accesible
        if (file_exists($file_path) && is_file($file_path)) {
            readfile($file_path);
            exit();
        } else {
            http_response_code(404);
            echo "404 Not Found";
            exit();
        }
    }
}

// Bloquear acceso a cualquier otro archivo
http_response_code(403);
echo "403 Forbidden";
exit();
?>
