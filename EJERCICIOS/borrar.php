
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ezabatu - CRUD PHP</title>
    <style>
      h2{
        border-radius: .5rem;
        color: white;
        background-color: orange;
        padding: 1rem;
        text-decoration: none;
    }
   
        .button {
            margin-top: 20;
            border-radius: .5rem;
            color: white;
            background-color: orange;
            padding: 1rem;
            text-decoration: none;
        }
    </style>
</head>
<body>
<h2>Ezabatu liburua</h2>
     <p>
<?php



// Obtiene codigo del libro a borrar
$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : null;
echo"Nahi duzu ".$codigo ." kodea duen liburua ezabatu ?";
echo"<br>";
?>
<br>
  <p>  <a class="button" href="conformeborrar.php?codigo=<?= $codigo ?>">Bai, ezabatu</a>
  <a class="button" href="leer.php">Ez, ez ezabatu</a></p>
</body>
</html>