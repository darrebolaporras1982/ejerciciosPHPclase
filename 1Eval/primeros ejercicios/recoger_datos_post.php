<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


    if(isset($_POST["Enviar"])){
        $email=$_POST["Email"];
        $nombre=$_POST["Nombre"];
        $apellido=$_POST["Apellido"];

        if(!empty($nombre)&&!empty($apellido)&&!empty($email)){
            echo "<h2>$nombre $apellido $email</h2>";
        }else{
           echo"No has introducido algun campo";
        } 
      
    
}
?>
</body>
</html>