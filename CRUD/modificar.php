<?php
session_start();

if (isset($_POST["Modificar"])) {
    $modificarCod = $_POST["Modificar"];
    include("conexion.php");
    $conexion = crear_conexion();
    $consulta = "SELECT * FROM libros WHERE codigo=:codigo;";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(":codigo", $modificarCod);
    $stmt->execute();

    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<h1>Vas a Modificar los datos de la base de datos:</h1>";
    echo "<h3>" . $fila["titulo"] . "---" . $fila["autor"] . "---" . $fila["disponible"] . "</h3>";
    $conexion = null;
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
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="">
        <label for="autor">Autor</label>
        <input type="text" name="autor" id="">
        <input type="radio" name="disponible" value="1">Si
        <input type="radio" name="disponible" value="0">No
        <input type="submit" value="Modificar">
        <a href="consultar.php">Salir sin modificar</a>
    </form>
    <?php
    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $disponible = $_POST["disponible"];

    if ((empty($titulo)) && (empty($autor)) && (empty($disponible))) {
        echo "<h3>Rellena algun campo que quieres cambiar</h3>";
        echo "<a href='consultar.php'>Salir sin cambiar</a>";
    } else {
        if (!empty($titulo)) {
            include("conexion.php");
            $conexion2 = crear_conexion();
            $consulta2 = "UPDATE libros SET titulo=:titulo WHERE codigo=:codigo;";
            $stmt2 = $conexion2->prepare($consulta2);
            $stmt2->bindParam(":titulo", $titulo);
            $stmt2->bindParam(":codigo", $codigo);
            $stmt2->execute();
            $conexion2 = null;
        }
        if (!empty($autor)) {
            include("conexion.php");
            $conexion3 = crear_conexion();
            $consulta3 = "UPDATE libros SET autor=:autor WHERE codigo=:codigo;";
            $stmt3 = $conexion3->prepare($consulta3);
            $stmt3->bindParam(":auto", $autor);
            $stmt3->bindParam(":codigo", $codigo);
            $stmt3->execute();
            $conexion3 = null;
        }
        if (!empty($disponible)) {
            include("conexion.php");
            $conexion4 = crear_conexion();
            $consulta4 = "UPDATE libros SET disponible=:disponible WHERE codigo=:codigo;";
            $stmt4 = $conexion4->prepare($consulta4);
            $stmt4->bindParam(":disponible", $disponible);
            $stmt4->bindParam(":codigo", $codigo);
            $stmt4->execute();
            $conexion4 = null;
        }
    }


    ?>
</body>

</html>