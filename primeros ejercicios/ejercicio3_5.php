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
$nombre=$_POST["fname"];
$apellido=$_POST["lname"];
$menor15=$_POST["15"];
$coche=$_POST["Car"];

if(isset($_POST["Enviar"])){
        if($nombre==""|| $apellido==""){
            echo"debes rellenar los dos campos";
        }
    }



?>
</body>
</html>
