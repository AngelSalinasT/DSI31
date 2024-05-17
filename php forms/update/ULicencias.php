<!DOCTYPE html>
<html>
<head>
    <title>Editar Licencia</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Editar Licencia</h1>
    <form method="post">
        <label for="no_licencia">Número de Licencia</label>
        <input type="text" id="no_licencia" name="no_licencia">
        <input type="submit" value="Buscar">
    </form>
    <?php
    include("../../controlador/controlador.php");

    if(isset($_POST['no_licencia'])){
        $nolicencia = $_POST['no_licencia'];
        $Con = Conectar();
        $SQL = "SELECT * FROM licencias WHERE NOLICENCIA = '$nolicencia';";
        $ResultSet = Ejecutar($Con, $SQL);
        $Fila = mysqli_fetch_row($ResultSet);
        ?>
        <form method="post">

            <label for="tipo">Tipo</label>
            <select id="tipo" name="tipo">
                    <option value="A" <?php if($Fila[1] == 'A') echo 'selected'; ?>>A</option>
                    <option value="B" <?php if($Fila[1] == 'B') echo 'selected'; ?>>B</option>
                    <option value="C" <?php if($Fila[1] == 'C') echo 'selected'; ?>>C</option>
                    <option value="D" <?php if($Fila[1] == 'D') echo 'selected'; ?>>D</option>
            </select><br>
            
            <br>
            <label for="fechaexpedicion">Fecha de Expedición</label>
            <input type="date" id="fechaexpedicion" name="fechaexpedicion" value="<?php echo $Fila[2]; ?>">
            <br>
            <label for="vigencia">Vigencia</label>
            <input type="date" id="vigencia" name="vigencia" value="<?php echo $Fila[3]; ?>">
            <br>
            <label for="antiguedad">Antigüedad</label>
            <input type="number" id="antiguedad" name="antiguedad" value="<?php echo $Fila[4]; ?>">
            <br>
            <label for="conductor">Conductor</label>
            <input type="number" id="conductor" name="conductor" value="<?php echo $Fila[5]; ?>">
            <br>
            <label for="res">Restricciones</label>
            <input type="text" id="res" name="res" value="<?php echo $Fila[6]; ?>">
            <br>


            <br>
            <br>
            <input type="hidden" id="nolicencia" name="nolicencia" value="<?php echo $nolicencia; ?>">
            <input type="submit" value="Guardar Cambios">
        </form>
        <?php
        Desconectar($Con);
    }
    if(isset($_POST['nolicencia'])){
        $nolicencia = $_POST['nolicencia'];
        $Tipo = $_POST['tipo'];
        $FechaExpedicion = $_POST['fechaexpedicion'];
        $Vigencia = $_POST['vigencia'];
        $Antiguedad = $_POST['antiguedad'];
        $Conductor = $_POST['conductor'];
        $Restricciones = $_POST['res'];

        $Con = Conectar();
        $SQL = "UPDATE licencias SET TIPO='$Tipo', FECHAEXPEDICION='$FechaExpedicion', VIGENCIA='$Vigencia', ANTIGUEDAD='$Antiguedad', CONDUCTOR='$Conductor', RESTRICCIONES = '$Restricciones' WHERE NOLICENCIA='$nolicencia';";
        $ResultSet = Ejecutar($Con, $SQL);
   
        Desconectar($Con);
    }
    ?>

</div>

</body>
</html>
