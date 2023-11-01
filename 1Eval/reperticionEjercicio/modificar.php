<?php
session_start();

//Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Buscamos el código que nos ha pasado el formulario
    $codigo = array_search("Modificar", $_POST);

    if ($codigo !== false) {
        
        include("functions.php");
        //creamos la conexion 
        $conexion=crearConexion();
        //Mostramos el titulo que vamos a cambiar
        $query="SELECT * FROM LIBROS WHERE codigo =:codigo;";
        $stmt=$conexion->prepare($query);
        $stmt->bindParam(":codigo",$codigo);
        $stmt->execute();
        $fila=$stmt->fetch();
        echo "CÓDIGO -->".$fila['codigo'].", TITULO -->".$fila['titulo'].", AUTOR -->".$fila['autor'].", DISPONIBLE -->".$fila['disponible'];
        $conexion = null;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="modificado.php" method="post">
    <input type="text" name="tituloM" id="">
    <input type="text" name="autorM" id="">
    <input type="radio" name="disponibleM" value="1" checked>si
    <input type="radio" name="disponibleM" value="0">no
    <input type="submit" value="Modificar">
    <input type="hidden" name="codigo" value="<?php echo $codigo?>">
</form>
</body>
</html>


