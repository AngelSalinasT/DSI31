<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Propietarios</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css"> 
</head>
<body>

<div class="container">
    <h1>Actualizar Propietarios</h1>
    <form method="post">
        <label for="id">Id Propietario</label>
        <input type="text" id="id" name="id">
        <button type="submit">Enviar</button>
    </form>

    <?php
    include("../../controlador/controlador.php");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $Con = Conectar();
        $SQL = "SELECT * FROM PROPIETARIOS WHERE ID = '$id';";
        $ResultSet = Ejecutar($Con, $SQL);
        $Fila = mysqli_fetch_row($ResultSet);

        if(!$Fila){
            echo "No se encontró ningún registro con el ID proporcionado.";
        } else {
            ?>
            <form method="post">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $Fila[1]; ?>"><br>
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $Fila[2]; ?>"><br>
                <label for="curp">CURP</label>
                <input type="text" id="curp" name="curp" value="<?php echo $Fila[3]; ?>"><br>
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $Fila[4]; ?>"><br>
                <label for="correo">Correo</label>
                <input type="text" id="correo" name="correo" value="<?php echo $Fila[5]; ?>"><br>
                <label for="rfc">RFC</label>
                <input type="text" id="rfc" name="rfc" value="<?php echo $Fila[6]; ?>"><br>
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $Fila[7]; ?>"><br>
                <input type="hidden" id="idPropietario" name="idPropietario" value="<?php echo $id; ?>">
                <button type="submit">Enviar</button>
            </form>
            <?php
        }
        Desconectar($Con);
    }
    if(isset($_POST['idPropietario'])){
        $id = $_POST['idPropietario'];
        $Nombre = $_POST['nombre'];
        $Apellidos = $_POST['apellidos'];
        $Curp = $_POST['curp'];
        $Telefono = $_POST['telefono'];
        $Correo = $_POST['correo'];
        $Rfc = $_POST['rfc'];
        $Direccion = $_POST['direccion'];
        
        $Con = Conectar();
        $SQL = "UPDATE PROPIETARIOS SET 
                    Nombre='$Nombre', 
                    Apellidos='$Apellidos', 
                    CURP='$Curp', 
                    Telefono='$Telefono', 
                    Correo='$Correo', 
                    RFC='$Rfc', 
                    Direccion='$Direccion' 
                WHERE ID='$id';";
        $ResultSet = Ejecutar($Con, $SQL);
        Desconectar($Con);
    }
    ?>
</div>

</body>
</html>
