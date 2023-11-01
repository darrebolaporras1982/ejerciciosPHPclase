<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

/* Crea una variable que represente la edad y compruebe si es mayor
que 18.
● En caso afirmativo el programa mostrará el mensaje “Acceso
permitido”.
● En caso de que sea menor, el mensaje “Eres menor de edad, no
puedes acceder de momento. */
$edad=20;
const mayoriaEdad=18;
    if($edad>=mayoriaEdad){
        echo"acceso permitido";
    }else{
        echo "Eres menor de edad, no puedes acceder de momento.";
    }
?>
</body>
</html>