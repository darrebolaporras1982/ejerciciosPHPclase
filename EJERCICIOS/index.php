<?php
include_once('conexion.php');

$logeado = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
// Comprobar si los datos están o no en la BD

$usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : null;
$contrasena = isset($_REQUEST['contrasena']) ? $_REQUEST['contrasena'] : null;

   // Prepara SELECT
  $miConsulta = $miPDO->prepare('SELECT id FROM usuarios WHERE nombre_usuario = :nombre_usuario AND contrasena = :contrasena;');
   
 
 // Ejecuta consulta
   $miConsulta->execute(
       [
          'nombre_usuario' => $usuario,
          'contrasena' => $contrasena,
       ]
   );

  $usuario_recibido = $miConsulta->fetch();

   if ($usuario_recibido) 
    {
        $logeado = 1;
       

    }
  
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leer - CRUD PHP</title>
    <style>
        
        .button {
            border-radius: .5rem;
            color: white;
            background-color: orange;
            padding: 1rem;
            text-decoration: none;
        }


    
    h2{
        border-radius: .5rem;
        color: white;
        background-color: orange;
        padding: 1rem;
        text-decoration: none;
    }
    input {
        border: 1px solid orange;
        text-align: center;
        padding: 1.3rem;
    }
    
    input[type="submit"] {
        width: 150px;
        color: white;
        border-radius: .5rem;
        background-color: orange;
        text-decoration: none;

    }
</style>
    </style>
</head>
<body style="text-align: center;">
    <h1>***** BIBLIOTECA *****</h1>
    <p>&nbsp;</p>
   
<?php
    if ($logeado == 0){

?>

    <form action="index.php" method="post">
        
        <h2>LOGEAR</h2>


    <br>
        <label for="usuario">Ususario</label>
        <input id="usuario" type="text" name="usuario">

    <p>
        <label for="contrasena">Contrasena</label>
        <input id="contrasena" type="text" name="contrasena">
    </p>

    <p>
        <input type="submit" value="Logear" class="button">
    </p>
    </tr>
    </form>

<?php


    }else{

?>

    <p><a class="button" href="nuevo.php">Insertar nuevo libro</a></p>
    <p>&nbsp;</p>
    <p><a class="button" href="leer.php">Consulta de libros</a></p>
    <p>&nbsp;</p>
    <p><a class="button" href="buscador.php">Buscador</a></p>

<?php

    }
?>


    
    
</body>
</html>
