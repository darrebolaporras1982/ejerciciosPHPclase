<?php
//iniciamos la sesion
session_start();

//primero comprobamos si hay una sesion abierta
//comprobamos que los datos pasados desde el formulario del login no estan vacios
if (isset($_POST["usuario"]) && (!empty($_POST["usuario"])) && (isset($_POST["contrasena"]) && (!empty($_POST["contrasena"])))) {
    $usuario = $_POST["usuario"];
    $contra = $_POST["contrasena"];

    //creo la conexion y la query para saber si el usuario y la contraseña se encuentran en la base de datos

    //incluyo el archivo que tiene la conexion y llamo a la funcion
    include("functions.php");

    $conexion = crearConexion();
    $consulta = "SELECT * FROM USUARIOS WHERE binary NOMBRE_USUARIO = :nombre and binary CONTRASENA = :contrasena;";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(":nombre", $usuario);
    $stmt->bindParam(":contrasena", $contra);
    $stmt->execute();
    $fila = $stmt->fetch();

    if (comprobarUsuario($fila)) {
        $_SESSION["usuario"] = $_POST["usuario"];
        $_SESSION["contrasena"] = $_POST["contrasena"];
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>

        <body>
            <form action="nuevo.php" method="get">
                <input type="submit" value="Nuevo">
                <input type="submit" formaction="consultar.php" value="Consultar">
                <input type="submit" formaction="buscar.php" value="Buscar">
            </form>

        </body>

        </html>
<?php
    } else {
        echo "<h2>No Tienes Acceso</h2>";

    }
} else {
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
            <form action="nuevo.php" method="get">
                <input type="submit" value="Nuevo">
                <input type="submit" formaction="consultar.php" value="Consultar">
                <input type="submit" formaction="buscar.php" value="Buscar">
            </form>
            <a href="login.php">Salir</a>

        </body>

        </html>
<?php
    } else {
        echo "No tienes Acceso";
        echo "<a href='Login.php'>Salir</a>";
    }
}
?>
