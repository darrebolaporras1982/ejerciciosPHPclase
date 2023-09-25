<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=F, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
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
    }else{
        if(isset($_POST["enviar"])){
            $nombre=$_POST["nombre"];
            $apellido=$_POST["apellido"];
            $nivel=$_POST["niveles"];


            if(empty($nombre||empty($apellido)||empty($nivel))){
                echo "no se puede dejar el campo vacio";
                echo"<a href='parte1-DavidArrebola.php'>Vuelve a enviar</a>";

            }
        }
    }


?>
</body>
</html>