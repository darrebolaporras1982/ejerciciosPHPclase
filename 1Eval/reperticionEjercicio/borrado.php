<?php
include("functions.php");
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $codigo=$_POST["codigo"];
    

    $conexion=crearConexion();
    $consulta="DELETE FROM LIBROS WHERE codigo=:codigo;";
    $stmt=$conexion->prepare($consulta);
    $stmt->bindParam(":codigo",$codigo);
    $stmt->execute();

    echo "<h2>Borrado con Exito</h2>";
    echo "<a href='consultar.php'>Volver a consultas</a>";
    $conexion=null;
}
?>