<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    /* Muestra por pantalla todos los números pares entre 5 y 50 separados
    por comas.
    Deberas de insertar código html */

    $i=5;
    for($i;$i<51;$i++){
        if($i%2==0){
            echo "$i<br> ";
        }
    }

    ?>
</body>
</html>