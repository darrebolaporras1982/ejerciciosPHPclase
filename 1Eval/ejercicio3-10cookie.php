<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /* Comprobaremos en el fichero ejercicio3-10_cookie si ha sido creada
        la cookie “ultima_sesion”.
        Si no está creada, la crearemos para guardar la fecha y hora actual.
        Si ya está creada, le recordaremos al usuario la fecha y la hora de la
        ultima vez que se conectó. Tras mostrarlo, actualizaremos nuestra
        cookie. */

        

        if(!(isset($_COOKIE['ultimasesion']))){
            echo "<h3>aun no se ha creado la cookie</h3>";
        }else{
            echo " <h2>se ha creado o actualizado la ultima sesion: </h2>". $_COOKIE['ultimasesion'];
            
        }
        setcookie('ultimasesion',date('Y-m-d H:i:s'));
        

?>
</body>
</html>