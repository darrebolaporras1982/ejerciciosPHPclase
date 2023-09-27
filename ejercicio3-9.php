<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<h1>Datos de Usuario</h1>
<form action="" method="get">

<label for="">Nombre: <input type="text" name="nombre" id=""></label>
<input type="submit" value="Buscar" name="buscar">


</form>

    <?php
/* Crea un formulario que solicite “nombre” al usuario.
Introduciremos ese nombre en una cookie y, una vez creada la
cookie, mostraremos los valores de dicha cookie por pantalla
 */
setcookie('usuario',$_GET['nombre'],time()+3600);


if(isset($_GET['nombre'])){
    $nombre=$_GET["nombre"];
   
    echo "<h2>Datos del Usuario</h2><br>";
    echo "bienvenida " . $_COOKIE["usuario"];
}

?>
</body>
</html>