<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     function conectar_BD(){
        $dbHost="ubuntudb.cdvkhlr5qy8g.us-east-1.rds.amazonaws.com";
        $dbDatabase="pruebasDavid";
        $dbUser="admin";
        $dbPassword="admin123";

        try{
            $hostPDO="mysql:host=$dbHost;dbname=$dbDatabase;";
            $conexion=new PDO($hostPDO,$dbUser,$dbPassword);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        return $conexion;
    }

?>
<?php
    $conexion=conectar_BD();
    if(!$conexion){

    }else{
        echo("<h2>se ha conectado</h2>");
    }

?>
</body>
</html>