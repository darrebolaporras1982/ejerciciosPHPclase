<?php
if((isset($_POST["usuario"])&&!empty($_POST["usuario"]))&&(isset($_POST["passW"])&&!empty($_POST["passW"]))){
    $usuario=$_POST["usuario"];
    $password=$_POST["passW"];

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

session_destroy();
?>
<?php

}else{
    echo "debe rellenar los dos campos para entrar";
}

?>

























<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylemenu.css">
</head>
<body>
<h1>*****BIBLIOTECA*****</h1>
<div class="contenedor">
<input type="button" value="Insertar nuevo libro" name="insertar">
<input type="button" value="Consulta de libro" name="consultar">
<input type="button" value="Buscador de libro" name="buscar">
</div>
</body>
</html>

