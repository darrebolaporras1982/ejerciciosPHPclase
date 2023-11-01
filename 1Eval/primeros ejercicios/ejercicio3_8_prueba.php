<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //empiezo el bloque de php
    //si no se ha enviado 
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
//Si se ha enviado
    }else{
        //si se ha utilizado el botun submit
        if(isset($_POST["enviar"])){
            //me to el nombre y el apellido de las cajas en variables
            $nombre=$_POST["nombre"];
            $apellido=$_POST["apellido"];
            //compruebo si esta alguna vacia
            if(empty($nombre)||empty($apellido)){
                echo "debes introducir los campos de nombre y apellido";
                //si no estan vacias compruebo la edad
            }else if(isset($_POST["edad"])){
                //pongo la edad en una variable
                $edad=$_POST["edad"];
                //compruebo que la variable no esta vacia
                if(empty($edad)){
                    echo "debes introducir la edad";
                }else{
                    //si todo lo anterior esta correcto proceso la img
                    //si se ha utilizado la insertar archivo
                    if(isset($_FILES["file"])){  
                        //compruebo que si la imagen pesa 0 o menos es que no hay imagen
                      $img=$_FILES["file"];
                      if($img["size"]<=0){
                        echo "no hay ninguna imagen subida";
                      }else{
                        $nomImg=$_FILES["file"]["name"];
                        $destino="./img/".$nomImg;
                        move_uploaded_file($_FILES["file"]["tmp_name"],$destino);
                        foreach($img as $clave=>$valor){
                            echo "el valor de $clave es $valor"."<br>";
                            }
                            echo "<img src='$destino'>";
                        }
                    }
                }
            }       
        }
    }
?>

</body>
</html>