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
        $preguntasSeleccionadas = explode(",", $_POST['preguntas']);

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

         $respuestas = array(
            "Gasteiz",
            "Zeru",
            "World Wide Web",
            "Inglaterra",
            "Dog",
            "8",
            "7",
            "Washington DC",
            "Francia",
            "5"
        );

    
        echo "<h1>Prueba septiembre</h1>";

        if(isset($_POST['resultado'])){
            echo "<h2>Resultado del alumno</h2>";
            echo "<div class='container'>";
            echo "<p>Nombre: $nombre $apellido</p>";

            echo "<h3>Resultados de la prueba  $nivel ";
                

                foreach ($preguntasSeleccionadas as $pregunta){
                    $respuesta = $_POST["pregunta_$pregunta"];
                    $correcto = $respuestas[$pregunta];
                                
                    if (strtolower($respuesta) == strtolower($correcto)) {
                        echo "<p>$preguntas[$pregunta]: <span style='color: green;'>Correcto</span></p>";
                    } else {
                        echo "<p>$preguntas[$pregunta]: <span style='color: red;'>No es correcto ($correcto)</span></p>";
                    }

                    
                 }
            echo "</div>";


                    }
        }

   ?>
    <p><a href="prueba1.php">Inténtalo de nuevo</a></p>
</body>
</html>
