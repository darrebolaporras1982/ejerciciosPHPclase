<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
/*     Vamos a modificar el ejercicio anterior…
    En éste caso, las calificaciones de los alumnos serán 6 en lugar de 
    una única calificación. Por lo tanto, el array deberá de ser 
    multidimensional.
    Además, diseñaremos una nueva función, denominada medias, que 
    reciba el registro de un alumno, calcule su media y lo devuelva */

    function crearAlumno ($nombre,$edad,$calificacion){
        global $alumnos;
        $alumnos[$nombre]=['edad'=>$edad,'calificacion'=>$calificacion];    
        
    }
    $calificaciones=array("prog"=>5,"dwc"=>6,"dws"=>6);
    crearAlumno("david",41,$calificaciones);

    function medias($alumno){

        global $alumnos;
        $alumno=$alumnos[$alumno];
        $calificaciones=$alumno["calificacion"];

        $media=array_sum($calificaciones)/count($calificaciones);

        return $media;
    }
     $media=medias("david");
    echo $media;

    print_r($alumnos);
?>
</body>
</html>