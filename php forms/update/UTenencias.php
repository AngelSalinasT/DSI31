<!DOCTYPE html>
<html>
<head>
    <title>Editar Tenencia</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Editar Tenencia</h1>
    <form method="post">
        <label for="folio">Folio</label>
        <input type="text" id="folio" name="folio">
        <input type="submit" value="Buscar">
    </form>

<?php
    include("../../controlador/controlador.php");
    if(isset($_POST['folio'])){
        $folio = $_POST['folio'];
        $Con =  Conectar();
        $SQL = "SELECT * FROM TENENCIAS WHERE FOLIO = '$folio';";
        $ResultSet = Ejecutar($Con,$SQL);
        $Fila = mysqli_fetch_assoc($ResultSet);
        if($Fila){
            ?>
                <form method="post">
                    <label for="captura_pago">Captura de Pago</label>
                    <input type="text" id="captura_pago" name="captura_pago" value="<?php echo $Fila['CAPTURAPAGO']; ?>">
                    <label for="fecha_limite">Fecha Límite</label>
                    <input type="date" id="fecha_limite" name="fecha_limite" value="<?php echo $Fila['FECHALIMITE']; ?>">
                    <label for="importe">Importe</label>
                    <input type="text" id="importe" name="importe" value="<?php echo $Fila['IMPORTE']; ?>">
                    <label for="tipo_pago">Tipo de Pago</label>
                    <input type="text" id="tipo_pago" name="tipo_pago" value="<?php echo $Fila['TIPOPAGO']; ?>">
                    <label for="fecha_actual">Fecha Actual</label>
                    <input type="date" id="fecha_actual" name="fecha_actual" value="<?php echo $Fila['FECHAACTUAL']; ?>">
                    <label for="hora">Hora</label>
                    <input type="time" id="hora" name="hora" value="<?php echo $Fila['HORA']; ?>">
                    <label for="linea_captura">Línea de Captura</label>
                    <input type="text" id="linea_captura" name="linea_captura" value="<?php echo $Fila['LINEACAPTURA']; ?>">
                    <label for="tarjeta_circulacion">Tarjeta de Circulación</label>
                    <input type="text" id="tarjeta_circulacion" name="tarjeta_circulacion" value="<?php echo $Fila['TARJETACIRCULACION']; ?>">
                    <input type="hidden" id="folio" name="folio" value="<?php echo $folio; ?>">
                    <input type="submit" value="Actualizar">
                </form>
            <?php
        } else {
            echo "No se encontró ninguna tenencia con ese folio.";
        }
        Desconectar($Con);
    }
    if(isset($_POST['captura_pago'])){
        $folio = $_POST['folio'];
        $captura_pago = $_POST['captura_pago'];
        $fecha_limite = $_POST['fecha_limite'];
        $importe = $_POST['importe'];
        $tipo_pago = $_POST['tipo_pago'];
        $fecha_actual = $_POST['fecha_actual'];
        $hora = $_POST['hora'];
        $linea_captura = $_POST['linea_captura'];
        $tarjeta_circulacion = $_POST['tarjeta_circulacion'];
        $Con =  Conectar();
        $SQL = "UPDATE TENENCIAS SET CAPTURAPAGO='$captura_pago', FECHALIMITE='$fecha_limite', IMPORTE='$importe', TIPOPAGO='$tipo_pago', FECHAACTUAL='$fecha_actual', HORA='$hora', LINEACAPTURA='$linea_captura', TARJETACIRCULACION='$tarjeta_circulacion' WHERE FOLIO='$folio';";
        $ResultSet = Ejecutar($Con,$SQL);
        desconectar($Con);
        header("Location:UTenencias.php");
    }
?>
</div>

</body>
</html>
