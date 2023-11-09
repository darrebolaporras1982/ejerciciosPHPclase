<?php
function crear_conexion(){
   $dbNombre="db_biblioteca";
    $dbHost="localhost";
    $dbUsuario="root";
    $dbPass="";
    $Host=("mysql:host=$dbHost;dbname=$dbNombre");
    try{
        $conexion=new PDO($Host,$dbUsuario,$dbPass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    return $conexion; 
}
?>