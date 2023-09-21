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
<form action="" method="post">
<h2>selecciona un color</h2>
<br>
<br>
<label for="">rojo</label><input type="radio" name="colores" id="rojo" value="rojo"><br>
<label for="">azul</label><input type="radio" name="colores" id="azul" value="azul"><br>
<label for="">verde</label><input type="radio" name="colores" id="verde" value="verde"><br>
<label for="">amarillo</label><input type="radio" name="colores" id="amarillo" value="amarillo"><br>
<label for="">gris</label><input type="radio" name="colores" id="gris" value="gris"><br><br><br>
<input type="submit" value="Enviar" name="Enviar">
 </form> 

<?php
//creo la condicion al pulsar el boton submit
  if(isset($_POST['colores'])) {
    //si se ha enviado el formulario meto el contenido en una variable
    $opcionSeleccionada = $_POST['colores'];
    //la imprimo por pantalla
    echo "Seleccionaste el color: " .$opcionSeleccionada."<br>";
    echo "<a href='ejercicio3-4.php'>"."quieres poner otro color"."</a>";

    //Si no ha seleccionado ninguna opcion saco mensaje informativo.
} else {
    echo "No seleccionaste  el color."."<br>";
    echo "<a href='ejercicio3-4.php'>"."quieres poner otro color"."</a>";
}
?>
</body>
</html>