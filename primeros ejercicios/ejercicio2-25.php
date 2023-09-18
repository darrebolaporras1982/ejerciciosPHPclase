<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* Necesitamos diseñar un programa para para llevar un registro de 
    alumnos y sus calificaciones. Para guardar toda la información, 
    utilizaremos un array asociativo.
    Crearemos una funcion llamada CrearAlumno que recibirá 3 
    parámetros: nombre del alumno, edad y calificación. La función 
    insertará el alumno al registro y lo devolverá actualizado.
    Crea la función que muestre el nombre del alumno y su registro. Si el 
    alumno ya existe en el registro, ésta función mostrará su nombre, edad 
    y calificación. En caso de no existir, mostrará el mensaje de que no 
    existe. Ésta función se denominará MostrarAlumno.
    Crea un programa que utilice dichas funciones. Se insertarán al menos 
    3 alumnos y se mostrará su información. */
    
    function crearAlumno ($nombre,$edad,$calificacion){
        global $alumnos;
        $alumnos[$nombre]=['edad'=>$edad,'calificacion'=>$calificacion];    
        
    }
    function mostrarAlumnos($nombre){
        global $alumnos;

        if(array_key_exists($nombre, $alumnos)){
            $alumno=$alumnos[$nombre];
            echo "<h3>Nombre: $nombre </h3>";
            echo "Edad:" .  $alumno['edad']. "<br>";
            echo "calificacion: ". $alumno['calificacio']." <br>";
        }
    }
    $alumnos=[];
    //falta de poner pruebas;

    ?>
</body>
</html>