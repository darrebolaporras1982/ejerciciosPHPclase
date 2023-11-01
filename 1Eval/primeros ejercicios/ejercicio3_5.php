<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio3_5</title>
  </head>
  <body>
    <!DOCTYPE html>
    <html>
      <body>
        <?php

        //Si aun no se ha enviado el formulario
        if(!($_SERVER["REQUEST_METHOD"] === "POST")) {//utilizo el metodo request_method para comparar la info recogida por $server que sea post
        ?>
        <h1>DATOS DEL ALUMNO</h1>
        <form method="POST">
          <label for="fname">Nombre:</label>
          <input type="text" id="fname" name="fname" /><br /><br />
          <label for="lname">Apellido:</label>
          <input type="text" id="lname" name="lname" /><br /><br />
          <p>Edad</p>
          <input type="radio" id="age1" name="age" value="15" />
          <label for="age1">0 - 15</label><br />
          <input type="radio" id="age2" name="age" value="60" />
          <label for="age2">15 - 60</label><br />
          <input type="radio" id="age3" name="age" value="100" />
          <label for="age3">60 - 100</label><br /><br />
          <p>Cómo vienes al centro de estudios?</p>
          <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" />
          <label for="vehicle1"> Bicicleta</label><br />
          <input type="checkbox" id="vehicle2" name="vehicle2" value="Car" />
          <label for="vehicle2"> Coche</label><br />
          <input type="checkbox" id="vehicle3" name="vehicle3" value="Bus" />
          <label for="vehicle3"> Autobus</label><br /><br />
          <label for="alta_data">Fecha de alta:</label>
          <input type="date" id="alta_data" name="alta_data" /><br /><br />
          <input type="submit" value="Enviar" />
        </form>
        <?php
        //Si el formulario se ha enviado 
        }else {
            //comprobamos si estan vacios
            $nombre =$_POST["fname"];//variable del nombre
            $apellido =$_POST["lname"];//variable del apellido

            //variables estas vacias
            $sinNombre = empty($_POST["fname"]);
            $sinApellido =empty($_POST["lname"]);
            
            //si una de las dos esta vacia
            if ($sinNombre || $sinApellido){
                //mensaje de erro y redireccionamiento
                echo "Los campos de Nombre y Apellido deben estar Cumplimentados<br><br>";
                echo "<a href='ejercicio3_5.php'/>Volver a llenar el formulario</a>";
            }else{
                //si esta la variable age
                if(isset($_POST["age"])){
                    //almacenamos en una variable 
                    $edad = $_POST["age"];
                    //creo un switch para las diferentes opciones
                    switch($edad){
                        case (15):
                            echo "$nombre $apellido, eres muy joven, , es mejor que vayas a la escuela ";
                            break;
                        case(60):
                            //si se ha creado la vehicle2
                            if(isset($_POST["vehicle2"])){
                                echo "$nombre $apellido, intente utilizar lo menos posible el coche, por favor<br>";
                            }
                            $fechaAlta = $_POST["alta_data"];
                            
                            //la fecha la envia directamente el servidor, por lo que sabemos es que esta!comprobamos si esta vacia
                                if(empty($fechaAlta)){
                                    echo "Tienes que rellenar la fecha de alta para poder mostrarla";
                                    echo "<a href='ejercicio3_5.php'/>Volver a llenar el formulario</a>";
                                }else {
                                    echo "tu fecha de alta es: $fechaAlta";
                                }
                            break;
                        case(100):
                            echo "$nombre $apellido, estás seguro que no prefieres dedicarte a viajar?";
                            break;
                    }
                }else {
                    //Si no hay seleccion de edad, la mitad no seirve, entonces la solicito de manera obligada
                    echo "Debes seleccionar una edad";
                    echo "<a href='ejercicio3_5.php'/>Volver a llenar el formulario</a>";
                }
            }
        }
        ?>
      </body>
    </html>
  </body>
</html>
