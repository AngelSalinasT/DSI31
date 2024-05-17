<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
    <title>Editar Centro de Verificación</title>
    <link rel="stylesheet" href="updateEstilo.css">
</head>
<body>

<div class="container">
    <h1>Editar Centro de Verificación</h1>
    <form method="post">
        <label for="id">ID del Centro de Verificación</label>
        <input type="text" id="id" name="id">
        <input type="submit" value="Buscar">
    </form>

<?php
    include("controlador.php");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $Con =  Conectar();
        $SQL = "SELECT * FROM centrosverificacion WHERE ID = '$id';";
        $ResultSet = Ejecutar($Con,$SQL);
        $Fila = mysqli_fetch_row($ResultSet);
        ?>
            <form method="post">
                <label for="razon_social">Razón Social</label>
                <input type="text" id="razon_social" name="razon_social" value="<?php echo $Fila[1]; ?>">
                <label for="direccion">Dirección</label>
                <input type="number" id="direccion" name="direccion" value="<?php echo $Fila[2]; ?>">
                <label for="telefono">Teléfono</label>
                <input type="number" id="telefono" name="telefono" value="<?php echo $Fila[3]; ?>">
                <input type="hidden" id="id_centro" name="id_centro" value="<?php echo $id; ?>">
                <input type="submit" value="Actualizar">
            </form>
        <?php
        Desconectar($Con);
    }
    if(isset($_POST['id_centro'])){
        $id = $_POST['id_centro'];
        $RazonSocial = $_POST['razon_social'];
        $Direccion = $_POST['direccion'];
        $Telefono = $_POST['telefono'];
        $Con =  Conectar();
        $SQL = "UPDATE centrosverificacion SET RAZONSOCIAL='$RazonSocial', DIRECCION='$Direccion', TELEFONO='$Telefono' WHERE ID='$id';";
        $ResultSet = Ejecutar($Con,$SQL);
    }
?>
</div>

</body>
</html>
