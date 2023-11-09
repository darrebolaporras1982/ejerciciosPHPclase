<?php
session_start();
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     require("navConSesion.php");
     ?>
     <div class="contenedor">
        <?php 
            if(isset($_SESSION["mensaje"])){
                $mensaje=$_SESSION["mensaje"];
                echo $mensaje;
                $_SESSION["mensaje"]=null;
            }
           

        ?>
        <form action="guardarjugadores.php" method="post" enctype="multipart/form-data">
            <label for="">Nombre</label>
            <input type="text" name="nombre" id="">
            <label for="">Posicion</label>
            <input type="radio" name="posicion" value="Base" checked>Base
            <input type="radio" name="posicion" value="Escolta">Escolta
            <input type="radio" name="posicion" value="Alero">Alero
            <input type="radio" name="posicion" value="Pivot">Pivot
            <input type="file" name="imagen" id="">
            <select name="equipos" id="">
        <?php
            $conexion = crearconexionBD();
            $consulta = "SELECT nombre_equipo from equipos;";
            $stmt = $conexion->prepare($consulta);
            $stmt->execute();
            $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($fila as $valor) {
                echo "<option>" . $valor["nombre_equipo"] . "</option>";
            }
            
            $conexion = null;
        ?>
            </select>
            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar campos">
        </form>
     </div>
    
</body>
</html>