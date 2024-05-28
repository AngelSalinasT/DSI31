<!DOCTYPE html>
<html lang="es">

<?php
    include("../login/validar_A.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Administradores</title>
    <link rel="stylesheet" type="text/css" href="../css/stylemunu.css">
    <style>
        iframe {
            width: 100%;
            height: 950px;
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
                <a href="#">Insertar</a>
                <ul class="dropdown-content">
                    <li><a href="#" onclick="loadPage('../forms/add/FCentrosVerificacion.php')">Centros Verificación</a></li>
                    <li><a href="#" onclick="loadPage('../forms/add/FConductores.php')">Conductores</a></li>
                    <li><a href="#" onclick="loadPage('../forms/add/FDirecciones.php')">Direcciones</a></li>
                    <li><a href="#" onclick="loadPage('../forms/add/FLicencias.php')">Licencias</a></li>
                    <li><a href="#" onclick="loadPage('../forms/add/FMultas.php')">Multas</a></li>
                    <li><a href="#" onclick="loadPage('../forms/add/FOficiales.php')">Oficiales</a></li>
                    <li><a href="#" onclick="loadPage('../forms/add/FPropietarios.php')">Propietarios</a></li>
                    <li><a href="#" onclick="loadPage('../forms/add/FTarjetasCirculacion.php')">Tarjetas de Circulación</a></li>
                    <li><a href="#" onclick="loadPage('../forms/add/FTenencias.php')">Tenencias</a></li>
                    <li><a href="#" onclick="loadPage('../forms/add/FVehiculos.php')">Vehiculos</a></li>
                    <li><a href="#" onclick="loadPage('../forms/add/FVerificaciones.php')">Verificaciones</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Eliminar</a>
                <ul class="dropdown-content">
                    <li><a href="#" onclick="loadPage('../forms/delete/FDCentrosVerificacion.php')">Centros
                            Verificación</a></li>
                    <li><a href="#" onclick="loadPage('../forms/delete/FDConductores.php')">Conductores</a></li>
                    <li><a href="#" onclick="loadPage('../forms/delete/FDDirecciones.php')">Direcciones</a></li>
                    <li><a href="#" onclick="loadPage('../forms/delete/FDLicencias.php')">Licencias</a></li>
                    <li><a href="#" onclick="loadPage('../forms/delete/FDMultas.php')">Multas</a></li>
                    <li><a href="#" onclick="loadPage('../forms/delete/FDOficiales.php')">Oficiales</a></li>
                    <li><a href="#" onclick="loadPage('../forms/delete/FDPropietarios.php')">Propietarios</a></li>
                    <li><a href="#" onclick="loadPage('../forms/delete/FDTarjetasCirculacion.php')">Tarjetas de
                            Circulación</a></li>
                    <li><a href="#" onclick="loadPage('../forms/delete/FDTenencias.php')">Tenencias</a></li>
                    <li><a href="#" onclick="loadPage('../forms/delete/FDVehiculos.php')">Vehiculos</a></li>
                    <li><a href="#" onclick="loadPage('../forms/delete/FDVerificaciones.php')">Verificaciones</a></li>
                    <li><a href="#" onclick="loadPage('../forms/gestion de usuarios/eliminar.php')">Gestión de
                            usuarios</a></li>
                </ul>
            </li>
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
                    <li><a href="#" onclick="loadPage('../php forms/search/CPropietario.php')">Propietarios</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CTarjetasCirculacion.php')">Tarjetas de
                            Circulación</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CTenencias.php')">Tenencias</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CVehiculos.php')">Vehiculos</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/search/CVerificaciones.php')">Verificaciones</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Actualizar</a>
                <ul class="dropdown-content">
                    <li><a href="#" onclick="loadPage('../php forms/update/UCentrosVerificacion.php')">Centros
                            Verificación</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/update/UConductores.php')">Conductores</a></li>
                    <li><a href="../php forms/update/UDirecciones.php">Direcciones</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/update/ULicencias.php')">Licencias</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/update/UMultas.php')">Multas</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/update/UOficiales.php')">Oficiales</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/update/UPropietarios.php')">Propietarios</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/update/UTarjetaCirculacion.php')">Tarjetas de
                            Circulación</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/update/UTenencias.php')">Tenencias</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/update/UVehiculos.php')">Vehiculos</a></li>
                    <li><a href="#" onclick="loadPage('../php forms/update/UVerificaciones.php')">Verificaciones</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#">Gestión de usuarios</a>
                <ul class="dropdown-content">
                    <li><a href="#" onclick="loadPage('../forms/gestion de usuarios/registro.php')">Registrar Usuario</a></li>                    
                    <li><a href="#" onclick="loadPage('../forms/gestion de usuarios/activar.php')">Activar cuenta</a></li>
                    <li><a href="#" onclick="loadPage('../forms/gestion de usuarios/desactivar.php')">Desactivar cuenta</a></li>
                    <li><a href="#" onclick="loadPage('../forms/gestion de usuarios/bloquear.php')">Bloquear cuenta</a></li>
                    <li><a href="#" onclick="loadPage('../forms/gestion de usuarios/desbloquear.php')">Desbloquear cuenta</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" onclick="loadPage('../forms/generar/FGenerarDocs.php')">Generar PDFs</a>
            </li>
        </ul>
        <a href="../login/logout.php" class="logout">Logout</a>
    </nav>


    <iframe id="contentFrame" src="" frameborder="0"></iframe>

    <script>
        function loadPage(link) {
            var iframe = document.getElementById('contentFrame');
            iframe.src = link;
            return false; // Para prevenir la recarga de la página
        }
    </script>

</body>

</html>