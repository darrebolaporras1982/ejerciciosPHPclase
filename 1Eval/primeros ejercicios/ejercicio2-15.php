<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* Teniendo en cuenta el array que se muestra abajo, muestra sus
    datos dos veces:
    1) de uno en uno
    2) utilizando la estructura foreach */

    $notas = array ("Ander"=>3.5, "Bego"=>7, "Jon"=>6.3);
    
    // Obtener las claves del array asociativo
    $claves = array_keys($notas);

    // Obtener la longitud del array
    $longitud = count($claves);

    // Usar un bucle for para recorrer el array
for ($i = 0; $i < $longitud; $i++) {
    $clave = $claves[$i];
    $valor = $notas[$clave];
    echo "Nombre: " . $clave . ", Nota: " . $valor . "<br>";
}
echo "<br>";

    foreach($notas as $nota=>$valor){
        echo "Nombre: " . $nota . ", Nota: " . $valor . "<br>";
    }

    ?>
</body>
</html>