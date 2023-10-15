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
<form action="" method="post">
                <label for="">Titulo</label>
                <input type="text" name="titulo" id="titulo">
                <label for="">Autor</label>
                <input type="text" name="autor" id="autor">
                <input type="submit" value="Buscar">
            </form>
</body>
</html>
    <?php
    include("functions.php");
    if(isset($_POST["titulo"])&&isset($_POST["autor"])){
        $titulo=$_POST["titulo"];
        $autor=$_POST["autor"];

        if(empty($titulo)&&empty($autor)){
            echo "<h2>Para realizar una busqueda, debes ingresar texto en uno de los campos o en los dos</h2>";
        }else if(empty($titulo)){
            $conexion=crearConexion();
            $autorr="%$autor%";
            $consulta="SELECT * FROM LIBROS WHERE AUTOR LIKE :autor;";
            $stmt=$conexion->prepare($consulta);
            $stmt->bindParam(":autor",$autorr);
            $stmt->execute();
            $fila=$stmt->fetchAll();
            if ($fila == null) {
                echo "<h2>No hay libros que mostrar</h2>";
            } else {
                echo "<table border=1>";
                foreach ($fila as $valor) {
                    echo "<tr><td>".$valor['codigo']."</td><td>".$valor['titulo']."</td><td>".$valor['autor']."</td><td>".$valor['disponible']."</td></tr>"; 
            }
              echo "</table>";
        }
        $conexion=null;
        echo "<a href='menu.php'>Volver al menu</a>";
    }else if(empty($autor)){
        $conexion=crearConexion();
        $tituloo="%$titulo%";
        $consulta="SELECT * FROM LIBROS WHERE TITULO LIKE :titulo;";
        $stmt=$conexion->prepare($consulta);
        $stmt->bindParam(":titulo",$tituloo);
        $stmt->execute();
        $fila=$stmt->fetchAll();
        if ($fila == null) {
            echo "<h2>No hay libros que mostrar</h2>";
        } else {
            echo "<table border=1>";
            foreach ($fila as $valor) {
                echo "<tr><td>".$valor['codigo']."</td><td>".$valor['titulo']."</td><td>".$valor['autor']."</td><td>".$valor['disponible']."</td></tr>"; 
        }
          echo "</table>";
    }
    $conexion=null;
    echo "<a href='menu.php'>Volver al menu</a>";
    }
    }else{
        echo "<a href='menu.php'>Volver al Menu</a><br>";
        echo "<a href='buscar.php'>ir a buscar un libro</a><br>";
        echo "<a href='login.php'>Salir</a>";
    }
        ?>