<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<section class="seccion">
        <form action="" method="post">
            <label for=""></label>
            <label for="">Respuesta :</label>
            <input type="text" name="pegunta1" id="">
            <label for=""></label>
            <label for="">Respuesta :</label>
            <input type="text" name="pregunt2" id="">
            <label for=""></label>.<label for="">Respuesta :</label>
            <input type="text" name="pregunta3" id="">
            </select>
                <div class="botones">
            <input type="submit" value="responder" name="enviar" class="button">
           
                </div>
                
        </form>
    </section>
</body>
</html>

<?php
if(isset($_POST["enviar"])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nivel = $_POST['vivel'];
$GLOBALS["nombre"]=$nombre;
$GLOBALS["apellido"]=$apellido;
$GLOBALS["nivel"]=$nivel;
}

$preguntas=array("Cual es la capital de Euskadi?"=>"Gazteiz",
"Como se escribe el número 0 en números romanos?"=>"N",
"Muchas compañías utilizan 'www' en sus webs. Que es 'www'?"=>"red informática mundial",
"En qué país se encuentra la torre Big Ben?"=>"Londres",
"Cómo se escribe 'perro' en inglés?"=>"Dog",
"Cuantos planetas tiene nuestro sistema solar?"=>"8",
"Cuantos continentes hay en el mundo?"=>"8",
"Qué ciudad es la capital de los EEUU de América?"=>"Washington",
"En qué pais se encuentra la torre Eifel?"=>"Paris",
"Cuántos océanos hay en el mundo?"=>"5");

//preguntas aleatorias

$quiz3random=array_rand($preguntas,3);
$claves=array_keys($preguntas);
$aleatorio=array_rand($claves,3);
echo var_dump($aleatorio)."<br><br>";
echo var_dump($quiz3random);


?>