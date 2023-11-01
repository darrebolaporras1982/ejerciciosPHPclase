<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="consultar.css">
    <script src="consultar.js" defer></script>
</head>
<body>
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
        $tablaCount=count($filas);
        if ($filas == null) {
            echo "No hay registros";
        } else {
            echo "<h1>Consulta de Libros</h1><br>";
            echo "<h2 id='titulo_tabla'>BIBLIOTECA</h2><br>";
            echo "<div class='container2'><br>";
            echo "<form action='modificar.php' method='GET'>";
            echo "<table id='tabla_libros'><br>";
            echo "<thead><tr><td>Código</td><td>Título</td><td>Autor</td><td>Disponible</td><td>Modificar</td><td>Borrar</td></tr></thead>";
            foreach ($filas as $indice) {
                echo "<tr>";
                echo "<td>" . $indice["codigo"] . "</td>";
                echo "<td>" . $indice["titulo"] . "</td>";
                echo "<td>" . $indice["autor"] . "</td>";
                echo "<td>" . $indice["disponible"] . "</td>";
                echo "<td><input type='submit' formaction='modificar.php' value='Modificar' name=".$indice['codigo']."></td>";
                echo "<td><input type='submit' formaction='borrar.php' value='Borrar' name=".$indice['codigo']."></td>";
                echo "</tr>";
            }
            
            echo "</table></form></div>";
        }
    } catch (Exception $e) {
        echo "Error al conectarse a la base de datos para mostrar la tabla";
    }
    ?>
    <a href="menu.php">Volver al Menu!</a>
</body>
</html>