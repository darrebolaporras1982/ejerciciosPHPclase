<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="nombre" id="">
        <input type="file" name="imagen" id="">
        <button type="submit" name="enviar">Subir</button>
    </form>
    <?php
        if(isset($_POST["enviar"])){
            $nombre=$_POST["nombre"];
            $img=$_FILES["imagen"];
            if($_FILES["imagen"]["size"]<=0){
                echo "<h2>No has subido imagen</h2>";
            }else{
                
            }
        }
    ?>
</body>
</html>