<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Libro</title>
    <link rel="stylesheet" href="nuevo.css">
</head>
<body>
    <h2>Alta de Libro</h2>
    <div class="container">
        <form action="" method="post">
            <label for="titulo">Titulo : <input type="text" name="titulo" id="titulo"></label>
            <label for="autor">Autor : <input type="text" name="autor" id="autor"></label>
            <label for="disponible">Disponible ?</label>
            <div class="radio">
                <input type="radio" name="disponible" id="si" value="1" checked>Si
                <input type="radio" name="disponible" id="no" value="0">No
            </div>
            <input type="submit" value="Guardar" id="guardar">
        </form>
    </div>

    <?php
    // Verificar si se envió el formulario
    if (isset($_POST["titulo"]) && isset($_POST["autor"]) && isset($_POST["disponible"])) {
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $disponible = $_POST["disponible"];

        // Variables de conexión
        $dbHost = "localhost";
        $dbNombre = "db_biblioteca";
        $dbUsuario = "root";
        $dbPassword = "";

        try {
            $hostPDO = "mysql:host=$dbHost;dbname=$dbNombre;";
            $conexion = new PDO($hostPDO, $dbUsuario, $dbPassword);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verificar si el libro ya existe
            $consulta = "SELECT * FROM LIBROS WHERE TITULO = :titulo AND AUTOR = :autor";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":titulo", $titulo);
            $stmt->bindParam(":autor", $autor);
            $stmt->execute();
            $fila = $stmt->fetch();

            if ($fila != null) {
                echo "Ese libro ya se encuentra en la Base de datos";
            } else {
                // Insertar el libro de forma segura
                $consultaInsertar = "INSERT INTO LIBROS (autor, titulo, disponible) VALUES (:autor, :titulo, :disponible)";
                $stmtInsertar = $conexion->prepare($consultaInsertar);
                $stmtInsertar->bindParam(":autor", $autor);
                $stmtInsertar->bindParam(":titulo", $titulo);
                $stmtInsertar->bindParam(":disponible", $disponible);
                $stmtInsertar->execute();
                
                echo "Se ha insertado el libro correctamente";
                echo"<a href='menu.php'>volver al menu</a>";
            }
            
            // Cerrar la conexión
            $conexion = null;
        } catch (Exception $e) {
            echo "Error en la conexión a la base de datos db_Biblioteca: " . $e->getMessage();
        }
    }
    ?>

    <!-- Mostrar tabla de libros -->
    <?php
     $dbHost = "localhost";
     $dbNombre = "db_biblioteca";
     $dbUsuario = "root";
     $dbPassword = "";
    try {
        $hostPDO = "mysql:host=$dbHost;dbname=$dbNombre;";
        $conexionTabla = new PDO($hostPDO, $dbUsuario, $dbPassword);
        $conexionTabla->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consultaTabla = "SELECT * FROM LIBROS;";
        $stmtTabla = $conexionTabla->prepare($consultaTabla);
        $stmtTabla->execute();
        $filas = $stmtTabla->fetchAll(PDO::FETCH_ASSOC);

        if ($filas == null) {
            echo "No hay registros";
        } else {
            echo "<h1>Consulta de Libros</h1><br>";
            echo "<h2 id='titulo_tabla'>BIBLIOTECA</h2><br>";
            echo "<div class='container2'><br>";
            echo "<table id='tabla_libros'><br>";
            echo "<thead><tr><td>Código</td><td>Título</td><td>Autor</td><td>Disponible</td><td>Modificar</td><td>Borrar</td></tr></thead>";
            foreach ($filas as $indice) {
                echo "<tr>";
                echo "<td>" . $indice["codigo"] . "</td>";
                echo "<td>" . $indice["titulo"] . "</td>";
                echo "<td>" . $indice["autor"] . "</td>";
                echo "<td>" . $indice["disponible"] . "</td>";
                echo "<td><input type='button' value='Modificar' id='modificar'></td>";
                echo "<td><input type='button' value='Borrar' id='borrar'></td>";
                echo "</tr>";
            }
            echo "</table></div>";
        }
    } catch (Exception $e) {
        echo "Error al conectarse a la base de datos para mostrar la tabla";
    }
    ?>
</body>
</html>
