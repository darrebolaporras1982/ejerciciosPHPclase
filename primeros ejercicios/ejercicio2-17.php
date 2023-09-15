<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* Siendo la matriz $frutas = array (“naranja”, “platano”);
    1) Inserta otros dos elementos (limon y manzana)
    mediante la función arra_push().*/
    $frutas = array ("naranja", "platano");
    array_push($frutas,"limon","manzana");
    print_r($frutas);




    ?>
</body>
</html>