<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /* Define un array cuyas claves serán de un sólo carácter,
        desde el caracter ‘a’ hasta el caracter ‘f’
        En la misma definición, asigna a cada uno de éstos índices
        un valor, que será un nombre de persona que comience
        por ese caracter, por ejemplo (‘a’=’Aitor’)
        Muestra por pantalla el array utilizando para ello var_dump */
        $personas=array("a"=>"Alba","b"=>"Beñat","c"=>"Camila","d"=>"Davinia","e"=>"Elena","f"=>"Fabiola");
        var_dump($personas);
    ?>
</body>
</html>