<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba2</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <?php

    $preguntas=array("Cual es la capital de Euskadi?",
    "Como se escribe el número 0 en números romanos?",
    "Muchas compañías utilizan 'www' en sus webs. Que es 'www'?",
    "En qué país se encuentra la torre Big Ben?",
    "Cómo se escribe 'perro' en inglés?",
    "Cuantos planetas tiene nuestro sistema solar?",
    "Cuantos continentes hay en el mundo?",
    "Qué ciudad es la capital de los EEUU de América?",
    "En qué pais se encuentra la torre Eifel?",
    "Cuántos océanos hay en el mundo?");

 

    $quiznew=array_rand($preguntas,3);
    $dimension=count($quiznew);
    $preg1=$quiznew[0];
   
    $preg2=$quiznew[1];
    
    $preg3=$quiznew[2];
    
    ?>
<div class="card2">
   
    <form action="" method="post">
        <h2>Estas son Preguntas:David Arrebola</h2>
        <h3>Preguntas de primer nivel</h3>
        <h5 id="pregunta1" name="pregunta11"><?php echo "$preguntas[$preg1]"?></h5>
        <input type="text" name="pregunta1" id="preg_1" placeholder="Respuesta">
        <h5 id="pregunta2"><?php echo "$preguntas[$preg2]" ?></h5>
        <input type="text" name="pregunta1" id="preg_2"placeholder="Respuesta">
        <h5 id="pregunta3"><?php echo "$preguntas[$preg3]" ?></h5>
        <input type="text" name="pregunta1" id="preg_3"placeholder="Respuesta">
        <input type="submit" value="respuesta" name="respuesta">
    </form> 
</div>
<!--     <?php
      $pregunta1=$_POST["preg"];
    if(isset($_POST["pregunta1"])){
        $peg1=$_POST["pregunta1"];
        if(empty($peg1)){
            echo "la respuesta esta vacia";
        }else{
            for($i=0;$i<11;$i++){
                
            }
        } 
     

    }


?> -->
    
</body>
</html>