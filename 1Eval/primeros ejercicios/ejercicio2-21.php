<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /* Diseña una función que muestra la media aritmética de dos números 
        guardados en ambas variables. 
        Realiza la prueba de la función mediante un ejemplo */

        function media($num1,$num2){

            $resultado=($num1+$num2)/2;
            return $resultado;

        }

        echo media(4,6);


        function mediaArray($numeros){
            $cuantos=count($numeros);
            if($cuantos===0){
                return 0;
            }else{
                $total=array_sum($numeros);
                return "$total/$cuantos";
            }
        }

        //falta poner ejercicio de prueba
        $numeros=array(12,34,54,6,33,4,55);
        mediaArray($numeros);


    ?>

</body>
</html>