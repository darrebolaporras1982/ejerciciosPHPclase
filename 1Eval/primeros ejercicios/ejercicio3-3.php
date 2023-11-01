<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(!isset($_POST['enviar'])){
    ?>
    <h1>Formularios de alta</h1>
    <form action="ejercicio3-3.php" method="post">
      <label for="user">Usuario:</label>
      <input type="text" name="user" id="user" />
      <br /><br />
      <label for="password">Contraseña:</label>
      <input type="password" name="password" id="password" />
      <br /><br />
      <input type="submit" name="enviar" value="Enviar" />
    </form>
    <?php
    }else{
        if(empty($_POST['user']) || empty($_POST['password'])){
            echo "Todos los campos no han sido completados";
        }else {
            echo "bienvenid@, " . $_POST['user'];
        }
    }
    ?>
</body>
</html>