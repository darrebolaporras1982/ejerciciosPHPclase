<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Crea dos variables y realiza entre ellos las operaciones de suma, resta, multiplicación y división.
Guarda el resultado de cada operación en una variable distinta:  $suma, $resta etc…..
Sitúa el código dentro del html y muestra el resultado en pantalla -->
<?php

    $num1=2;
    $num2=3;

    $suma=$num1 + $num2;
    $resta=$num1 - $num2;
    $multiplicacion=$num1 * $num2;
    $division=$num1 / $num2;

    echo $suma . "<br>";
    echo $resta . "<br>";
    echo $multiplicacion . "<br>";
    echo $division . "<br>";

?>
</body>
</html>