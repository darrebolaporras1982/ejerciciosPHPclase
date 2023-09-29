<?php

    $dbHost="localhost";

    $dbNombre="db_biblioteca";
    $dbUsusario="root";
    $dbPassword="";
    $hostPDO="mysql:host=$dbHost;dbname=$dbNombre;";

    try{
        $conexion=new PDO($hostPDO,$dbUsusario,$dbPassword);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "se ha realizado la conexion";
    }catch (PDOException $e){
        echo "No se ha podido conectar a la base de datos";
        exit;
    }

?>