<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* Crea una variable,  $email y comprueba mediante la función  
    strpos que es una dirección de correo electrónico válida.
    Mediante la función strtr extrae de una variable,  $email, que 
    contiene una dirección de correo electrónica válida, el nombre 
    de usuario por una parte y el dominio por otra.  */

    $email="d.arrebola.porras@gmail.com";//aqui metemos la cadena que queremos analizar
    $marcador="@";//esta el la letra o cadena que queremos comprobar en la subcadena
    $posicion=strpos($email,$marcador);//metemos en la variable el resultado de la funcion strpos
    if($posicion){
        echo "la direccion el valida";
        }else{
            echo "la direccion no es valida";
    }
    echo "<br>";
    $reemplazo=array("d.arrebola.porras"=>"Usuario","gmail.com"=>"Dominio");//creamos un array asociativo 

    foreach($reemplazo as $clave=>$dato){//lo recorremos con un foreach
        echo " $clave es $dato" . " <br>";//imprimimos por pantalla
    }



?>
</body>
</html>