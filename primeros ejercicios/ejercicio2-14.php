<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* Crea un array con valores numéricos
    Realiza la suma de todos los valores del array y guarda el
    resultado en una variable
    Muestra la suma en pantalla */

    $valores=array(3,234,23424,23,86,464,22,869,908,247);
    $sumatotal=0;
    $dimension=count($valores);
    for($i=0;$i<$dimension;$i++){
        $indice=$valores[$i];
        $sumatotal+=$indice;
    }
    echo "la suma total del array es $sumatotal";



?>
</body>
</html>