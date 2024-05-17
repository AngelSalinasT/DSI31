<?php
    function Conectar(){
        $Servidor = "127.0.0.1";
        $Usuario = "root";
        $Password = "";
        $BD = "controlvehicular31";   
        
        $Con = mysqli_connect($Servidor, $Usuario, $Password, $BD);

        return $Con;
    }

    function Ejecutar($Con,$SQL){
        $ResultSet = mysqli_query($Con, $SQL);//resul set
        return $ResultSet;
    }
    function Procesar(){
        
    }
    function Desconectar($Con){
        $r = mysqli_close($Con);
        return $r;
    }
?>