<?php
    session_start();
    if(isset($_POST["borrar"])){
        $_SESSION["cod"]=$_POST["borrar"];

        include("conexion.php");
        //mostramos el libro que vamos a borrar
        $conexion=crear_conexion();

        //creamos la consulta
        $consulta="SELECT * FROM libros WHERE codigo = :codigo;";
        //preparamos la consulta con la conexion
        $stmt=$conexion->prepare($consulta);
        $stmt->bindParam(":codigo",$_SESSION["cod"]);
        $stmt->execute();
        $resultado=$stmt->rowCount();
        if($resultado==0){
            echo "<h2>Error al mostrar</h2>";
        }else{
            $fila=$stmt->fetch(PDO::FETCH_ASSOC);
            echo "<h2>Este es el libro que vas a borrar de la base de datos:</h2>";
            echo $fila["titulo"]."---".$fila["autor"];
            $conexion=null;
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            </head>
            <body>
            <form action="borrado.php" method="post">
            <h3>Seguro que deseas borrar??</h3>
            <button type="submit" name="borrado">Borrar</button>
            <button type="submit" name="salir" formaction="borrado.php">Salir</button>
            </form>
            </body>
            </html>
        <?php   
         
        }
    }
?>