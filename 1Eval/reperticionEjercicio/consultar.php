<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="2">
        <form action="" method="post">
        <thead><td>CODIGO</td><td>TITULO</td><td>AUTOR</td><td>DISPONIBLE</td><td>MODIFICAR</td><td>BORRAR</td></thead>
        <?php
        //adjunto el archivo que tiene las funciones
        include("functions.php");

        //creo la conexion llamando a una funcion
        $conexion=crearConexion();

        //hago la consulta a la base de datos para saber si contine libros
        $consulta="SELECT * FROM LIBROS;";
        
        //preparamos la consulta
        $stmt=$conexion->prepare($consulta);
        
        //ejecutamos la consulta
        $stmt->execute();
        
        //la respuesta la almacenamos en una variable
        $resultado=$stmt->fetchAll();
        $total=count($resultado);
        if($total<=0){
            echo "<h2>No hay Resultados que mostrar en la consulta</h2>";
        }else{
            foreach($resultado as $valor){
                //en los botones incluyo en el name, el codigo para despues modificar en la consulta por codigo
                echo "<tr><td>".$valor['codigo']."</td><td>".$valor['titulo']."</td><td>".$valor['autor']."</td><td>".$valor['disponible']."</td><td><input type='submit' formaction='modificar.php' name='".$valor['codigo']."' value='Modificar'></td><td><input type='submit' formaction='borrar.php' name='".$valor['codigo']."'value='Borrar'></td></tr>";
            }
        }
        ?>
    </table>
    </form>
    
    <?php 
    echo "<a href='menu.php'>Volver</a><br>";
    echo "<a href='buscar.php'>ir a buscar un libro</a><br>";
    echo "<a href='login.php'>Salir</a>";
?>
</body>
</html>