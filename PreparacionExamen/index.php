<?php 
session_start();
session_destroy();

if(!isset($_SESSION["admin"])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>  
    <h2>Torneo de Baloncesto</h2>
   <?php require("navIniciar.php")?>
    <h2>Equipos del torneo</h2>
    <?php 
}else{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    
    <body>
    <h2>Torneo de Baloncesto</h2>
    <?php require("navConSesion.php");?>
        <h2>Equipos del torneo</h2>
        <?php
}
?>
</body>
</html>