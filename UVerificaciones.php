<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
    <link rel="stylesheet" href="updateEstilo.css">
</head>
<body>

<div class="container">
    <form method="post">
        <label for="id">Folio</label>
        <input type="text" id="id" name="id">
        <input type="submit">
    </form>
<?php
    include("controlador.php");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $Con =  Conectar();
        $SQL = "SELECT * FROM verificaciones WHERE FOLIO = '$id';";
        $ResultSet = Ejecutar($Con,$SQL);
        $Fila = mysqli_fetch_row($ResultSet);
        
        if(!$Fila) {
            echo "<p>No se encontró un registro con el folio $id</p>";
        } else {
            ?>
            <form method="post">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha" value="<?php echo $Fila[1]; ?>">
                <label for="dictamen">Dictamen</label>
                <input type="text" id="dictamen" name="dictamen" value="<?php echo $Fila[2]; ?>">
                <label for="tecnico">Técnico</label>
                <input type="text" id="tecnico" name="tecnico" value="<?php echo $Fila[3]; ?>">
                <label for="horaentrada">Hora Entrada</label>
                <input type="time" id="horaentrada" name="horaentrada" value="<?php echo $Fila[4]; ?>">
                <label for="horasalida">Hora Salida</label>
                <input type="time" id="horasalida" name="horasalida" value="<?php echo $Fila[5]; ?>">
                <label for="folioprueba">Folio Prueba</label>
                <input type="text" id="folioprueba" name="folioprueba" value="<?php echo $Fila[6]; ?>">
                <label for="vigencia">Vigencia</label>
                <input type="text" id="vigencia" name="vigencia" value="<?php echo $Fila[7]; ?>">
                <label for="semestre">Semestre</label>
                <input type="number" id="semestre" name="semestre" value="<?php echo $Fila[8]; ?>">
                <label for="tipo">Tipo</label>
                <input type="text" id="tipo" name="tipo" value="<?php echo $Fila[9]; ?>">
                <label for="centroverificacion">Centro Verificación</label>
                <input type="number" id="centroverificacion" name="centroverificacion" value="<?php echo $Fila[10]; ?>">
                <label for="tarjetacirculacion">Tarjeta Circulación</label>
                <input type="text" id="tarjetacirculacion" name="tarjetacirculacion" value="<?php echo $Fila[11]; ?>">
                <input type="hidden" id="folio" name="folio" value="<?php echo $id; ?>">
                <input type="submit">
            </form>
        <?php
        }
        Desconectar($Con);
    }
    if(isset($_POST['folio'])){
        $id = $_POST['folio'];
        $Fecha = $_POST['fecha'];
        $Dictamen = $_POST['dictamen'];
        $Tecnico = $_POST['tecnico'];
        $HoraEntrada = $_POST['horaentrada'];
        $HoraSalida = $_POST['horasalida'];
        $FolioPrueba = $_POST['folioprueba'];
        $Vigencia = $_POST['vigencia'];
        $Semestre = $_POST['semestre'];
        $Tipo = $_POST['tipo'];
        $CentroVerificacion = $_POST['centroverificacion'];
        $TarjetaCirculacion = $_POST['tarjetacirculacion'];
        $Con =  Conectar();
        $SQL = "UPDATE verificaciones SET FECHA='$Fecha', DICTAMEN='$Dictamen', TECNICO='$Tecnico', HORAENTRADA='$HoraEntrada', HORASALIDA='$HoraSalida', FOLIOPRUEBA='$FolioPrueba', VIGENCIA='$Vigencia', SEMESTRE='$Semestre', TIPO='$Tipo', CENTROVERIFICACION='$CentroVerificacion', TARJETACIRCULACION='$TarjetaCirculacion' WHERE FOLIO='$id';";
        $ResultSet = Ejecutar($Con,$SQL);
        desconectar($Con);
        header("Location:UVerificaciones.php");
    }
?>
</div>

</body>
</html>
