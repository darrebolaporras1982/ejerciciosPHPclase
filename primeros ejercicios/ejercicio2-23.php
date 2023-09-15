<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

     /* Diseña una función que calcule el IVA de un producto. La función
     tendrá dos parámetros, el precio y el IVA que hay que aplicarle. Éste
     segundo parámetro será opcional y su valor por defecto será del 21%.
     Realiza la prueba de la función mediante un ejemplo */

        function calculaIva ($precio,$iva=0.21){

            $preciototal=$precio+($precio*$iva);
            return $preciototal;
        }

        $pantalon=100;
        echo calculaIva($pantalon);
        




     ?>
</body>
</html>