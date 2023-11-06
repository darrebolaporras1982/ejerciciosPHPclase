
<?php
session_start();
//iniciamos la sesion 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
//incluimos la carpeta de funciones
include("conexion.php");

//si no existe la sesion
if(!isset($_SESSION["admin"])){
    //requerimos la barra de navegacion corresppondiente
    require("./vistas/sinsesion.php");
}else{
    // sino 
    require("./vistas/consesion.php");
}
?>    
<h2>GALERIA DE ARTE TXURDINAGA</h2>
<h3>En ésta galería de arte 
mostraremos diversas obras, que también podrás verlas en nuestro museo físico.</h3>

<?php
    //creo la conexion para mostar la imagen de inicio
    $conexion=creoConexion();
    //creo la consulta para mostrar la ultima imagen
    $consulta="SELECT * FROM cuadro ORDER BY cod_cuadro desc limit 1;";
    //preparo la consulta
    $stmt=$conexion->prepare($consulta);
    //ejecuto la consulta
    $stmt->execute();
    $fila=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //tengo los datos en el array $fila, y los muestro
    echo "<h3>Ultima Obra : ".$fila[0]["nom_cuadro"]."</h3>";
    echo "<img src='./Imagenes/".$fila[0]["foto_cuadro"]."'>";
       
var_dump($fila);

?>


<?php require("./vistas/footer.php"); ?>  
</body>
</html>
    
</body>
</html>