<?php
session_start();
 if (!isset($_SESSION['usuario'])) {
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
    <form action="" method="post">
        <label for="">Titulo :</label>
        <input type="text" name="titulo" id="">
        <label for="">Autor :</label>
        <input type="text" name="autor" id="">
        <label for="">Disponible</label>
        <input type="radio" name="disponible" id="" checked value="1">Si
        <input type="radio" name="disponible" id="" value="0">No
        <input type="submit" value="Ingresar">
    </form>
    <?php echo "<a href='menu.php'>Volver al menu</a>"; ?>
</body>

</html>
<?php
if (isset($_POST["titulo"]) && isset($_POST["autor"]) && isset($_POST["disponible"])) {
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $disponible = $_POST["disponible"];

    if (empty($titulo) || empty($autor)) {
        echo "<h2 style='color:red'>Para añadir un libro, los campos deben estar completados</h2>";
    } else {
        include("conexion.php");
        $conexion = crear_conexion();
        //compruebo que el libro que queremos añadir no esta en la bd
        $sql = "SELECT * FROM libros WHERE titulo LIKE :titulo AND autor LIKE :autor;";
        $stmtprueba = $conexion->prepare($sql);
        $stmtprueba->bindParam(":titulo", $titulo);
        $stmtprueba->bindparam(":autor", $autor);
        $stmtprueba->execute();
        $filasAfectadas = $stmtprueba->rowCount();
        if ($filasAfectadas != 0) {
            echo "<h2>El libro que deseas añadir ya esta en la base de datos</h2>";
        } else {
            //preparo la consulta
            $consulta = "INSERT INTO libros (TITULO,AUTOR,DISPONIBLE) VALUES (:titulo,:autor,:disponible);";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":titulo", $titulo);
            $stmt->bindParam(":autor", $autor);
            $stmt->bindParam(":disponible", $disponible);
            $stmt->execute();
            //si se ha insertado correctamente
            $resultado=$stmt->rowCount();
            if($resultado==0){
                echo "<h2>No se ha realizado la insercion del libro</h2>";
            }else{
                echo "<h2>El libro se ha ingresado correctamente el la BBDD</h2>";
            }
        }
    }
} //llave del primer isset
?>