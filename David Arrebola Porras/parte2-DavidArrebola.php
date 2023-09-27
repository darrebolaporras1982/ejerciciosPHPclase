<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<!--en este bloque de php capturo si existen y si no estan vacias los campos Nombre Apellido y nivel-->
    <?php
    if(isset($_POST["enviar"])){
        if(isset($_POST["nombre"])){
            $nombre = $_POST["nombre"];
            $_POST["nombre"]=$GLOBALS['nombre'];
        }
        if(isset($_POST["apellido"])){
            $apellido = $_POST["apellido"];
            $_POST["apellido"]=$GLOBALS['apellido'];
        }

//si algun nombre o apellido esta vacio, dejo un mensaje sin enseñar la pagina 2 y pongo el enlace de retorno

        if(empty($nombre) || empty($apellido)){
            echo "<h4>No pueden estar los campos de Nombre y Apellido vacíos</h4>";
            echo "<a href='parte1-DavidArrebola.php'>Vuelve al Inicio Y rellena los campos</a>";

            //sino, y todo ha ido bien,muestro el formulario para las preguntas 
        }else{
    ?>

    <?php
    //creo un array asociativo con las claves y valores( pregunstas y respuestas)
    $preguntas=array("Cual es la capital de Euskadi?"=>"GAZTEIZ",
                    "Como se escribe el número 0 en números romanos?"=>"N",
                    "Muchas compañías utilizan 'www' en sus webs. Que es 'www'?"=>"WORLD WIDE WEB",
                    "En qué país se encuentra la torre Big Ben?"=>"LONDRES",
                    "Cómo se escribe 'perro' en inglés?"=>"DOG",
                    "Cuantos planetas tiene nuestro sistema solar?"=>"8",
                    "Cuantos continentes hay en el mundo?"=>"7",
                    "Qué ciudad es la capital de los EEUU de América?"=>"WASHINGTON",
                    "En qué pais se encuentra la torre Eifel?"=>"PARIS",
                    "Cuántos océanos hay en el mundo?"=>"5");

    //aleatoriamente cojo las que voy a enseñar que son 3 y las guardo en otro array que se crea solo
    //primer parametro indica de que array del que cojo la seleccion, segundo parametro cuantas extraigo
    $preAleatorias=array_rand($preguntas,3);

    //Guardaremos las preguntas en $GLOBALS para reutilizar despues
    $preg1= $preAleatorias[0];
    $preg2= $preAleatorias[1];
    $preg3= $preAleatorias[2];

?>

    <section class="seccion">
       <h2>Estas son tus preguntas: <?php echo "$nombre $apellido";?></h2>
        <form action="Parte3-DavidArrebola.php" method="post"> 
            <!-- Paso informacion por hidden para utilizarlo en la siguiente pagina -->
            <input type="hidden" name="nom" value="<?php echo $nombre; ?>">
            <input type="hidden" name="ape" value="<?php echo $apellido; ?>">
            
            <label for="pregunta1"><?php echo "$preAleatorias[0]";?></label>
            <input type="text" name="pregunta1" id="pregunta1">
            <input type="hidden" name="pre1" value="<?php echo $preguntas[$preg1] ?>">
            
            
            <label for="pregunta2"><?php echo "$preAleatorias[1]";?></label>
            <input type="text" name="pregunta2" id="pregunta2">
            <input type="hidden" name="pre2" value="<?php echo $preguntas[$preg2] ?>">
           

            <label for="pregunta3"><?php echo "$preAleatorias[2]";?></label>
            <input type="text" name="pregunta3" id="pregunta3">
            <input type="hidden" name="pre3" value="<?php echo $preguntas[$preg3] ?>">
            

            <div class="botones">
                <input type="submit" value="Responder" name="responder" class="button">
            </div>
        </form>
    </section>
    <?php
        }
    }

?>
</body>
</html>
