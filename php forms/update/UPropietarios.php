<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
    <link rel="stylesheet" href="updateEstilo.css">
</head>
<body>

<div class="container">
    <form method="post">
        <label for="id">Id Propietario</label>
        <input type="text" id="id" name="id">
        <input type="submit">
    </form>
<?php
    include("../../controlador/controlador.php");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $Con =  Conectar();
        $SQL = "SELECT * FROM PROPIETARIOS WHERE ID = '$id';";
        $ResultSet = Ejecutar($Con,$SQL);
        $Fila = mysqli_fetch_row($ResultSet);
        ?>
            <form method="post">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $Fila[1]; ?>">
                <input type="submit">
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $Fila[2]; ?>">
                <input type="submit">
                <label for="curp">CURP</label>
                <input type="text" id="curp" name="curp" value="<?php echo $Fila[3]; ?>">
                <input type="submit">
                <label for="telefono">Telefono</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $Fila[4]; ?>">
                <input type="submit">
                <label for="correo">Correo</label>
                <input type="text" id="correo" name="correo" value="<?php echo $Fila[5]; ?>">
                <input type="submit">
                <label for="rfc">RFC</label>
                <input type="text" id="rfc" name="rfc" value="<?php echo $Fila[6]; ?>">
                <input type="submit">
                <label for="direccion">Direccion</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $Fila[7]; ?>">
                <input type="hidden" id="idPropietario" name="idPropietario" value="<?php echo $id; ?>">
                <input type="submit">
            </form>
        <?php
        Desconectar($Con);
    }
    if(isset($_POST['idPropietario'])){
        $id = $_POST['idPropietario'];
        $Nombre = $_POST['nombre'];
        $Apellidos = $_POST['apellidos'];
        $Curp = $_POST['curp'];
        $Telefono = $_POST['telefono'];
        $Rfc = $_POST['rfc'];
        $Direccion = $_POST['direccion'];
        $Con =  Conectar();
        $SQL = "UPDATE PROPIETARIOS SET Nombre='$Nombre', Apellidos='$Apellidos', CURP='$Curp', Telefono='$Telefono', RFC='$Rfc', Direccion='$Direccion' WHERE ID='$id';";
        $ResultSet = Ejecutar($Con,$SQL);
    }
?>
</div>

</body>
</html>
