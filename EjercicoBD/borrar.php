<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container_borrar">
        <form action="" method="post">
            <?php
            
            foreach ($_GET as $clave => $valor) {
                $codigo = $clave;
            }
            
            //creo las variables para la conexion
            $dbHost = "localhost";
            $dbNombre = "db_biblioteca";
            $dbUsusario = "root";
            $dbPassword = "";

            $title = null;
            $autorr = null;
            $dispons = null;
            //para utilizar PDO hace falta especificar cual sera el nombre de la base de datos y el servidor
            $hostPDO = "mysql:host=$dbHost;dbname=$dbNombre;";

            //creo el bloque try-catch para la conexion
            try {
                //creo la conexion
                $conexion = new PDO($hostPDO, $dbUsusario, $dbPassword);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //como no sabemos el boton de modificar que se ha pulsado, he pasado el codigo de la posicion.
                //hago primero un select para saber los datos

                $consultaSelect = "DELETE FROM LIBROS WHERE CODIGO=:codigo;";
                $stmt = $conexion->prepare($consultaSelect);
                $stmt->bindParam(":codigo", $codigo);
                $stmt->execute();
                echo "El borrado ha sido con exito!";
            }catch(Exception $e){
                echo "Error de conexion";
            }
            ?>
        </form>
    </div>
    <a href="consultar.php">Volver a consulta!!</a>
    <a href="menu.php">Volver al menu!!</a>

</body>

</html>