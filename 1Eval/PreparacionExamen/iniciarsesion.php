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
    if(!isset($_SESSION["admin"])){
        require("navIniciar.php");
    }else{
        require("navConSesion.php");
    }
?>

    <form action="iniciarsesion.php" method="post">
        <label for="">Usuario</label>
        <input type="text" name="usuario" id="">
        <label for="">Password</label>
        <input type="password" name="password" id="">
        <input type="submit" value="Iniciar Sesion">
        <button type="submit" name="volver" formaction="index.php">Volver a Inicio</button>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["usuario"])&&isset($_POST["password"])){
            $usuario=$_POST["usuario"];
            $pass=$_POST["password"];
                if(empty($usuario)||empty($pass)){
                    echo "<h3 style='color:red'>Ambos campos deben estar completados</h3>";
                }else{
                    $conexion=crearconexionBD();
                    $consulta="SELECT * FROM usuarios WHERE binary nombre = :usuario and binary password= :pass;";
                    $stmt=$conexion->prepare($consulta);
                    $stmt->bindParam(":usuario",$usuario);
                    $stmt->bindParam(":pass",$pass);
                    $stmt->execute();
                    $resultado=$stmt->rowCount();
                    if($resultado==0){
                        echo "<h3 style='color:red'>No tienes Acceso</h3>";
                    }else{
                        $_SESSION["admin"]=$_POST["usuario"];
                        header("Location: index.php");
                        exit;
                    }
                }
        }
    }//primer if de comprobación
    ?>

</body>
</html>