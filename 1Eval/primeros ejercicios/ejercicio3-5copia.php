<!DOCTYPE html>
<html>
<body>
    <?php
    if(!($_SERVER["REQUEST_METHOD"]==="POST")){
?>
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
    }else{
        $nombreVacio=empty($_POST["fname"]);
        $apellidoVacio=empty($_POST["lname"]);
        if($nombreVacio||$apellidoVacio){
            echo "Debe de completar los campos de Nombre y Apellido"."<br><br>";
            echo "<a href='ejercicio3-5copia.php'>Volver al formulario</a>";
        }else{
            $nombre=$_POST["fname"];
            $apellido=$_POST["lname"];
           if(isset($_POST["age"])){
            $edad=$_POST["age"];
            
                switch($edad){
                    case (15):
                        echo "$nombre $apellido eres muy joven, es mejor que vayas a la escuela";
                        break;  
                    case (60):
                         if(isset($_POST["vehicle2"])){ 
                             echo "$nombre $apellido ,inente  utilizar lo menos posible el coche, por favor";
                        }
                        $fecha=$_POST["alta_data"];
                            if(!empty($fecha)){
                                echo " Tu fecha de alta es : $fecha";
                                break;
                            }
                            echo "debe introducir una fecha de alta para que se muestre";
                            "<a href='ejercicio3-5copia.php'>Volver al formulario</a>";
                            break;
                    case (100):
                        echo "$nombre $apellido estás seguro que no prefieres dedicarte a viajar?";
                        break;
                    }

                }
            
           }
        }



?>
</body>
</html>
