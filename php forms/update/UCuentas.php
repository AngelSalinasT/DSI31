<!DOCTYPE html>
<html>
<head>
    <title>Editar Cuenta</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>

<div class="container">
    <h1>Editar Cuenta</h1>
    <form method="post">
        <label for="username">Nombre de Usuario</label>
        <input type="text" id="username" name="username">
        <button type="submit">Enviar</button>
    </form>

<?php
    include("../../controlador/controlador.php");
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $Con =  Conectar();
        $SQL = "SELECT * FROM cuentas WHERE userName = '$username';";
        $ResultSet = Ejecutar($Con,$SQL);
        $Fila = mysqli_fetch_row($ResultSet);
        ?>
            <form method="post">
                <label for="password">Contraseña</label>
                <input type="text" id="password" name="password" value="<?php echo $Fila[1]; ?>">
                <label for="tipo">Tipo</label>
                <input type="text" id="tipo" name="tipo" value="<?php echo $Fila[2]; ?>">
                <label for="status">Estado</label>
                <input type="text" id="status" name="status" value="<?php echo $Fila[3]; ?>">
                <label for="bloqueo">Bloqueo</label>
                <input type="text" id="bloqueo" name="bloqueo" value="<?php echo $Fila[4]; ?>">
                <label for="intentos">Intentos</label>
                <input type="text" id="intentos" name="intentos" value="<?php echo $Fila[5]; ?>">
                <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                <button type="submit">Enviar</button>
            </form>
        <?php
        Desconectar($Con);
    }
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $tipo = $_POST['tipo'];
        $status = $_POST['status'];
        $bloqueo = $_POST['bloqueo'];
        $intentos = $_POST['intentos'];
        $Con =  Conectar();
        $SQL = "UPDATE cuentas SET password='$password', tipo='$tipo', status='$status', bloqueo='$bloqueo', intentos='$intentos' WHERE userName='$username';";
        $ResultSet = Ejecutar($Con,$SQL);
    }
?>
</div>

</body>
</html>
