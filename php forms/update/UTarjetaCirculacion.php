<html>
<form method="post">
    <label>Folio</label>
    <input type="text" id="Folio" name="Folio">
    <input type="submit">
</form>

<?php
include("../../controlador/controlador.php");
if(isset($_POST['Folio'])){
    $Folio=$_POST['Folio'];
    
    $Con=Conectar();
    $SQL="SELECT * FROM tarjetascirculacion WHERE FOLIO='$Folio';";
    $ResultSet=Ejecutar($Con,$SQL);
    $Fila=mysqli_fetch_row($ResultSet);

    if(!$Fila){
        echo "No se encontró ningún registro con el folio proporcionado.";
    } else {
        ?>
        <form method="POST">
            <label>Vigencia</label>
            <input type="date" id="Vigencia" name="Vigencia" value="<?php print($Fila[1]); ?>">
            <label>Fecha de Expedición</label>
            <input type="date" id="FechaExpedicion" name="FechaExpedicion" value="<?php print($Fila[2]); ?>">
            <label>Movimiento</label>
            <input type="text" id="Movimiento" name="Movimiento" value="<?php print($Fila[3]); ?>">
            <label>Tipo de Servicio</label>
            <input type="text" id="TipoServicio" name="TipoServicio" value="<?php print($Fila[4]); ?>">
            <label>Vehículo</label>
            <input type="text" id="Vehiculo" name="Vehiculo" value="<?php print($Fila[5]); ?>">
            <label>Propietario</label>
            <input type="text" id="Propietario" name="Propietario" value="<?php print($Fila[6]); ?>">
            <label>Operación</label>
            <input type="text" id="Operacion" name="Operacion" value="<?php print($Fila[7]); ?>">
            <label>Origen</label>
            <input type="text" id="Origen" name="Origen" value="<?php print($Fila[8]); ?>">
            <label>Número de motor: </label>
            <input type="text" id="NOMOTOR" name="NOMOTOR" value="<?php print($Fila[9]); ?>">

            <input type="hidden" id="FolioHidden" name="FolioHidden" value="<?php print($Folio); ?>">

            <input type="submit">
        </form>
        <?php
    }
    desconectar($Con);
}
if(isset($_POST['Vigencia'])){
    $Vigencia=$_POST['Vigencia'];
    $FechaExpedicion=$_POST['FechaExpedicion'];
    $Movimiento=$_POST['Movimiento'];
    $TipoServicio=$_POST['TipoServicio'];
    $Vehiculo=$_POST['Vehiculo'];
    $Propietario=$_POST['Propietario'];
    $Operacion=$_POST['Operacion'];
    $Origen=$_POST['Origen'];
    $Folio=$_POST['FolioHidden'];
    $NOMOTOR = $_POST['NOMOTOR'];

    $Con=Conectar();
    $SQL="UPDATE tarjetascirculacion SET VIGENCIA='$Vigencia', FECHAEXPEDICION='$FechaExpedicion', MOVIMIENTO='$Movimiento', TIPOSERVICIO='$TipoServicio', VEHICULO='$Vehiculo', PROPIETARIO='$Propietario', OPERACION='$Operacion', ORIGEN='$Origen', NOMOTOR ='$NOMOTOR' WHERE FOLIO='$Folio'; ";
    $ResultSet=Ejecutar($Con,$SQL);
    desconectar($Con);
    header("Location:UTarjetaCirculacion.php");
}
?>

</html>
