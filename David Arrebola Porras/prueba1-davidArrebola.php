<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba 1</title>
    <link rel="stylesheet" href="style.css">
    <?php
    if(isset($_POST["enviar"])){
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $nombre=$_POST["niveles"];
        if(empty($_POST["nombre"])){
            echo "el ca,mpo nombre esta vacio";
        } else {
            echo "pasa";
        }
    }


?>
</head>
<body>
    
    <div class="card">
        <h2>Prueba - David Arrebola</h2>
        <form action="./prueba2-davidArrebola.php" method="POST">
            <label for="Nombre">Nombre :</label><br>
            <input type="text" name="nombre" id="nombre" value=""><br>
            <label for="Apellido">Apellido :</label><br>
            <input type="text" name="apellido" id="apellido" value="apellido"><br>
            <label for="Nivel">Nivel :</label><br>
            <select name="niveles" id="niveles">
                <option value="nivel2">Nivel 1</option>
                <option value="nivel2">Nivel 2</option>
            </select>
            <input type="submit" value="enviar" name="enviar">
            <input type="reset" value="Borrar" name="borrar">
            
        </form>
        <h5>David Arrebola</h5>

</div>

</body>
</html>