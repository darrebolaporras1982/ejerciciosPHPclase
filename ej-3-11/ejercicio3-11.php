<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Realizaremos un ejercicio para tabajar sesiones. Solicitaremos nombre de usuario y
contraseña para acceder a nuestra web.
Una vez dentro, pasaremos a una segunda página e introduciremos los datos en una
variable de sesión. En ésta, pondremos un enlace para pasar a una tercera página. En
ésta tercera página , sacaremos los datos de la sesión y le daremos la bienvenida -->
 <h2>Formulario para iniciar sesion</h2>
 <form action="alta_form.php" method="post">
    <label for="">Nombre : <input type="text" name="nombre" id="nombre"></label>
    <label for="">PassWord: <input type="password" name="password" id="password"></label>
    <input type="submit" value="Enviar Datos">
 </form>


</body>
</html>