<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "Sesión no iniciada. Redirigiendo a login...";
    header('Location: ../../login/login.html');
    exit;
}

if ($_SESSION['user_type'] !== 'A') {
    echo "Acceso denegado. No eres administrador. Redirigiendo...";
    header('Location: ../login/no_access.html');
    exit;
}

?>