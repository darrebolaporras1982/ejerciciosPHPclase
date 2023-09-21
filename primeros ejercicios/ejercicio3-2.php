<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!isset($_GET['enviar'])){
    ?>
    <h1>Ejercicio 2-3</h1>
    <form action="recoger_datos_post.php">
      <label for="name">Nombre:</label>
      <input type="text" name="name" id="nombre" />
      <br /><br />
      <label for="apellido">Apellido:</label>
      <input type="text" name="apellido" id="apellido" />
      <br /><br />
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" />
      <br /><br />
      <input type="submit" name="enviar" value="Enviar" />
    </form>
    <?php
    }else {
        if(!empty($_GET['name']) && !empty($_GET['apellido']) && !empty($_GET['email'])){
            $nombre = $_GET['name'];
            $apellido = $_GET['apellido'];
            $email = $_GET['email'];
            echo "Tus Valores son $nombre, $apellido, $email";
        }
        else {
            echo "Todos los valores no han sido completados";
        }
    }

    ?>
</body>
</html>