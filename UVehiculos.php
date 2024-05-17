<html>
<form method="post">
    <label>Número de Serie</label>
    <input type="text" id="NumSerie" name="NumSerie">
    <input type="submit">
</form>

<?php
include("Controlador.php");
if(isset($_POST['NumSerie'])){
    $NumSerie=$_POST['NumSerie'];
    
    $Con=Conectar();
    $SQL="SELECT * FROM vehiculos WHERE NUMSERIE='$NumSerie';";
    $ResultSet=Ejecutar($Con,$SQL);
    $Fila=mysqli_fetch_row($ResultSet);

    if(!$Fila){
        echo "No se encontró ningún registro con el número de serie proporcionado.";
    } else {
        ?>
        <form method="POST">
            <label>Cilindraje</label>
            <input type="text" id="Cilindraje" name="Cilindraje" value="<?php print($Fila[1]); ?>">
            <label>Capacidad</label>
            <input type="text" id="Capacidad" name="Capacidad" value="<?php print($Fila[2]); ?>">
            <label>Puertas</label>
            <input type="text" id="Puertas" name="Puertas" value="<?php print($Fila[3]); ?>">
            <label>Asientos</label>
            <input type="text" id="Asientos" name="Asientos" value="<?php print($Fila[4]); ?>">
            <label>Combustible</label>
            <input type="text" id="Combustible" name="Combustible" value="<?php print($Fila[5]); ?>">
            <label>Transmisión</label>
            <input type="text" id="Transmision" name="Transmision" value="<?php print($Fila[6]); ?>">
            <label>Clase</label>
            <input type="text" id="Clase" name="Clase" value="<?php print($Fila[7]); ?>">
            <label>Tipo</label>
            <input type="text" id="Tipo" name="Tipo" value="<?php print($Fila[8]); ?>">
            <label>Uso</label>
            <input type="text" id="Uso" name="Uso" value="<?php print($Fila[9]); ?>">
            <label>RPA</label>
            <input type="text" id="RPA" name="RPA" value="<?php print($Fila[10]); ?>">
            <label>Modelo</label>
            <input type="text" id="Modelo" name="Modelo" value="<?php print($Fila[11]); ?>">
            <label>Folio</label>
            <input type="text" id="Folio" name="Folio" value="<?php print($Fila[12]); ?>">
            <label>Placa Anterior</label>
            <input type="text" id="PlacaAnt" name="PlacaAnt" value="<?php print($Fila[13]); ?>">
            <label>Marca Sublínea</label>
            <input type="text" id="MarcaSublinea" name="MarcaSublinea" value="<?php print($Fila[14]); ?>">
            <label>Placa</label>
            <input type="text" id="Placa" name="Placa" value="<?php print($Fila[15]); ?>">
            <label>Orden</label>
            <input type="text" id="Orden" name="Orden" value="<?php print($Fila[16]); ?>">
            <label>Color</label>
            <input type="text" id="Color" name="Color" value="<?php print($Fila[17]); ?>">
            <input type="hidden" id="NumSerieHidden" name="NumSerieHidden" value="<?php print($NumSerie); ?>">
            <input type="submit">
        </form>
        <?php
    }
    desconectar($Con);
}
if(isset($_POST['Cilindraje'])){
    $Cilindraje=$_POST['Cilindraje'];
    $Capacidad=$_POST['Capacidad'];
    $Puertas=$_POST['Puertas'];
    $Asientos=$_POST['Asientos'];
    $Combustible=$_POST['Combustible'];
    $Transmision=$_POST['Transmision'];
    $Clase=$_POST['Clase'];
    $Tipo=$_POST['Tipo'];
    $Uso=$_POST['Uso'];
    $RPA=$_POST['RPA'];
    $Modelo=$_POST['Modelo'];
    $Folio=$_POST['Folio'];
    $PlacaAnt=$_POST['PlacaAnt'];
    $MarcaSublinea=$_POST['MarcaSublinea'];
    $Placa=$_POST['Placa'];
    $Orden=$_POST['Orden'];
    $Color=$_POST['Color'];
    $NumSerie=$_POST['NumSerieHidden'];
    $Con=Conectar();
    $SQL="UPDATE vehiculos SET CILINDRAJE='$Cilindraje', CAPACIDAD='$Capacidad', PUERTAS='$Puertas', ASIENTOS='$Asientos', COMBUSTBLE='$Combustible', TRASNMISION='$Transmision', CLASE='$Clase', TIPO='$Tipo', USO='$Uso', RPA='$RPA', MODELO='$Modelo', FOLIO='$Folio', PLACAANT='$PlacaAnt', MARCASUBLINEA='$MarcaSublinea', PLACA='$Placa', ORDEN='$Orden', COLOR='$Color' WHERE NUMSERIE='$NumSerie'; ";
    $ResultSet=Ejecutar($Con,$SQL);
    desconectar($Con);
    header("Location:UVehiculos.php");
}
?>

</html>

