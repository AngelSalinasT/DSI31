<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Oficiales</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Actualizar Oficiales</h1>
        <form method="post">
            <label>ID:</label>
            <input type="text" id="ID" name="ID">
            <button type="submit">Enviar</button>
        </form>

        <?php
        include("../../controlador/controlador.php");
        if(isset($_POST['ID'])){
            $ID = $_POST['ID'];
            
            $Con = Conectar();
            $SQL = "SELECT * FROM oficiales WHERE ID='$ID';";
            $ResultSet = Ejecutar($Con, $SQL);
            $Fila = mysqli_fetch_row($ResultSet);

            if(!$Fila){
                echo "No se encontró ningún registro con el ID proporcionado.";
            } else {
                ?>
                <form method="POST">
                    <label>Nombre:</label>
                    <input type="text" id="Nombre" name="Nombre" value="<?php print($Fila[1]); ?>"><br>
                    <label>Apellidos:</label>
                    <input type="text" id="Apellidos" name="Apellidos" value="<?php print($Fila[2]); ?>"><br>
                    <label>Firma:</label>
                    <input type="text" id="Firma" name="Firma" value="<?php print($Fila[3]); ?>"><br>
                    <label>Región:</label>
                    <input type="text" id="Region" name="Region" value="<?php print($Fila[4]); ?>"><br>
                    <input type="hidden" id="IDHidden" name="IDHidden" value="<?php print($ID); ?>">
                    <button type="submit">Enviar</button>
                </form>
                <?php
            }
            desconectar($Con);
        }
        if(isset($_POST['Nombre'])){
            $Nombre = $_POST['Nombre'];
            $Apellidos = $_POST['Apellidos'];
            $Firma = $_POST['Firma'];
            $Region = $_POST['Region'];
            $ID = $_POST['IDHidden'];
            
            $Con = Conectar();
            $SQL = "UPDATE oficiales SET 
                NOMBRE='$Nombre', 
                APELLIDOS='$Apellidos', 
                FIRMA='$Firma', 
                REGION='$Region' 
                WHERE ID='$ID';";
            $ResultSet = Ejecutar($Con, $SQL);
            desconectar($Con);
            header("Location:UOficiales.php");
        }
        ?>
    </div>
</body>
</html>
