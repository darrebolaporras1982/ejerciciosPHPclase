<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//iniciamos la sesion 
session_start();
//incluimos la carpeta de funciones
include("conexion.php");

//si no existe la sesion
if(!isset($_SESSION["admin"])){
    //requerimos la barra de navegacion corresppondiente
    require("./vistas/sinsesion.php");
}else{
    // sino 
    require("./vistas/consesion.php");
   
    // esto viene de la pagina de iniciar sesion
    // si ha realizado correctamente aparede un mensaje
    $mensaje=$_SESSION["mensaje"];
    echo $mensaje;
    $_SESSION["mensaje"]=null;
}
?>    
<?php require("./vistas/footer.php"); ?>  
</body>
</html>
    
</body>
</html>