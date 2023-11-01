<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        //comienzo el bloque php preguntando si no se han enviado datos
        if(!($_SERVER["REQUEST_METHOD"]==="POST")){
        ?>

<section class="seccion">
        <form action="parte2-DavidArrebola.php" method="post">
            <label for="">Nombre :</label>
            <input type="text" name="nombre" id="nombre">
            <label for="">Apellido :</label>
            <input type="text" name="apellido" id="apellido">
            <label for="">Nivel :</label>
            <select name="niveles" id="niveles">
                <option value="1">nivel 1</option>
                <option value="2">nivel 2</option>
            </select>
                <div class="botones">
            <input type="submit" value="Enviar" name="enviar" class="button">
            <input type="reset" value="Borrar" name="borrar" class="button">
                </div>
                
        </form>
    </section>
    <?php 
        }

?>
</body>
</html>