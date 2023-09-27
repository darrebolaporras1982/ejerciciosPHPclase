<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    session_start();

    if(isset($_POST['nombre'])){
        $_SESSION['sesionNombre'] = $_POST['nombre'];
        $nombresesion = $_SESSION['sesionNombre'];

        echo "<h2>Bienvenido $nombresesion</h2>";
    }
?>

<a href="paginafinal.php">Acceso a la web</a>

</body>
</html>