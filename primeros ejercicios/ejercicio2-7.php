<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
    <label for=""><input placeholder="nombre" type="text" name="nombre" id="nombre"></label>
    <label for=""><input placeholder="apellido1" type="text" name="apellido1" id="apellido1"></label>
    <label for=""><input placeholder="apellido2" type="text" name="apellido2" id="apellido2"></label><br>
    <input type="submit" value="Comprueba!" id="envia">
</form>


    <?php 
    /* Diseña un programa que contenga 3 variables, $nombre1, $nombre2
    y $nombre3.
    ● El programa mostrará un mensaje de bienvenida si el nombre
    de esa persona es “Elisabet” o si sus apellidos son “Lekue
    Alkorta”
    ● En caso contrario mostrará el mensaje “Acceso denegado”. */
    if (isset($_GET["envia"])){
        
        $nombre=$_GET["nombre"];
        $apellido1=$_GET["apellido1"];
        $apellido2=$_GET["apellido2"];
        
        $nombre1="Elisabet";    
        $nombre2="Lekue";
        $nombre3="Alkorta";

        if($nombre==$nombre1 && $apellido1==$nombre2 && $apellido2==$nombre3){
            echo "Bienvenida $nombre1";
        }else{
            echo "Acceso denegado";
        }
}

    ?>
</body>
</html>