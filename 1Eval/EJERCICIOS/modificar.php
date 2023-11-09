<?php

// Conecta con base de datos
include_once('conexion.php');
    
// Variables

$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : null;
$titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
$autor = isset($_REQUEST['autor']) ? $_REQUEST['autor'] : null;
$disponible = isset($_REQUEST['disponible']) ? $_REQUEST['disponible'] : null;



// Comprobamso si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepara UPDATE
    $miUpdate = $miPDO->prepare('UPDATE libros SET titulo = :titulo, autor = :autor, disponible = :disponible WHERE codigo = :codigo');
    // Ejecuta UPDATE con los datos
    $miUpdate->execute(
        [
            'codigo' => $codigo,
            'titulo' => $titulo,
            'autor' => $autor,
            'disponible' => $disponible
        ]
    );
    // Redireccionamos a Leer
    header('Location: leer.php');
} else {
    // Prepara SELECT
    $miConsulta = $miPDO->prepare('SELECT * FROM libros WHERE codigo = :codigo;');
    // Ejecuta consulta
    $miConsulta->execute(
        [
           'codigo' => $codigo
        ]
    );
}

// Obtiene un resultado
$libro = $miConsulta->fetch();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aldatu- CRUD PHP</title>
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
<body>
    <form method="post">
        <h2>LIBURUAK ALDATU</h2>
        <p>
            <label for="titulo">Izenburua</label>
            <input id="titulo" type="text" name="titulo" value="<?= $libro['titulo'] ?>">
        </p>
        <p>
            <label for="autor">Autorea</label>
            <input id="autor" type="text" name="autor" value="<?= $libro['autor'] ?>">
        </p>
        <p>
            <div>Erabilgarri?</div>
            <input id="si-disponible" type="radio" name="disponible" value="1"<?= $libro['disponible'] ? ' checked' : '' ?>> <label for="si-disponible">Bai</label>
            <input id="no-disponible" type="radio" name="disponible" value="0"<?= !$libro['disponible'] ? ' checked' : '' ?>> <label for="no-disponible">Ez</label>
        </p>
        <p>
            <input type="hidden" name="codigo" value="<?= $codigo ?>">
            <input type="submit" value="Aldatu">
        </p>
    </form>
</body>
</html>
