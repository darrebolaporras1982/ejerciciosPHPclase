<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Informacion enviada</h1>
    <?php
$nombre=$_GET["nombre"];
$apellido=$_GET["apellido"];

echo"<h2>Ongi etorri $nombre $apellido</h2>";

echo "<a href='ejercicio3-1.php'>Rellene el formulario inicial</a>";


?>  
</body>
</html>