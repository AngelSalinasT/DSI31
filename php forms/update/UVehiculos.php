<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Vehículos</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>

<div class="container">
    <h1>Actualizar Vehículos</h1>
    <form method="post">
        <label for="NumSerie">Número de Serie</label>
        <input type="text" id="NumSerie" name="NumSerie" required>
        <button type="submit">Enviar</button>
    </form>

    <?php
    include("../../controlador/controlador.php");

    if (isset($_POST['NumSerie'])) {
        $NumSerie = $_POST['NumSerie'];

        $Con = Conectar();
        if (!$Con) {
            die("Error en la conexión a la base de datos.");
        }
        
        $SQL = "SELECT * FROM vehiculos WHERE NUMSERIE='$NumSerie';";
        $ResultSet = Ejecutar($Con, $SQL);
        
        if (!$ResultSet) {
            die("Error al ejecutar la consulta.");
        }

        $Fila = mysqli_fetch_row($ResultSet);

        if (!$Fila) {
            echo "<p>No se encontró ningún registro con el número de serie proporcionado.</p>";
        } else {
            ?>
            <form method="post">
                <label for="CILINDRAJE">Cilindraje</label>
                <input type="text" id="CILINDRAJE" name="CILINDRAJE" value="<?php echo $Fila[1]; ?>"><br>
                <label for="CAPACIDAD">Capacidad</label>
                <input type="text" id="CAPACIDAD" name="CAPACIDAD" value="<?php echo $Fila[2]; ?>"><br>
                <label for="PUERTAS">Puertas</label>
                <input type="text" id="PUERTAS" name="PUERTAS" value="<?php echo $Fila[3]; ?>"><br>
                <label for="ASIENTOS">Asientos</label>
                <input type="text" id="ASIENTOS" name="ASIENTOS" value="<?php echo $Fila[4]; ?>"><br>
                <label for="COMBUSTBLE">Combustible</label>
                <input type="text" id="COMBUSTBLE" name="COMBUSTBLE" value="<?php echo $Fila[5]; ?>"><br>
                <label for="TRASNMISION">Transmisión</label>
                <input type="text" id="TRASNMISION" name="TRASNMISION" value="<?php echo $Fila[6]; ?>"><br>
                <label for="CLASE">Clase</label>
                <input type="text" id="CLASE" name="CLASE" value="<?php echo $Fila[7]; ?>"><br>
                <label for="TIPO">Tipo</label>
                <input type="text" id="TIPO" name="TIPO" value="<?php echo $Fila[8]; ?>"><br>
                <label for="USO">Uso</label>
                <input type="text" id="USO" name="USO" value="<?php echo $Fila[9]; ?>"><br>
                <label for="RPA">RPA</label>
                <input type="text" id="RPA" name="RPA" value="<?php echo $Fila[10]; ?>"><br>
                <label for="MODELO">Modelo</label>
                <input type="text" id="MODELO" name="MODELO" value="<?php echo $Fila[11]; ?>"><br>
                <label for="FOLIO">Folio</label>
                <input type="text" id="FOLIO" name="FOLIO" value="<?php echo $Fila[12]; ?>"><br>
                <label for="PLACAANT">Placa Anterior</label>
                <input type="text" id="PLACAANT" name="PLACAANT" value="<?php echo $Fila[13]; ?>"><br>
                <label for="MARCASUBLINEA">Marca Sublínea</label>
                <input type="text" id="MARCASUBLINEA" name="MARCASUBLINEA" value="<?php echo $Fila[14]; ?>"><br>
                <label for="PLACA">Placa</label>
                <input type="text" id="PLACA" name="PLACA" value="<?php echo $Fila[15]; ?>"><br>
                <label for="ORDEN">Orden</label>
                <input type="text" id="ORDEN" name="ORDEN" value="<?php echo $Fila[16]; ?>"><br>
                <label for="COLOR">Color</label>
                <input type="text" id="COLOR" name="COLOR" value="<?php echo $Fila[17]; ?>"><br>
                <input type="hidden" id="NumSerieHidden" name="NumSerieHidden" value="<?php echo $NumSerie; ?>">
                <button type="submit">Actualizar</button>
            </form>
            <?php
        }
        desconectar($Con);
    }
    
    if (isset($_POST['NumSerieHidden'])) {
        $NumSerie = $_POST['NumSerieHidden'];
        $Cilindraje = $_POST['CILINDRAJE'];
        $Capacidad = $_POST['CAPACIDAD'];
        $Puertas = $_POST['PUERTAS'];
        $Asientos = $_POST['ASIENTOS'];
        $Combustble = $_POST['COMBUSTBLE'];
        $Trasnmision = $_POST['TRASNMISION'];
        $Clase = $_POST['CLASE'];
        $Tipo = $_POST['TIPO'];
        $Uso = $_POST['USO'];
        $RPA = $_POST['RPA'];
        $Modelo = $_POST['MODELO'];
        $Folio = $_POST['FOLIO'];
        $PlacaAnt = $_POST['PLACAANT'];
        $MarcaSublinea = $_POST['MARCASUBLINEA'];
        $Placa = $_POST['PLACA'];
        $Orden = $_POST['ORDEN'];
        $Color = $_POST['COLOR'];

        $Con = Conectar();
        if (!$Con) {
            die("Error en la conexión a la base de datos.");
        }

        $SQL = "UPDATE vehiculos SET 
                    CILINDRAJE='$Cilindraje', 
                    CAPACIDAD='$Capacidad', 
                    PUERTAS='$Puertas', 
                    ASIENTOS='$Asientos', 
                    COMBUSTBLE='$Combustble', 
                    TRASNMISION='$Trasnmision', 
                    CLASE='$Clase', 
                    TIPO='$Tipo', 
                    USO='$Uso', 
                    RPA='$RPA', 
                    MODELO='$Modelo', 
                    FOLIO='$Folio', 
                    PLACAANT='$PlacaAnt', 
                    MARCASUBLINEA='$MarcaSublinea', 
                    PLACA='$Placa', 
                    ORDEN='$Orden', 
                    COLOR='$Color'
                WHERE NUMSERIE='$NumSerie';";
        $ResultSet = Ejecutar($Con, $SQL);

        if (!$ResultSet) {
            die("Error al ejecutar la consulta de actualización.");
        }

        desconectar($Con);
        header("Location: UVehiculos.php");
        exit;
    }
    ?>
</div>

</body>
</html>
