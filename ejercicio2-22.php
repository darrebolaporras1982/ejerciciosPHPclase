<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /* Diseña una función que recibe un parámetro por referencia y le 
        suma una unidad. 
        Realiza la prueba de la función mediante un ejemplo */

        function porReferencia(&$num){

            $num+=1;
            return $num;
        }
        echo porReferencia(5);
        
    ?>
</body>
</html>