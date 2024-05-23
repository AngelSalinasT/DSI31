<!DOCTYPE html>
<html>
<head>
    <title>Editar Dirección</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>

<div class="container">
    <h1>Editar Dirección</h1>
    <form method="post">
        <label for="id">ID</label>
        <input type="text" id="id" name="id">
        <button type="submit">Enviar</button>
    </form>

    <?php
include("../../controlador/controlador.php");
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $Con =  Conectar();
    $SQL = "SELECT * FROM direcciones WHERE ID = '$id';";
    $ResultSet = Ejecutar($Con,$SQL);
    $Fila = mysqli_fetch_row($ResultSet);
    ?>
        <form method="post">
            <label for="calle">Calle</label>
            <input type="text" id="calle" name="calle" value="<?php echo $Fila[1]; ?>">
            <input type="submit">
            <label for="numero">Número</label>
            <input type="text" id="numero" name="numero" value="<?php echo $Fila[2]; ?>">
            <input type="submit">
            <label for="colonia">Colonia</label>
            <input type="text" id="colonia" name="colonia" value="<?php echo $Fila[3]; ?>">
            <input type="submit">
            <label for="municipio">Municipio</label>
            <input type="text" id="municipio" name="municipio" value="<?php echo $Fila[4]; ?>">
            <input type="submit">
            <label for="codigopostal">Código Postal</label>
            <input type="text" id="codigopostal" name="codigopostal" value="<?php echo $Fila[5]; ?>">
            <input type="submit">
            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" value="<?php echo $Fila[6]; ?>">
            <input type="hidden" id="idDireccion" name="idDireccion" value="<?php echo $id; ?>">
            <input type="submit">
        </form>
    <?php
    Desconectar($Con);
}
if(isset($_POST['idDireccion'])){
    $id = $_POST['idDireccion'];
    $Calle = $_POST['calle'];
    $Numero = $_POST['numero'];
    $Colonia = $_POST['colonia'];
    $Municipio = $_POST['municipio'];
    $CodigoPostal = $_POST['codigopostal'];
    $Estado = $_POST['estado'];
    $Con =  Conectar();
    $SQL = "UPDATE direcciones SET CALLE='$Calle', NUMERO='$Numero', COLONIA='$Colonia', MUNICIPIO='$Municipio', CODIGOPOSTAL='$CodigoPostal', ESTADO='$Estado' WHERE ID='$id';";
    $ResultSet = Ejecutar($Con,$SQL);
}
?>
</div>

</body>
</html>
