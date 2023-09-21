<!DOCTYPE html>
<html>
<body>
<h1>DATOS DEL ALUMNO</h1>
<form method="post">
  <label for="fname">Nombre:</label>
  <input type="text" id="fname" name="fname"><br><br>
  <label for="lname">Apellido:</label>
  <input type="text" id="lname" name="lname"><br><br>
  <p>Edad</p>
  <input type="radio" id="age1" name="age" value="15">
  <label for="age1">0 - 15</label><br>
  <input type="radio" id="age2" name="age" value="60">
  <label for="age2">15 - 60</label><br>  
  <input type="radio" id="age3" name="age" value="100">
  <label for="age3">60 - 100</label><br><br>
  <p>Cómo vienes al centro de estudios?</p>
  <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
  <label for="vehicle1"> Bicicleta</label><br>
  <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
  <label for="vehicle2"> Coche</label><br>
  <input type="checkbox" id="vehicle3" name="vehicle3" value="Bus">
  <label for="vehicle3"> Autobus</label><br><br>
    <label for="alta_data">Fecha de alta:</label>
  <input type="date" id="alta_data" name="alta_data"><br><br>
   <input type="submit" value="Enviar">
</form>
<?php

// Definir variables para almacenar los datos del formulario
$nombre = "";
$apellido = "";
$edad = "";
$transporte = "";

// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST["fname"];
    $apellido = $_POST["lname"];
    $edad = isset($_POST["age"]) ? intval($_POST["age"]) : null;
    
    // Verificar si el nombre y los apellidos están vacíos
    if (empty($nombre) || empty($apellido)) {
        echo "Error: El nombre y los apellidos son obligatorios. Por favor, rellena ambos campos.<br>";
    } else {
        // Verificar la edad y mostrar mensajes según la lógica especificada
        if ($edad >= 0 && $edad <= 15) {
            echo "$nombre $apellido, eres muy joven, es mejor que vayas a la escuela.<br>";
        } elseif ($edad > 15 && $edad <= 60) {
            // Verificar el transporte seleccionado
            $transporte = "";
            if (isset($_POST["vehicle1"])) {
                $transporte .= "Bicicleta ";
            }
            if (isset($_POST["vehicle2"])) {
                $transporte .= "Coche ";
            }
            if (isset($_POST["vehicle3"])) {
                $transporte .= "Autobus ";
            }
            
            if (!empty($transporte)) {
                echo "$nombre $apellido, intenta utilizar lo menos posible el coche, por favor.<br>";
                echo "Transporte seleccionado: $transporte<br>";
            }
        } elseif ($edad > 60 && $edad <= 100) {
            echo "$nombre $apellido, ¿estás seguro de que no prefieres dedicarte a viajar?<br>";
        }
        
        // Si la edad está entre 15 y 60, mostrar la fecha de alta
        if ($edad > 15 && $edad <= 60 && !empty($_POST["alta_data"])) {
            echo "Fecha de alta: " . $_POST["alta_data"];
        }
    }
}

?>
</body>
</html>
