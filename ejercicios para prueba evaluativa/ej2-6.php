<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
/* Reescribe el siguiente programa utilizando la sentencia Switch en lugar de IF
    <?php
    $var = 2;
    if ($var ==1) {
    echo ‘$var es igual a 1’;
    } else if ($var ==2) {
    echo ‘$var es igual a 2’;
    } else if ($var ==3) {
    echo ‘$var es igual a 3’;
    } else {
    echo ‘$var no es igual ni a 1 ni a 2 ni a 3’;
    } */
    $numero=4;
    switch($numero){
        case 1:
            echo "$numero es igual a 1";
            break;
        case 2:
            echo "$numero es igual a 2"; 
            break;
        case 3:
            echo "$numero es igual a 2";
            break;
        default:
            echo "$numero no es ni 1, ni 2, ni 3";
    }


?>
</body>
</html>