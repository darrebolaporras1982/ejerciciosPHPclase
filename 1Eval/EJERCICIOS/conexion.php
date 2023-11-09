<?php
// Variables
$hostDB = '127.0.0.1'; //localhost
//$nombreDB = 'ejemplo';
$nombreDB = 'bd_biblioteca';
$usuarioDB = 'root';
$contrasenyaDB = '';

try{
    // Conecta con base de datos
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
}catch(PDOException $e){

    echo "No ha sido posible conectarse a la BD <br>";
    exit;
}
?>