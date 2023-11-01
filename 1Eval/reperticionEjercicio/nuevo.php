<?php
session_start();

if (isset($_POST["titulo"]) && isset($_POST["autor"]) && isset($_POST["disponible"])) {
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $disponible = $_POST["disponible"];

    if (!empty($titulo) && !empty($autor)) {

        include("functions.php");
        $conexion = crearConexion();

        //compruebo si existe en la base de datos
        $comprobacion = comprobarSiEsta($titulo, $autor);

        //la comprobacion nos devolvera falso si el libro no esta en la base de datos
        if (!$comprobacion) {
            $consulta = "INSERT INTO LIBROS (titulo,autor,disponible) VALUES (:titulo,:autor,:disponible);";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":titulo", $titulo);
            $stmt->bindParam(":autor", $autor);
            $stmt->bindParam(":disponible", $disponible);
            $stmt->execute();
        } else if($comprobacion) {
            echo "Ese libro ya se encuentra en la base de datos";
        }
    } else {
        echo "Los campos deben estar completados";
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
    <form action="" method="post">
        <label for="">Titulo :</label>
        <input type="text" name="titulo" id="">
        <label for="">Autor :</label>
        <input type="text" name="autor" id="">
        <label for="">Disponible :</label>
        <input type="radio" name="disponible" value="0" checked id="">No
        <input type="radio" name="disponible" value="1" id="">Si
        <input type="submit" value="Insertar">
    </form>
    <a href="menu.php">Volver al Menu</a><br>
    <a href="buscar.php">ir a buscar un libro</a><br>
    <a href="login.php">Salir</a><br>
</body>
</html>
