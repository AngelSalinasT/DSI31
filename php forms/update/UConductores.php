<!DOCTYPE html>
<html>
<head>
    <title>Editar Conductor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Editar Conductor</h1>
    <form method="post">
        <label for="id">ID del Conductor</label>
        <input type="text" id="id" name="id">
        <input type="submit" value="Buscar">
    </form>

<?php
    include("../../controlador/controlador.php");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $Con =  Conectar();
        $SQL = "SELECT * FROM conductores WHERE ID = '$id';";
        $ResultSet = Ejecutar($Con,$SQL);
        $Fila = mysqli_fetch_row($ResultSet);
        ?>
            <form method="post">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $Fila[1]; ?>">
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $Fila[2]; ?>">
                <label for="curp">CURP</label>
                <input type="text" id="curp" name="curp" value="<?php echo $Fila[3]; ?>">
                <label for="telefono">Teléfono</label>
                <input type="number" id="telefono" name="telefono" value="<?php echo $Fila[4]; ?>">
                <label for="correo">Correo</label>
                <input type="email" id="correo" name="correo" value="<?php echo $Fila[5]; ?>">
                <label for="rfc">RFC</label>
                <input type="text" id="rfc" name="rfc" value="<?php echo $Fila[6]; ?>">

                <label for="TIPOSANGRE">Tipo de Sangre:</label>
                <select id="TIPOSANGRE" name="TIPOSANGRE">
                    <option value="A+" <?php echo ($Fila[7] == 'A+') ? 'selected' : ''; ?>>A+</option>
                    <option value="A-" <?php echo ($Fila[7] == 'A-') ? 'selected' : ''; ?>>A-</option>
                    <option value="B+" <?php echo ($Fila[7] == 'B+') ? 'selected' : ''; ?>>B+</option>
                    <option value="B-" <?php echo ($Fila[7] == 'B-') ? 'selected' : ''; ?>>B-</option>
                    <option value="AB+" <?php echo ($Fila[7] == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                    <option value="AB-" <?php echo ($Fila[7] == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                    <option value="O+" <?php echo ($Fila[7] == 'O+') ? 'selected' : ''; ?>>O+</option>
                    <option value="O-" <?php echo ($Fila[7] == 'O-') ? 'selected' : ''; ?>>O-</option>
                </select><br>


                <label for="donador_activo">Donador Activo</label>
                <select id="donador_activo" name="donador_activo">
                    <option value="A+" <?php echo ($Fila[8] == '1') ? 'selected' : ''; ?>>Si</option>
                    <option value="A-" <?php echo ($Fila[8] == '0') ? 'selected' : ''; ?>>No</option>
                </select><br>


                <label for="num_emer">Número de Emergencia</label>
                <input type="text" id="num_emer" name="num_emer" value="<?php echo $Fila[9]; ?>">

                <label for="direccion">Dirección</label>
                <input type="number" id="direccion" name="direccion" value="<?php echo $Fila[10]; ?>">

                                
                <label for="fechaNac">Fecha de nacimiento</label>
                <input type="date" id="fechan" name="fechan" value="<?php echo $Fila[11]; ?>">

                <label for="firma">Firma</label>
                <input type="file" id="firma" name="firma" value="<?php echo $Fila[12]; ?>">

                <input type="hidden" id="id_conductor" name="id_conductor" value="<?php echo $id; ?>">
                <input type="submit" value="Actualizar">
            </form>
        <?php
        Desconectar($Con);
    }
    if(isset($_POST['id_conductor'])){
        $id = $_POST['id_conductor'];
        $Nombre = $_POST['nombre'];
        $Apellidos = $_POST['apellidos'];
        $Curp = $_POST['curp'];
        $Telefono = $_POST['telefono'];
        $Correo = $_POST['correo'];
        $Rfc = $_POST['rfc'];
        $TipoSangre = $_POST['TIPOSANGRE'];
        $DonadorActivo = $_POST['donador_activo'];
        $NumEmer = $_POST['num_emer'];
        $Direccion = $_POST['direccion'];
        $FechaNac = $_POST['fechan'];
        $firma = $_POST['firma'];         
        $Con =  Conectar();

        $SQL = "UPDATE conductores SET NOMBRE='$Nombre', APELLIDOS='$Apellidos', CURP='$Curp', TELEFONO='$Telefono', CORREO='$Correo', RFC='$Rfc', TIPOSANGRE='$TipoSangre', DONADORACTIVO='$DonadorActivo', NUMEMER='$NumEmer', DIRECCION='$Direccion', FECHANAC='$FechaNac', Firma='$firma' WHERE ID='$id';";
        $ResultSet = Ejecutar($Con,$SQL);
    }
?>
</div>

</body>
</html>
