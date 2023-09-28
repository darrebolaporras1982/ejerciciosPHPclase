<!DOCTYPE html>
<html>
<head>
    <title>Prueba septiembre</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $nivel = $_POST['nivel'];

        // Preguntas del exámen (10 preguntas)
        $preguntas = array(
            "Cual es la capital de Euskadi?",
            "Como se escribe el número 0 en números romanos?",
            "Muchas compañias utilizan 'www' en sus webs. Que es 'www'?",
            "En qué pais se encuentra la torre Big Ben?",
            "Cómo se escribe 'perro' en inglés?",
            "Cuantos planetas tiene nuestro sistema solar?",
            "Cuantos continentes hay en el mundo?",
            "Qué ciudad es la capital de los EEUU de América?",
            "En qué pais se encuentra la torre Eifel?",
            "Cuántos océanos hay en el mundo?"
        );
    
        // Seleccionar las preguntas del test (3 selecciones)
        $preguntasSeleccionadas = array_rand($preguntas, 3);
        $seleccionadas = implode(",",$preguntasSeleccionadas);

        echo "<h1>Estas son tus preguntas: $nombre $apellido</h1>";
        echo "<div class='container'>";

        if(isset($_POST['formulario'])){
            echo "<h2>Preguntas de la prueba ($nivel nivel)</h2>";
            echo "<form method='POST' action='prueba3.php'>";
            foreach ($preguntasSeleccionadas as $pregunta) {
                echo "<p>$preguntas[$pregunta]</p>";
                echo "<label for='pregunta_$pregunta'>Respuesta:</label>";
                echo "<input type='text' id='pregunta $pregunta' name='pregunta_$pregunta' required>";
            }

            echo "<input type='hidden' name='nombre' value='$nombre'>";
            echo "<input type='hidden' name='apellido' value='$apellido'>";
            echo "<input type='hidden' name='nivel' value='$nivel'>";
            echo "<input type='hidden' name='preguntas' value='$seleccionadas'>";
            echo "<input type='submit' name='resultado' value='selecciona respuesta'>";
            echo "</form>";
        }
        echo "</div>";

        
    }
    ?>
</body>
</html>
