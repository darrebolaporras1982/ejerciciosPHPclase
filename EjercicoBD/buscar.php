<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Libro</title>
    <link rel="stylesheet" href="buscar.css">
</head>
<body>
    <h1>Buscar Libro</h1>
    <div class="container">
        <form action="" method="post">
            <label for="titulo">Titulo : <input type="text" name="titulo" id="titulo"></label>
            <label for="autor">Autor : <input type="text" name="autor" id="autor"></label>
            <input type="submit" value="Buscar" id="buscar">
        </form>
    </div>
    <?php
    if (isset($_POST["titulo"])) {
        $titulo = $_POST["titulo"];
    }
    if (isset($_POST["autor"])) {
        $autor = $_POST["autor"];
    }
    if (empty($titulo) && empty($autor)) {
        echo "No pueden estar ambos campos vacíos a la hora de buscar";
    } else if (empty($titulo)) {
        // Variables de conexión
        $dbHost = "localhost";
        $dbNombre = "db_biblioteca";
        $dbUsuario = "root";
        $dbPassword = "";

        // Para utilizar PDO hace falta especificar el nombre de la base de datos y el servidor
        $hostPDO = "mysql:host=$dbHost;dbname=$dbNombre;";
        
        try {
            // Creo la conexión
            $conexion = new PDO($hostPDO, $dbUsuario, $dbPassword);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = "SELECT * FROM LIBROS WHERE AUTOR LIKE :texto";
            $stmt = $conexion->prepare($consulta);
            $nuevoO="%$autor%";
            $stmt->bindParam(':texto', $nuevoO);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($resultado == null) {
                echo "<h2>No hay libros que mostrar</h2>";
            } else {
                foreach ($resultado as $valor) {
                    echo "Codigo--> " . $valor[0] . "  --Titulo :" . $valor[1] . "  --Autor : " . $valor[2] . "  --Disponible --> " . $valor[3] . "<br>";
                }
            }
            $conexion = null;
        } catch (Exception $e) {
            echo "Imposible conectar con la base de datos";
        }
    } else if (empty($autor)) {
        // Variables de conexión
        $dbHost = "localhost";
        $dbNombre = "db_biblioteca";
        $dbUsuario = "root";
        $dbPassword = "";

        // Para utilizar PDO hace falta especificar el nombre de la base de datos y el servidor
        $hostPDO = "mysql:host=$dbHost;dbname=$dbNombre;";
        
        try {
            // Creo la conexión
            $conexion = new PDO($hostPDO, $dbUsuario, $dbPassword);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = "SELECT * FROM LIBROS WHERE TITULO LIKE :texto";
            $stmt = $conexion->prepare($consulta);
            $nuevo = "%$titulo%";
            $stmt->bindParam(':texto', $nuevo);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($resultado == null) {
                echo "<h2>No hay libros que mostrar</h2>";
            } else {
                foreach ($resultado as $valor) {
                    echo "Codigo--> " . $valor['codigo'] . "  --Titulo :" . $valor['titulo'] . "  --Autor : " . $valor['autor'] . "  --Disponible --> " . $valor['disponible'] . "<br>";
                }
            }
            $conexion = null;
        } catch (Exception $e) {
            echo "Imposible conectar con la base de datos";
        }
    } else {
        // Variables de conexión
        $dbHost = "localhost";
        $dbNombre = "db_biblioteca";
        $dbUsuario = "root";
        $dbPassword = "";

        // Para utilizar PDO hace falta especificar el nombre de la base de datos y el servidor
        $hostPDO = "mysql:host=$dbHost;dbname=$dbNombre;";
        
        try {
            // Creo la conexión
            $conexion = new PDO($hostPDO, $dbUsuario, $dbPassword);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $consulta = "SELECT * FROM LIBROS WHERE TITULO LIKE :titulo AND AUTOR LIKE :autor";
            $stmt = $conexion->prepare($consulta);
            $nuevoT = "%$titulo%";
            $nuevoA="%$autor%";
            $stmt->bindParam(':titulo',$nuevoT);
            $stmt->bindParam(':autor',$nuevoA);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($resultado == null) {
                echo "<h2>No hay libros que mostrar</h2>";
            } else {
                foreach ($resultado as $valor) {
                    echo "Codigo--> " . $valor[0] . "  --Titulo :" . $valor[1] . "  --Autor : " . $valor[2] . "  --Disponible --> " . $valor[3] . "<br>";
                }
                echo "<h2>Deseas Hacer otra busqueda?<a href='buscar.php'>Si</a></h2><br>";
                echo "<h2>Volver al menu<a href='menu.php'>Volver</a></h2>";
            }
            $conexion = null;
        } catch (Exception $e) {
            echo "Imposible conectar con la base de datos";
        }
    }
    ?>
</body>
</html>
