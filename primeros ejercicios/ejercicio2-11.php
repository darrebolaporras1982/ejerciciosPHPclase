<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* Realiza el ejercicio 2.8 pero empleando , en este caso, la
    estructura while */
    $contador=1; 
    $num=1;
    $resultado=0;
    while($contador<11){
        $resultado=$num*$contador; 
       
        echo "$num x $contador = $resultado". "<br>";
        $contador++;
     }

    ?>
    
</body>
</html>