<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nuevo.css">
</head>
<body>
    <h2>Alta de Libro</h2>
    <div class="container">
        <form action="" method="post">
            <label for="">Titulo : <input type="text" name="titulo" id="titulo"></label>
            <label for="">Autor : <input type="text" name="autor" id="autor"></label>
            <label for="">Disponible ?</label>
            <div class="radio">
            <input type="radio" name="disponible" id="si" value="1" checked>Si
            <input type="radio" name="disponible" id="no" value="0">No
            </div>
            <input type="submit" value="Guardar" id="guardar">
        </form>
    </div>

    <?php
    //creo una variable boolean para saber si el libro que quiero introducir esta dentro de la la lista
    $existe=false;
    if((isset($_POST["titulo"])&&!empty($_POST["titulo"]))&&(isset($_POST["autor"])&&!empty($_POST))){
        $titulo=$_POST["titulo"];
        $autor=$_POST["autor"];
        $radio=$_POST["disponible"];

          //creo las variables para la conexion
    $dbHost="localhost";
    $dbNombre="db_biblioteca";
    $dbUsusario="root";
    $dbPassword="";

     //para utilizar PDO hace falta especificar cual sera el nombre de la base de datos y el servidor
     $hostPDO="mysql:host=$dbHost;dbname=$dbNombre;";

     //realizamos la conexion con la base de datos
        try{
            $conexion=new PDO($hostPDO,$dbUsusario,$dbPassword);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $consulta="SELECT * FROM LIBROS WHERE TITULO = :titulo AND AUTOR= :autor;";
            $stmt=$conexion->prepare($consulta);
            $stmt->bindParam(":titulo",$titulo);
            $stmt->bindParam(":autor",$autor);
            $stmt->execute();
            $fila=$stmt->fetch();

            if($fila!=null){
                echo "Ese libro ya se encuentra en la Base de datos";
                $existe=true;
                $conexion=null;
                echo "<a href='nuevo.php'>Volver a intentar</a>";
            }else{
                $consultaInsertar="INSERT INTO LIBROS (autor,titulo,disponible)VALUES('$autor','$titulo','$radio')";
                $stmt2=$conexion->prepare($consultaInsertar);
                $stmt2->execute();
                $existe=false;
                
            }
            if(!$existe){
                echo "<h2> se ha insertado el libro correctamente</h2><br>";
                echo "<h3>Quieres insertar otro libro?<a href='nuevo.php'>  Insertar nuevo libro  </a></h3><br>";
                echo "<h3>Quieres Volver al menu inicial?<a href='menu.php#contenedor'>  Volver al Menú  </a></h3><br>";
                $conexion=null;
            }

        }catch(Exception $e){
            echo "error en la conexion a la base de datos db_Biblioteca";
            exit;
        }
    }





?>
</body>
</html>