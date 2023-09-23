<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
</head> 
 <?php
     
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        
        if(empty($nombre)||empty($apellido)){
            echo "debes introducir los don campos";
        }else{
            echo "<h2>Bienvenido $nombre $apellido, Ongi Etorri</h2>";
        }
    
    ?>
<body>

</body>
</html>





   



