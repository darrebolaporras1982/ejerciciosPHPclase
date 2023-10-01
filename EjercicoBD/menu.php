<?php
session_start();

//comienzo el bloque de php
// compruebo el contenido de las variables
if((isset($_POST["usuario"])&&!empty($_POST["usuario"]))&&(isset($_POST["passW"])&&!empty($_POST["passW"]))){

    //creo las variables
    $usuario=$_POST["usuario"];
    $password=$_POST["passW"];
        
    //creo las variables para la conexion
    $dbHost="localhost";
    $dbNombre="db_biblioteca";
    $dbUsusario="root";
    $dbPassword="";

    //para utilizar PDO hace falta especificar cual sera el nombre de la base de datos y el servidor
    $hostPDO="mysql:host=$dbHost;dbname=$dbNombre;";
   
    //creo el bloque try-catch para la conexion
    try{
        //creo la conexion
        $conexion=new PDO($hostPDO,$dbUsusario,$dbPassword);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //creo la consulta para buscar en la tabla de usuarios el nombre y la contraseña que pusimos en el login
        $consulta="SELECT * FROM USUARIOS WHERE BINARY NOMBRE_USUARIO= :user AND BINARY CONTRASENA= :pass;";

        //preparamos la consulta con la conexion y la sentencia
        $stmt=$conexion->prepare($consulta);

        //asignamos las variables a los nombres asociados
        $stmt->bindParam(":user",$usuario);
        $stmt->bindParam(":pass",$password);

        //ejecutamos la sentencia
        $stmt->execute();

        //con que nos devuelva un resultado ya sabemos que esta dentro de la tabla, entonces le permitimos el acceso
        //sin no esta dentro de la tabla y el fetch devuelve null, es que no lo ha encontrado entonces lo redirigimos al login
        $resultado=$stmt->fetch();
        if($resultado==null){
            echo "<h2>Este usuario no tiene acceso a la biblioteca</h2>";
            echo "<a href='index.html'>Intentalo de nuevo</a>";
            $conexion=null;
        }else{
            $_SESSION['usuario']=$_POST['usuario'];
            $_SESSION['passW']=$_POST['passW'];
        
            ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylemenu.css">
   
</head>
<body>
<h1>*****BIBLIOTECA*****</h1>
<div class="contenedor">
<input type="button" value="Insertar nuevo libro" name="insertar" id="insertar1">
<input type="button" value="Consulta de libro" name="consultar" id="consultar1">
<input type="button" value="Buscador de libro" name="buscar" id="buscar1">
</div>
</body>
</html>
        <?php
        //las excepciones
        }$conexion=null;
    }catch (PDOException $e){
        echo "No se ha podido conectar a la base de datos";
        exit;
    }
    //si ha dejado algun campo del ligin sin rellenar
}else{
    $sesionUsuario=$_SESSION['usuario'];

    if(isset($sesionUsuario)){
   
  echo  '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="stylemenu.css">
   
        </head>
        <body>
        <h1>*****BIBLIOTECA*****</h1>
        <div class="contenedor">
        <input type="button" value="Insertar nuevo libro" name="insertar" id="insertar1">
        <input type="button" value="Consulta de libro" name="consultar" id="consultar1">
        <input type="button" value="Buscador de libro" name="buscar" id="buscar1">
        </div>
        </body>
</html>';
}
}

?>
 <script src="menu.js" defer></script>