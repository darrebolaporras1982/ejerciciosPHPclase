<?php

// Conecta con base de datos
include_once('conexion.php');
print_r($_REQUEST);
// Obtiene codigo del libro a borrar
$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : null;
// Prepara DELETE
$miConsulta = $miPDO->prepare('DELETE FROM libros WHERE codigo = :codigo');
// Ejecuta la sentencia SQL
$miConsulta->execute([
    'codigo' => $codigo
]);
// Redireccionamos al PHP con todos los datos
header('Location: leer.php');
?>