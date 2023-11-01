<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Este ejercicio pretende ver las diferencias entre los operadores ++$a y $a++.
Crea, por tanto, dos variables a y b y, asigna primero a b=++a y luego a b=a++
Muestra los mensajes del valor de las variables y del resultado por pantalla -->
<?php

    $a=2;

    $resultado = ++$a; 

    echo $resultado . "<br>";

    $resultado= $a++;

    echo $a;
?>
</body>
</html>