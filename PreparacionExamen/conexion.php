<?php
function crearconexionBD(){
        $hostDB="localhost";
        $nameDB="baloncesto";
        $userDB="root";
        $passwordDB="";
        $host=("mysql:host=$hostDB;dbname=$nameDB");
        try{
            $conexion=new PDO($host,$userDB,$passwordDB);
            $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e){
            $e->getMessage();
        }
        return $conexion;
    }
?>