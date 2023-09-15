<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* Crea un array con 10 elementos, que serán los títulos de 10 películas
    1) Ordenalos alfabeticamente utilizando para ello la función sort
    2) Muestralos por pantalla utilizando print_r. */

    $peliculas=array("Titanic","Bailando con lobos","Matilda","El ultimo Boy Scout","Red","Harry Potter","Tiburón","Matrix","La Roca","Ocean Eleven","Jungla de cristal");
    sort($peliculas);
    echo "Peliculas Ordenadas";
    print_r ($peliculas);

?>
</body>
</html>