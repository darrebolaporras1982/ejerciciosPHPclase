<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
  
</head>
<body>
 
    <?php 
    include("conexion.php");
    ?>
    <h1>*****BIBLIOTECA*****</h1>
    <div class="contenedor">
        <h2>LOGEAR</h2>
        <form action="conexion.php" method="post">
            <label for="">Usuario : <input type="text" name="usuario" id="usurio"></label>
            <label for="">Contraseña : <input type="password" name="passW" id="passW"></label>
            <input type="submit" value="Login" name="login" id="boton">
        </form>
    </div>
    
</body>
</html>