<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location: login.php");
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
    <form action="#" method="post">
        <label for="titulo">Titulo :</label>
        <input type="text" name="titulo" id="">
        <label for="Autor">Autor :</label>
        <input type="text" name="autor" id="">
        <input type="submit" value="Buscar">
    </form>
    
</body>
</html>
<?php

    if(isset($_POST["titulo"])&&isset($_POST["autor"])){
        $titulo=$_POST["titulo"];
        $autor=$_POST["autor"];
        //si los campos de texto estan vacios, mostrará un mensaje de que uno de los campos debe estar compeltado
        if(empty($titulo)&&empty($autor)){
            echo "<h2>Introduce un titulo o un autor para poder buscar</h2>";
            //si el titulo esta vacio, buscaremos por autor
        }else if(empty($titulo)){
            include("conexion.php");
            $conexion=crear_conexion();
            //preparo la consulta de busqueda por autor
            $consultaAutor="SELECT * FROM libros WHERE autor like :autor;";
            $stmtA=$conexion->prepare($consultaAutor);
            $stmtA->bindParam(":autor",$autor);
            $stmtA->execute();
            $resultado=$stmtA->rowCount();
            if($resultado==0){
                echo "<h2>No se han encontrado libros de ese autor</h2>";
            }else{
                $fila=$stmtA->fetchAll(PDO::FETCH_ASSOC);
                foreach($fila as $campo=>$valor){
                    echo $valor["codigo"]." - ".$valor["titulo"]." - ".$valor["autor"]." - ".$valor["disponible"]."<br>";
                }
            }
        }else if(empty($autor)){
            include("conexion.php");
            $conexion=crear_conexion();
            //preparo la consulta de busqueda por titulo
            $consultaTitulo="SELECT * FROM libros WHERE titulo =:titulo;";
            $stmtT=$conexion->prepare($consultaTitulo);
            $stmtT->bindParam(":titulo",$titulo);
            $stmtT->execute();
            $resultado=$stmtT->rowCount();
            if($resultado==0){
                echo "<h2>No se han encontrado libros con ese titulo</h2>";
            }else{
                $fila=$stmtT->fetchAll(PDO::FETCH_ASSOC);
                foreach($fila as $campo=>$valor){
                    echo $valor["codigo"]." - ".$valor["titulo"]." - ".$valor["autor"]." - ".$valor["disponible"]."<br>";
                }
            }
        }
    }//llave del primer isset
    
    echo "<a href='menu.php'>Volver al menu</a><br>";
?>