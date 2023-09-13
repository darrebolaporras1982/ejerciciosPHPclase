<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* Diseña un programa que muestre por pantalla la tabla de 
    multiplicar.
    ● Crearemos una variable $num y le daremos valor
    ● Mostraremos la tabla de multiplicar de dicho número. */

    $num=4;
    for($i=1;$i<11;$i++){
        $resultado=$num*$i;
        echo "$num" . " x " ."$i" . " = $resultado". "<br>";
    }
    ?>

</body>
</html>