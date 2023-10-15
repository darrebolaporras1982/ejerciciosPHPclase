<?php
session_start();
include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Vas a borrar Un libro</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Buscamos el código que nos ha pasado el formulario
        $codigo = array_search("Borrar", $_POST);
    
        if ($codigo !== false) {
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
    <form action="consultar.php" method="post">
        <input type="submit" value="Confirmar" formaction="borrado.php">
        <input type="submit" value="Abortar" formaction="consultar.php">
        <input type="hidden" name="codigo" value="<?php echo $codigo?>">
    </form>
</body>
</html>