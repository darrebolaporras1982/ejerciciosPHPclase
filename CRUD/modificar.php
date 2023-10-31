<?php
session_start();
  include("conexion.php");
if (isset($_POST["Modificar"])) {
    $_SESSION["codigo"] = $_POST["Modificar"];
   

    
    $conexion = crear_conexion();

    $consulta = "SELECT * FROM libros WHERE codigo=:codigo;";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(":codigo", $_SESSION["codigo"]);
    $stmt->execute();

    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<h1>Vas a Modificar los datos de la base de datos:</h1>";
    echo "<h3>" . $fila["titulo"] . "---" . $fila["autor"] . "---" . $fila["disponible"] . "</h3>";
    $conexion = null;

    echo'<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    
    <body>
    
    <form action="modificar.php" method="post">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="">
        <label for="autor">Autor</label>
        <input type="text" name="autor" id="">
        <input type="radio" name="disponible" value="1">Si
        <input type="radio" name="disponible" value="2">No
        <input type="submit" value="Cambiar">
        <a href="consultar.php">Salir sin modificar</a>
    </form>';
}
    
    if (isset($_POST["titulo"]) && isset($_POST["autor"]) && isset($_POST["disponible"])) {
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $disponible = $_POST["disponible"];
        
        
        
        if ((empty($titulo)) && (empty($autor)) && (empty($disponible))) {
            echo "<h3>Rellena algun campo que quieres cambiar</h3>";
            echo "<a href='consultar.php'>Salir sin cambiar</a>";
        } else {
            if (!empty($titulo)) {
              
                $conexion2 = crear_conexion();
                $consulta2 = "UPDATE libros SET titulo=:titulo WHERE codigo=:codigo;";
                $stmt2 = $conexion2->prepare($consulta2);
                $stmt2->bindParam(":titulo", $titulo);
                $stmt2->bindParam(":codigo", $_SESSION["codigo"]);
                $stmt2->execute();
                $resultado=$stmt2->rowCount();
                echo ($resultado>0) ? "<h2>Cambio realizado</h2>" : "<h2>no se han realizado cambios</h2>"; 
                echo "<a href='consultar.php'>Volver a la tabla</a>";
                $conexion2 = null;
            }
            if (!empty($autor)) {
    
                $conexion3 = crear_conexion();
                $consulta3 = "UPDATE libros SET autor=:autor WHERE codigo=:codigo;";
                $stmt3 = $conexion3->prepare($consulta3);
                $stmt3->bindParam(":auto", $autor);
                $stmt3->bindParam(":codigo", $_SESSION["codigo"]);
                $stmt3->execute();
                $resultado=$stmt3->rowCount();
                echo ($resultado>0) ? "<h2>Cambio realizado</h2>" : "<h2>no se han realizado cambios</h2>"; 
                echo "<a href='consultar.php'>Volver a la tabla</a>";
                $conexion3 = null;
            }
            if (!empty($disponible)) {

                if(strcmp($disponible,"2")==0){
                    $disponible=0;
                }else{
                    $disponible=1;
                }

                try {
                    $conexion4 = crear_conexion();
                $consulta4 = "UPDATE libros SET disponible=:disponible WHERE codigo=:codigo;";
                $stmt4 = $conexion4->prepare($consulta4);
                $stmt4->bindParam(":disponible", $disponible);
                $stmt4->bindParam(":codigo", $_SESSION["codigo"]);
                $stmt4->execute();
                
                $resultado=$stmt4->rowCount();
                echo ($resultado>0) ? "<h2>Cambio realizado</h2>" : "<h2>no se han realizado cambios</h2>"; 
                echo "<a href='consultar.php'>Volver a la tabla</a>";
                $conexion4 = null;
                } catch (Exception $e) {
                    $e->getMessage();
                }
                
                
            }
        }
    }
    ?>
</body>

</html>