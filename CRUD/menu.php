<?php 
session_start();
//si exiten los campos nombre y contraseña
if(isset($_POST["nombre"]) && isset($_POST["password"])){
    //los metemos en variables
    $usuario=$_POST["nombre"];
    $contra=$_POST["password"];
    //comprobamos que no estan vacias

    //si esta alguna vacia no se puede entrar y te redirige al login
    if(empty($usuario)||empty($contra)){
        echo "<h2>No puedes dejar los campos del login vacios</h2>";
        echo "<a href='login.php'>Volver</a>";

        //si no esta ninguna vacia
    }else{
        //incluimos el archivo que contiene la conexion y la creamos
        include("conexion.php");
        $conexion=crear_conexion();

        //creamos y preparamos la consulta
        $consulta="SELECT * FROM usuarios WHERE binary nombre_usuario = :user AND binary contrasena = :contra";
        $stmt=$conexion->prepare($consulta);
        $stmt->bindParam(":user",$usuario);
        $stmt->bindParam(":contra",$contra);
        $stmt->execute();
        //obtenemos las filas afectadas por la consulta
        $fila=$stmt->rowCount();
        //si hay resultados
        if($fila>0){
            //iniciamos la sesion con el nombre y la contraseña, mostramos el menu
            $_SESSION["usuario"]=$_POST["nombre"];
            $_SESSION["password"]=$_POST["password"];
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <form action="nuevo.php" method="post">
                    <input type="submit" value="Nuevo">
                    <input type="submit" formaction="buscar.php" value="Buscar">
                    <input type="submit" formaction="consultar.php" value="Consulta">
                    
                </form>
                
            </body>
            </html>
            <?php
            echo "<a href='login.php'>Salir</a>";
        }else{
            //no tiene acceso
            echo "<h2>Usuario o contraseña no reconocidos</h2>";
            echo "<a href='login.php'>Volver</a>"; 
        }
    }
    }else{
        if(isset($_SESSION["usuario"])){
    ?>
     <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <form action="nuevo.php" method="post">
                    <input type="submit" value="Nuevo">
                    <input type="submit" formaction="buscar.php" value="Buscar">
                    <input type="submit" formaction="consultar.php" value="Consulta">
                    
                </form>
                
            </body>
            </html>
            <?php
             echo "<a href='login.php'>Salir</a>";
        }else{
            header("Location : login.php");
        }
    }
?>