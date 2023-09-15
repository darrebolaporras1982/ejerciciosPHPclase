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

        function sinReferencia($num){

            $num++;
            return $num;
            
        }

        $num=3;
        echo sinReferencia($num)."<br>";
        echo $num . "<br><br>";
//-------------------------------------------------------------------------------------------------------


        function conreferencia(&$numero){
            $numero+=$numero;
            return $numero;
        }

        $num2=3;
        echo conreferencia($num2) . "<br>";
        echo $num2;
 
    ?>
</body>
</html>