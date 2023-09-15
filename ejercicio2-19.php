<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   /*  Dado el array $paises = (‘alemania’, ‘rumania’, ‘italia’,
    ‘chile’, ‘uruguay’, ‘australia’)
    Se pide:
    1) Eliminar los elementos alemania, chile y australia
    2) Insertar los elementos argentina y bolivia.
    3) Ordenar alfabéticamente
    4) Mostrar los datos utilizando print_r */

    $paises = array("alemania", "rumania", "italia","chile", "uruguay", "australia");
    array_diff($paises,array("alemania","chile","australia"));//elimino la seleccion
    array_merge($paises,array("argentina","bolivia"));
    array_pop($paises);//elimino el ultimo
    array_shift($paises);//elimino el primero
    sort($paises);
    echo"Ya esta ordenado"."<br>";
    print_r($paises);
    ?>
</body>
</html>