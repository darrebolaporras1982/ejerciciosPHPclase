<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
 /* Diseña un programa que contenga 3 variables, $nombre1, $nombre2
    y $nombre3.
    ● El programa mostrará un mensaje de bienvenida si el nombre
    de esa persona es “Elisabet” o si sus apellidos son “Lekue
    Alkorta”
    ● En caso contrario mostrará el mensaje “Acceso denegado”. */

    $nombre1="Elisabet";
    $nombre2="Lekue";
    $nombre3="Alkorta";

    if(($nombre1=="Elisabet")&&($nombre2=="Lekue")&&($nombre3=="Alkorta")){
        echo "<h3>Bienvenida $nombre1 $nombre2 $nombre3</h3>";
    }else{
        echo "No tienes Acceso!";
    }


?>
</body>
</html>