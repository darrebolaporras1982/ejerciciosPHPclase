<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /* Crea una matriz multidimensional para guardar los datos de los alumnos
        1) la clave del array principal será el nombre

        2) este array tendrá como elemento otro array con los siguientes datos:
        apellidos, edad y ciclo

        3) Despues de creado, mostraremos por pantalla los datos utilizando
        para ello una estructura foreach */

       
        $alumnos = array(
            "Ander"=>array("apellido"=>"Tapia Fernandez","edad"=>19, "ciclo"=>"ASW3"),
            "Ibai"=>array("apellido"=>"Etxebarria Rumayor","edad"=>20, "ciclo"=>"DW3"),
            "David"=>array("apellido"=>"Arrebola Porras","edad"=>41, "ciclo"=>"DW3")
        );

        foreach ($alumnos as $nombre => $datos) {
            echo "Nombre: $nombre<br>";
            echo "Apellido: " . $datos["apellido"] . "<br>";
            echo "Edad: " . $datos["edad"] . "<br>";
            echo "Ciclo: " . $datos["ciclo"] . "<br>";
            echo "<br>"; // Salto de línea entre cada alumno
        }
        

        
        
    ?>
</body>
</html>