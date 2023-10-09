<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$dbHost="localhost";
$dbNombre="db_biblioteca";
$dbUsusario="root";
$dbPassword="";

//para utilizar PDO hace falta especificar cual sera el nombre de la base de datos y el servidor
$hostPDO="mysql:host=$dbHost;dbname=$dbNombre;";
 if (isset($_POST["Borrar"])) {
//creo el bloque try-catch para la conexion
try{
    //creo la conexion
  $conexion=new PDO($hostPDO,$dbUsusario,$dbPassword);
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $consultaBorrar = "DELETE FROM LIBROS WHERE CODIGO= :codigo;";

    $stmt = $conexion->prepare($consultaBorrar);
    $stmt->bindParam(":codigo", $codigo);
    $stmt->execute();
    echo "<h1>El borrado ha sido Exitoso</h1>";
} catch (Exception $e) {
echo " error al conectar";
}
$conexion = null;
 }
?>
</body>
</html>

