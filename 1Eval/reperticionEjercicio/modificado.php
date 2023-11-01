<?php
session_start();
include("functions.php");

if ($_SERVER["REQUEST_METHOD"]==="POST"){
    $titulo = $_POST["tituloM"];
    $autor = $_POST["autorM"];
    $disponible = $_POST["disponibleM"];
    $codigoMod=$_POST['codigo'];

    if(empty($titulo)||empty($autor)){
        echo "Los campos deben estar rellenados. Modificacion Abortada";
        echo "<h3><a href='consultar.php'>Volver</a></h3>";
    }else{
        //Creas la conexión antes de ejecutar la consulta
        $conexion2 = crearConexion();

        $queryModificar = "UPDATE LIBROS SET titulo=:titulos , autor=:autors , disponible=:disponibles WHERE codigo=:codigos;";
        $stmt2 = $conexion2->prepare($queryModificar);
        $stmt2->bindParam(":titulos", $titulo);
        $stmt2->bindParam(":autors", $autor);
        $stmt2->bindParam(":disponibles", $disponible);
        $stmt2->bindParam(":codigos", $codigoMod);
        $stmt2->execute();
        echo "Se ha modificado el libro con código <span>" . $codigoMod . "</span>";
        echo "<h3><a href='consultar.php'>Volver</a></h3>";
        //Cerramos la conexión después de la consulta
        $conexion2 = null;
    }
    }

?>