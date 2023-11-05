<?php
function creoConexion (){
    
    $Hostdb="localhost";
    $namedb="baloncesto";
    $userdb="root";
    $passworddb="";
    $DBHost=("mysql:host=$Hostdb;dbname=$namedb");
    try{
        $conexion=new PDO($DBHost,$userdb,$passworddb);
        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       
    }catch(Exception $e){
        $e->getMessage();
    }
    return $conexion;
}
    
?>