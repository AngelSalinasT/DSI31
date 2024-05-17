<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Multas</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Actualizar Multas</h1>
        <form method="post">
            <label>Folio:</label>
            <input type="text" id="Folio" name="Folio">
            <input type="submit" value="Buscar">
        </form>

        <?php
        include("../../controlador/controlador/Controlador.php");
        if(isset($_POST['Folio'])){
            $Folio = $_POST['Folio'];
            
            $Con = Conectar();
            $SQL = "SELECT * FROM multas WHERE FOLIO='$Folio';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);

            if(!$Fila){
                echo "No se encontró ningún registro con el folio proporcionado.";
            } else {
                ?>
                <form method="POST">
                    <label>Fecha:</label>
                    <input type="date" id="Fecha" name="Fecha" value="<?php print($Fila[1]); ?>"><br>
                    <label>Reporte Sección:</label>
                    <input type="text" id="ReporteSeccion" name="ReporteSeccion" value="<?php print($Fila[2]); ?>"><br>
                    <label>Fundamento:</label>
                    <input type="text" id="Fundamento" name="Fundamento" value="<?php print($Fila[3]); ?>"><br>
                    <label>Motivo:</label>
                    <input type="text" id="Motivo" name="Motivo" value="<?php print($Fila[4]); ?>"><br>
                    <label>Garantía Retenida:</label>
                    <input type="text" id="GarantiaRetenida" name="GarantiaRetenida" value="<?php print($Fila[5]); ?>"><br>
                    <label>No. Parte Accidente:</label>
                    <input type="text" id="NoParteAccidente" name="NoParteAccidente" value="<?php print($Fila[6]); ?>"><br>
                    <label>Convenio:</label>
                    <input type="text" id="Convenio" name="Convenio" value="<?php print($Fila[7]); ?>"><br>
                    <label>Puesto a Disposición:</label>
                    <input type="text" id="PuestoDisposicion" name="PuestoDisposicion" value="<?php print($Fila[8]); ?>"><br>
                    <label>Depósito Oficial:</label>
                    <input type="number" id="DepositoOficial" name="DepositoOficial" value="<?php print($Fila[9]); ?>"><br>
                    <label>Observación Operativo:</label>
                    <input type="text" id="ObservaOperativo" name="ObservaOperativo" value="<?php print($Fila[10]); ?>"><br>
                    <label>Observación Conductor:</label>
                    <input type="text" id="ObservaConductor" name="ObservaConductor" value="<?php print($Fila[11]); ?>"><br>
                    <label>Calificación Boleta:</label>
                    <input type="text" id="CalificacionBoleta" name="CalificacionBoleta" value="<?php print($Fila[12]); ?>"><br>
                    <label>No. Licencia:</label>
                    <input type="text" id="NoLicencia" name="NoLicencia" value="<?php print($Fila[13]); ?>"><br>
                    <label>Oficiales:</label>
                    <input type="number" id="Oficiales" name="Oficiales" value="<?php print($Fila[14]); ?>"><br>
                    <label>Tarjeta Circulación:</label>
                    <input type="number" id="TarjetaCirculacion" name="TarjetaCirculacion" value="<?php print($Fila[15]); ?>"><br>
                    <label>Vía:</label>
                    <input type="text" id="Via" name="Via" value="<?php print($Fila[16]); ?>"><br>
                    <label>Kilómetro:</label>
                    <input type="number" id="Kilometro" name="Kilometro" value="<?php print($Fila[17]); ?>"><br>
                    <label>Carretera:</label>
                    <input type="text" id="Carretera" name="Carretera" value="<?php print($Fila[18]); ?>"><br>
                    <label>Velocímetro:</label>
                    <input type="text" id="Velocimetro" name="Velocimetro" value="<?php print($Fila[19]); ?>"><br>
                    <label>Hora:</label>
                    <input type="time" id="Hora" name="Hora" value="<?php print($Fila[20]); ?>"><br>
                    <input type="hidden" id="FolioHidden" name="FolioHidden" value="<?php print($Folio); ?>">
                    <input type="submit" value="Actualizar">
                </form>
                <?php
            }
            desconectar($Con);
        }
        if(isset($_POST['Fecha'])){
            $Fecha = $_POST['Fecha'];
            $ReporteSeccion = $_POST['ReporteSeccion'];
            $Fundamento = $_POST['Fundamento'];
            $Motivo = $_POST['Motivo'];
            $GarantiaRetenida = $_POST['GarantiaRetenida'];
            $NoParteAccidente = $_POST['NoParteAccidente'];
            $Convenio = $_POST['Convenio'];
            $PuestoDisposicion = $_POST['PuestoDisposicion'];
            $DepositoOficial = $_POST['DepositoOficial'];
            $ObservaOperativo = $_POST['ObservaOperativo'];
            $ObservaConductor = $_POST['ObservaConductor'];
            $CalificacionBoleta = $_POST['CalificacionBoleta'];
            $NoLicencia = $_POST['NoLicencia'];
            $Oficiales = $_POST['Oficiales'];
            $TarjetaCirculacion = $_POST['TarjetaCirculacion'];
            $Via = $_POST['Via'];
            $Kilometro = $_POST['Kilometro'];
            $Carretera = $_POST['Carretera'];
            $Velocimetro = $_POST['Velocimetro'];
            $Hora = $_POST['Hora'];
            $Folio = $_POST['FolioHidden'];

            $Con = Conectar();
            $SQL = "UPDATE multas SET 
                FECHA='$Fecha', 
                REPORTESECCION='$ReporteSeccion', 
                FUNDAMENTO='$Fundamento', 
                MOTIVO='$Motivo', 
                GARANTIARETENIDA='$GarantiaRetenida', 
                NOPARTEACCIDENTE='$NoParteAccidente', 
                CONVENIO='$Convenio', 
                PUESTODISPOSICION='$PuestoDisposicion', 
                DEPOSITOOFICIAL='$DepositoOficial', 
                OBSERVAOPERATICO='$ObservaOperativo', 
                OBSERVACONDUCTOR='$ObservaConductor', 
                CALIFICACIONBOLETA='$CalificacionBoleta', 
                NOLICENCIA='$NoLicencia', 
                OFICIALES='$Oficiales', 
                TARJETACIRCULACION='$TarjetaCirculacion', 
                VIA='$Via', 
                KILOMETRO='$Kilometro', 
                CARRETERA='$Carretera', 
                VELOCIMETRO='$Velocimetro', 
                HORA='$Hora' 
                WHERE FOLIO='$Folio';";
            $ResultSet = Ejecutar($Con, $SQL);
            desconectar($Con);
            header("Location:UMultas.php");
        }
        ?>
    </div>
</body>
</html>
