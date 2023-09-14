<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        /* Diseña un programa que utilizando una estructura de for anidada,
        muestre una tabla como la siguiente.
        Deberas de insertar código html  */
    $Matriz = [
        ["", "1", "2", "3", "4"],
        ["1","1-1","1-2","1-3","1-4"],
        ["2","2-1","2-2","2-3","2-4"],
        ["3","3-1","3-2","3-3","3-4"]
    ];

    echo "<table>";
        for($i=0;$i<4;$i++){
           echo $i;
           for ($j = 0; $j <5 ;$j++) {
            echo $j;
        }
    }
    echo "</table>";
    ?>
</body>
</html>