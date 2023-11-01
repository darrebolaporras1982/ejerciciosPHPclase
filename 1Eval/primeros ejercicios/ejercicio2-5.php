<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* Guarda un número en una variable.
    ● Si el número está comprendido entre 0 y 10, se mostrará por
    pantalla. (Por ejemplo, el numero es 2).
    ● En caso contrario mostrará el mensaje: “El número no está
    comprendido entre 0 y 10. */
        $numero=6;
        if($numero>0 && $numero<10){
            echo $numero;
        }else{
            echo "El número no está
            comprendido entre 0 y 10.";
        }
    
    ?>
</body>
</html>