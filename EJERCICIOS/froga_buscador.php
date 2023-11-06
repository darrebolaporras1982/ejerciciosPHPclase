<?php 

// Supongamos que recibes criterios de búsqueda desde el usuario
$autor = $_POST['autor']; // Valor para buscar en el campo 'autor'
$titulo = $_POST['titulo']; // Valor para buscar en el campo 'titulo'
$disponible = $_POST['disponible']; // Valor para buscar en el campo 'disponible'

// Consulta SQL base
$consultaBase = 'SELECT * FROM libros WHERE 1';

// Array para almacenar los valores de los marcadores de posición
$valores = array();

// Añadir condiciones a la consulta si se proporcionan criterios de búsqueda
if (!empty($autor)) {
    $consultaBase .= ' AND autor LIKE :autor';
    $valores[':autor'] = "%$autor%"; // Usar comodines para buscar coincidencias parciales
}

if (!empty($titulo)) {
    $consultaBase .= ' AND titulo LIKE :titulo';
    $valores[':titulo'] = "%$titulo%";
}

if (!is_null($disponible)) {
    $consultaBase .= ' AND disponible = :disponible';
    $valores[':disponible'] = $disponible;
}

// Preparar la consulta con las condiciones agregadas
$miConsulta = $miPDO->prepare($consultaBase);

// Ejecutar la consulta con los valores de los marcadores de posición
$miConsulta->execute($valores);

// Obtener los resultados de la búsqueda
$resultados = $miConsulta->fetchAll(PDO::FETCH_ASSOC);

// Procesar los resultados como sea necesario
foreach ($resultados as $fila) {
    // ...
}


?>