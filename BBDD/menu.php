<?php

if((isset($_POST["usuario"])&&!(empty($_POST["usuario"])))&&(isset($_POST["passW"]))&&!(empty($_POST["passW"]))){
    $usuario=$_POST["usuario"];
    $password=$_POST["passW"];
}else{
    echo "no se puede continuar con algun campo vacio";
    echo "<a href='index.html'>Volver al Logearse</a>";
}

include("conexion.php");

$consulta="select nombre_usuario,contrasena from usuarios where nombre_usuario = '$usuario' and contrasena = '$password'";


?>