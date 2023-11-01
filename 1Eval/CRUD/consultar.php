<?php
    if(!isset($_SESSION["usuario"])){
        header("location : login.php");
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
    <?php
    include("conexion.php");
    $conexion=crear_conexion();

    $consulta="SELECT * FROM LIBROS;";
    $stmt=$conexion->prepare($consulta);
    $stmt->execute();
    $resultado=$stmt->rowCount();
    if($resultado==0){
        echo "<h2>La tabla se encuentra vacía</h2>";
    }else{
        echo"<form action='modificar.php' method='post'><table border=1><thead><th>Codigo</th><th>Titulo</th><th>Autor</th><th>Disponible</th><th colspan='2'>Accion</th></thead>";
        $filas=$stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($filas as $fila){
            echo "<tr><td>".$fila['codigo']."</td><td>".$fila['titulo']."</td><td>".$fila['autor']."</td><td>".$fila['disponible']."</td><td><button type='submit' name='Modificar' formaction='modificar.php' value='".$fila['codigo']."'>Modificar</button></td><td><button type='submit' name='borrar' formaction='borrar.php' value='".$fila['codigo']."'>Borrar</button></td></tr>  ";
        }
        echo "</table></form>";
        echo "<a href='menu.php'>Volver al Menú</a>";
    }
?> 
</body>
</html>