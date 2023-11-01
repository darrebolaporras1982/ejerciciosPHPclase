<?php
session_start();
include("conexion.php");
if(isset($_POST["borrado"])){
    try{

        $conexionborrado=crear_conexion();
        $consultaBorrado="DELETE FROM libros WHERE codigo=:codigo;";
        $stmtBorrado=$conexionborrado->prepare($consultaBorrado);
        $stmtBorrado->bindParam(":codigo",$_SESSION["cod"]);
        $stmtBorrado->execute();
    }catch(Exception $e){
        echo $e->getMessage();
    }
    if(empty($e)){
        echo "<h2>Borrado con exito</h2>";
        echo "<a href='consultar.php'>Volver</a>";
    }
}

?>