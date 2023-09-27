<?php
    //si se ha utilizado el boton de responder, meto las respuestas en las variables correspondientes
    if(isset($_POST["responder"])){
        $nom=$_POST["nom"];
        $ape=$_POST["ape"];
        $pregunta1=$_POST["pregunta1"];
        $respuesta1=strtoupper($pregunta1);
        $pregunta2=$_POST["pregunta2"];
        $respuesta2=strtoupper($pregunta2);
        

        $pregunta3=$_POST["pregunta3"];
        $respuesta3=strtoupper($pregunta3);
        $preg1=$_POST["pre1"];
        $preg2=$_POST["pre2"];
        $preg3=$_POST["pre3"];
    }
//comparo las preguntas y respuestas
//si esta correcta, pongo el correcto en color
//sino, pongo incorrecto en rojo
    if($respuesta1==$preg1){
        $correcto1="<h5 style='color: green;'>Correcto</h5>";
    }else{
        $correcto1="<h5 style='color: red;'>Incorrecto</h5>";
    }
    if($respuesta2==$preg2){
        $correcto2="<h5 style='color: green;'>Correcto</h5>";
    }else{
        $correcto3="<h5 style='color: red;'>Incorrecto</h5>";
    }
    if($respuesta1==$preg3){
        $correcto3="<h5 style='color: green;'>Correcto</h5>";
    }else{
        $correcto3="<h5 style='color: red;'>Incorrecto</h5>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Prueba Septiembre</h1><br>
    <h3>Resultado del Alumno</h3>

    <label for="">Nombre : <?php echo "$nom $ape";?></label><br>

    <label for="">Resultado de la Prueba:</label><br>

    <label for="" ><?php echo "$pregunta1" .  $correcto1?></label>
    <label for=""><?php echo "$pregunta2"  . $correcto2?></label>
    <label for=""><?php echo "$pregunta3"  . $correcto3?></label>
    <?php 
    echo "<a href='parte1-DavidArrebola.php'>Vuelve a intentar</a>"
    ?>

</body>
</html>