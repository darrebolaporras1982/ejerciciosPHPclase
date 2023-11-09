<?php
//iniciamos la sesion 
session_start();
//incluimos la carpeta de funciones
include("funciones.php");

//si no existe la sesion
if(!isset($_SESSION["admin"])){
    //requerimos la barra de navegacion corresppondiente
    require("./nav/sinSesion.php");
}else{
    // sino 
    require("./nav/conSesion.php");
   
    // esto viene de la pagina de iniciar sesion
    // si ha realizado correctamente aparede un mensaje
    $mensaje=$_SESSION["mensaje"];
    echo $mensaje;
    $_SESSION["mensaje"]=null;
}
?>      
</body>
</html>