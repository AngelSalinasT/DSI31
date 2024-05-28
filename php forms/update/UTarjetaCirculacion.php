<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Tarjetas de Circulación</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css"> 
</head>
<body>

<div class="container">
    <h1>Actualizar Tarjetas de Circulación</h1>
    <form method="post">
        <label for="Folio">Folio</label>
        <input type="text" id="Folio" name="Folio">
        <button type="submit">Enviar</button>
    </form>

    <?php
    include("../../controlador/controlador.php");
    if(isset($_POST['Folio'])){
        $Folio = $_POST['Folio'];
        
        $Con = Conectar();
        $SQL = "SELECT * FROM tarjetascirculacion WHERE FOLIO='$Folio';";
        $ResultSet = Ejecutar($Con, $SQL);
        $Fila = mysqli_fetch_row($ResultSet);

        if(!$Fila){
            echo "No se encontró ningún registro con el folio proporcionado.";
        } else {
            ?>
            <form method="post">
                <label for="Vigencia">Vigencia</label>
                <input type="date" id="Vigencia" name="Vigencia" value="<?php echo $Fila[1]; ?>"><br>
                <label for="FechaExpedicion">Fecha de Expedición</label>
                <input type="date" id="FechaExpedicion" name="FechaExpedicion" value="<?php echo $Fila[2]; ?>"><br>
                <label for="Movimiento">Movimiento</label>
                <input type="text" id="Movimiento" name="Movimiento" value="<?php echo $Fila[3]; ?>"><br>
                <label for="TipoServicio">Tipo de Servicio</label>
                <input type="text" id="TipoServicio" name="TipoServicio" value="<?php echo $Fila[4]; ?>"><br>
                <label for="Vehiculo">Vehículo</label>
                <input type="text" id="Vehiculo" name="Vehiculo" value="<?php echo $Fila[5]; ?>"><br>
                <label for="Propietario">Propietario</label>
                <input type="text" id="Propietario" name="Propietario" value="<?php echo $Fila[6]; ?>"><br>
                <label for="Operacion">Operación</label>
                <input type="text" id="Operacion" name="Operacion" value="<?php echo $Fila[7]; ?>"><br>
                <label for="Origen">Origen</label>
                <input type="text" id="Origen" name="Origen" value="<?php echo $Fila[8]; ?>"><br>
                <label for="NOMOTOR">Número de motor</label>
                <input type="text" id="NOMOTOR" name="NOMOTOR" value="<?php echo $Fila[9]; ?>"><br>
                <input type="hidden" id="FolioHidden" name="FolioHidden" value="<?php echo $Folio; ?>">
                <button type="submit">Enviar</button>
            </form>
            <?php
        }
        desconectar($Con);
    }
    if(isset($_POST['Vigencia'])){
        $Vigencia = $_POST['Vigencia'];
        $FechaExpedicion = $_POST['FechaExpedicion'];
        $Movimiento = $_POST['Movimiento'];
        $TipoServicio = $_POST['TipoServicio'];
        $Vehiculo = $_POST['Vehiculo'];
        $Propietario = $_POST['Propietario'];
        $Operacion = $_POST['Operacion'];
        $Origen = $_POST['Origen'];
        $Folio = $_POST['FolioHidden'];
        $NOMOTOR = $_POST['NOMOTOR'];

        $Con = Conectar();
        $SQL = "UPDATE tarjetascirculacion SET 
                    VIGENCIA='$Vigencia', 
                    FECHAEXPEDICION='$FechaExpedicion', 
                    MOVIMIENTO='$Movimiento', 
                    TIPOSERVICIO='$TipoServicio', 
                    VEHICULO='$Vehiculo', 
                    PROPIETARIO='$Propietario', 
                    OPERACION='$Operacion', 
                    ORIGEN='$Origen', 
                    NOMOTOR='$NOMOTOR' 
                WHERE FOLIO='$Folio';";
        $ResultSet = Ejecutar($Con, $SQL);
        desconectar($Con);
        header("Location:UTarjetaCirculacion.php");
    }
    ?>
</div>

</body>
</html>
