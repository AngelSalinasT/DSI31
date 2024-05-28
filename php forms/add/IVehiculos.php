<?php
    include("../../controlador/controlador.php");
    include('../../login/validar_A.php');

    $numeroSerie = $_POST['NUMSERIE'];
    $cilindraje = $_POST['CILINDRAJE'];
    $capacidad = $_POST['CAPACIDAD'];
    $puertas = $_POST['PUERTAS'];
    $asientos = $_POST['ASIENTOS'];
    $combustible = $_POST['COMBUSTBLE'];
    $transmision = $_POST['TRASNMISION'];
    $clase = $_POST['CLASE'];
    $tipo = $_POST['TIPO'];
    $uso = $_POST['USO'];
    $rpa = $_POST['RPA'];
    $modelo = $_POST['MODELO'];
    $folio = $_POST['FOLIO'];
    $placaAnterior = $_POST['PLACAANT'];
    $marcaSublinea = $_POST['MARCASUBLINEA'];
    $placa = $_POST['PLACA'];
    $orden = $_POST['ORDEN'];
    $color = $_POST['COLOR'];

    print("Número de Serie: $numeroSerie <br>");
    print("Cilindraje: $cilindraje <br>");
    print("Capacidad: $capacidad <br>");
    print("Puertas: $puertas <br>");
    print("Asientos: $asientos <br>");
    print("Combustible: $combustible <br>");
    print("Transmisión: $transmision <br>");
    print("Clase: $clase <br>");
    print("Tipo: $tipo <br>");
    print("Uso: $uso <br>");
    print("RPA: $rpa <br>");
    print("Modelo: $modelo <br>");
    print("Folio: $folio <br>");
    print("Placa Anterior: $placaAnterior <br>");
    print("Marca y Sublínea: $marcaSublinea <br>");
    print("Placa: $placa <br>");
    print("Orden: $orden <br>");
    print("Color: $color <br>");

    $SQL = "INSERT INTO vehiculos (NUMSERIE, CILINDRAJE, CAPACIDAD, PUERTAS, ASIENTOS, COMBUSTBLE, TRASNMISION, CLASE, TIPO, USO, RPA, MODELO, FOLIO, PLACAANT, MARCASUBLINEA, PLACA, ORDEN, COLOR) 
    VALUES ('$numeroSerie', '$cilindraje', '$capacidad', '$puertas', '$asientos', '$combustible', '$transmision', '$clase', '$tipo', '$uso', '$rpa', '$modelo', '$folio', '$placaAnterior', '$marcaSublinea', '$placa', '$orden', '$color');";
    print($SQL);

    try {
        $Con = Conectar();
        $ResultSet = Ejecutar($Con, $SQL);
        
        if ($ResultSet) {
            print("Registro insertado");
        } else {
            throw new Exception("Error al insertar el registro.");
        }
        
        Desconectar($Con);
    } catch (Exception $e) {
        print("<br><br>Se ha producido un error, favor de ingresar valores validos y que existan en la base de datos");
    }
?>
