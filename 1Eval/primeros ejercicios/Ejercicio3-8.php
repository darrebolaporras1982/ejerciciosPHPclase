<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

use function PHPSTORM_META\type;

    if(!($_SERVER["REQUEST_METHOD"]==="POST")){
?>

    <h1>Datos de Alumnos</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="Nombre">Nombre :<input type="text" name="nombre" id="nombre"></label><br>
        <label for="Apellido">Apellido : <input type="text" name="apellido" id="apellido"></label><br>
        <label for="Edad">Edad : <input type="text" name="edad" id="edad"></label><br>
        <label for="Archivo">Archivo : <input type="file" name="file" id="file"></label><br>
        <input type="submit" value="Enviar" name="enviar">
    </form>

<?php
    }else{
        if(isset($_POST["enviar"])){
            $nombre=$_POST["nombre"];
            $apellido=$_POST["apellido"];
            $edad=$_POST["edad"];
            $imagen=$_FILES["file"];
            $nom=$imagen['name'];
            $destino="./img/".$nombre.".jpg";
            move_uploaded_file($imagen["tmp_name"],$destino);
            foreach($imagen as $clave=>$valor){
                echo "En $clave tiene un valor de $valor"."<br>";
            }
            echo "Nombre $nombre<br>";
            echo "Apellido $apellido<br>";
            echo "Edad $edad<br>";
            echo"<img src=$destino>";
            
        }
    }

?>


</body>
</html>