<!DOCTYPE html>
<html>
<head>
    <title>Prueba Septiembre alumnos</title>
    <link rel="stylesheet" href="style.css" /><style>
 
    </style>
</head>
<body>
    <?php

        echo "<h1>Prueba - Nombre y apellido</h1>";
        echo "<div class='container'>";
        echo "<form method='POST' action='prueba2.php'>";
        echo "<label for='nombre'>Nombre:</label>";
        echo "<input type='text' id='nombre' name='nombre' required>";
        echo "<label for='apellido'>Apellido:</label>";
        echo "<input type='text' id='apellido' name='apellido' required>";        
        echo "<label for='nivel'>Nivel:</label>";
        echo "<select id='nivel' name='nivel'>";
        echo "<option value='primer'>Primer nivel</option>";
        echo "<option value='segundo'>Segundo nivel</option>";
        echo "</select>";
        echo "<input type='submit' name='formulario' value='Enviar'>";
        echo "<input type='reset' name='formulario' value='Borrar'>";
        echo "</form>";
        echo "</div>";
    ?>
    <p>Jone Martínez</p>
</body>
</html>
