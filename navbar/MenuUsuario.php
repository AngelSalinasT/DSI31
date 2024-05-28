<!DOCTYPE html>
<html lang="es">

<?php
    include("../login/validar_U.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Usuarios</title>
    <link rel="stylesheet" type="text/css" href="../css/stylemunu.css">
    <style>
        iframe {
            width: 100%;
            height: 500px;
            border: none;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="#" class="brand">DSI 31</a>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li class="dropdown">
                <a href="#">Consultas</a>
                <ul class="dropdown-content">
                    <li><a href="#" onclick="loadPage('../php forms/search/CCentrosVerificacion.php')">Centros
                            Verificación</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CConductores.php')">Conductores</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CDirecciones.php')">Direcciones</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CLicencias.php')">Licencias</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CMultas.php')">Multas</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/COficiales.php')">Oficiales</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CPropietarios.php')">Propietarios</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CTarjetasCirculacion.php')">Tarjetas de
                            Circulación</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CTenencias.php')">Tenencias</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CVehiculos.php')">Vehiculos</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CVerificaciones.php')">Verificaciones</a>
                    </li>
                </ul>
            </li>
        </ul>
        <a href="../login/logout.php" class="logout">Logout</a>
    </nav>

    <iframe id="contentFrame" src="" frameborder="0"></iframe>

    <script>
        function loadPage(url) {
            var iframe = document.getElementById('contentFrame');
            iframe.src = url;
            return false; // Para prevenir la recarga de la página
        }
    </script>

</body>

</html>