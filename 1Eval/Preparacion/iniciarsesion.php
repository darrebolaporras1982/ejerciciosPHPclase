<?php
//inicamos sesion
session_start();
//incluimos las funciones
include("funciones.php");

//ponemos la barra de navegacion correspondiente
if(!isset($_SESSION["admin"])){
    require("./nav/sinSesion.php");
}else{
    require("./nav/conSesion.php");
}
?>      
<form action="iniciarsesion.php" method="post">
    <label for="">Ususario : </label>
    <input type="text" name="user" id="">
    <label for="">PassWord : </label>
    <input type="password" name="pass" id="">
    <input type="submit" value="Iniciar">
</form>
<?php
    //si el usuario y la contraseña existen
    if(isset($_POST["user"])&&isset($_POST["pass"])){

        //metemos en variables los resultados
        $usuario=$_POST["user"];
        $contra=$_POST["pass"];

        //comprobamos si los campos estan vacios
        if(empty($usuario)||empty($contra)){
            echo"<h2>No puedes dejar campos vacios al registrarte</h2>";
        }else{
            //creamos la conexion
            $conexion=creoConexion();
            //creamos la consulta
            $consulta="SELECT * FROM usuarios WHERE BINARY nombre=:nombre AND binary password=:password;";
            //preparamos la consulta
            $stmt=$conexion->prepare($consulta);
            $stmt->bindParam(":nombre",$usuario);
            $stmt->bindParam(":password",$contra);
            //ejecutamos la consulta
            $stmt->execute();
            //comprobamos si ha habido cambios
            if($stmt->rowCount()>0){
                //si los ha habido, es que el usuario esta en la base de datos
                //sacamos un mesaje en index
                $mensaje="<h3 style='color:green'>Bienvenido a tu sesion</h3>";
                //iniciamos la sesion de usuario registrado
                $_SESSION["admin"]=$usuario;
                $_SESSION["mensaje"]=$mensaje;
                header("Location: index.php");
                exit;
            }else{
                //mostramos el mensaje de que no esta en la base de datos
                echo"<h2 style='color:red'>Error, Usuario NO registrado</h2>";
            }
        }
    }

?>
</body>
</html>