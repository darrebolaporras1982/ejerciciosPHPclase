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

        


echo "<table border='1'>";
    for($i=1; $i<2; $i++){
        echo "<tr>";
        echo "<th></th>";
        for ($j=1;$j<5; $j++){
            echo "<th>$j</th>";
        }
        echo "</tr>";
    }
    for($i=1; $i<4; $i++){
        echo "<tr>";
            echo "<th>$i</th>";
        for ($j=1;$j<5; $j++){
            echo "<td>$i-$j</td>";
        }
        echo "</tr>";
    }

echo "</table>";




?>
</body>
</html>