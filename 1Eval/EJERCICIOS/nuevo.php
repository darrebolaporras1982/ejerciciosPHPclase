<?php
// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
    $autor = isset($_REQUEST['autor']) ? $_REQUEST['autor'] : null;
    $disponible = isset($_REQUEST['disponible']) ? $_REQUEST['disponible'] : null;
 
    // Conecta con base de datos
    include_once('conexion.php');
    
    // Prepara INSERT
    $miInsert = $miPDO->prepare('INSERT INTO libros (titulo, autor, disponible) VALUES (:titulo, :autor, :disponible)');
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'titulo' => $titulo,
            'autor' => $autor,
            'disponible' => $disponible
        )
    );

    // // otro modo:
    // $miInsert = $miPDO->prepare('INSERT INTO libros (titulo, autor, disponible) VALUES (?, ?, ?)');
    // // Ejecuta INSERT con los datos
    // $miInsert->execute([$titulo, $autor, $disponible ]); // executek array bat espero du






    // Redireccionamos a Leer
    header('Location: leer.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dar de alta nuevo libro - CRUD PHP</title>
    
    <style>
    
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
</head>
<body style="text-align: center ;">
    <form action="" method="post">
    
          <h2>ALTA DE LIBRO</h2>
   
     
        <br>
            <label for="titulo">Titulo</label>
            <input id="titulo" type="text" name="titulo">

        <p>
            <label for="autor">Autor</label>
            <input id="autor" type="text" name="autor">
        </p>
        <p>
            <div>Disponible?</div>
            <input id="si-disponible" type="radio" name="disponible" value="1" checked> <label for="si-disponible">Si</label>
            <input id="no-disponible" type="radio" name="disponible" value="0"> <label for="no-disponible">No</label>
        </p>
        <p>
            <input type="submit"   value="Guardar">
        </p>
    </tr>
    </form>
</body>
</html>
