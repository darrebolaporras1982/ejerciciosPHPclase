<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!(isset($_POST["envia"]))){
?>
   

    <h1>Formulario con ficheros</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="File">File</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="Enviar" name="envia">
    </form>
    <?php
    }else{
        foreach($_FILES["file"] as $clave=>$valor){
            echo "la clave es $clave y su valor es $valor <br>";
        }
        $tamaño=$_FILES["file"]["size"];
        if($tamaño<500){
            echo "Error en el tamaño del archivo";
        }else{
            echo"Se ha subido correctamente";
        }

}


?>
</body>
</html>