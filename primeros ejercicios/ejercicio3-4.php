<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- El primer fichero contendrá un radio button para seleccionar entre
5 colores. Los colores estarán en hexadecimal. -->
<?php


if(isset($_POST["Enviar"])) {
    if (isset($_POST["rojo"]) || isset($_POST["azul"]) || isset($_POST["verde"]) || isset($_POST["amarillo"]) || isset($_POST["gris"])) {
$rojo=$_POST["rojo"];
$azul=$_POST["azul"];
$verde=$_POST["verde"];
$amarillo=$_POST["amarillo"];
$gris=$_POST["gris"]; 

    $seleccion=$_POST["colores"];

    echo "has elegido $seleccion";
}
}
?>
<form action="" method="post">
<label for="seleciona">Selecciona colores:</label>
<br>
<br>
<label for="">rojo</label><input type="radio" name="colores" id="rojo" value="rojo"><br>
<label for="">azul</label><input type="radio" name="colores" id="azul" value="azul"><br>
<label for="">verde</label><input type="radio" name="colores" id="verde" value="verde"><br>
<label for="">amarillo</label><input type="radio" name="colores" id="amarillo" value="amarillo"><br>
<label for="">gris</label><input type="radio" name="colores" id="gris" value="gris"><br><br><br>
<input type="submit" value="Enviar" name="Enviar">
 </form>   
</body>
</html>