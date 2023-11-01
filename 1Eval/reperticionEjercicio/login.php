<?php
session_start();
session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="menu.php" method="post">
        <label for="">Ususario :</label>
        <input type="text" name="usuario" id="usuario">
        <label for="">Contraseña :</label>
        <input type="password" name="contrasena" id="contrasena">
        <input type="submit" value="Entrar">
    </form>
</body>
</html>