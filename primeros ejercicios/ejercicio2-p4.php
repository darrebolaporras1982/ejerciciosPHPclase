<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
/* Obtén primero el mes y el dia de la semana mediante una función y a continuación la
estructura switch
Guarda mediante la función date el número de mes en una variable y el número del dia
de la semana en otro.
Luego, mediante Switch captura el nombre del mes en función del número y lo mismo
con otro switc y el dia de la semana. */
date_default_timezone_set('Europe/Madrid');

$day=date("d");
$weekday=date("N");
$month=date("m");
$year=date("Y");
switch($weekday){
    case 1:
        echo "Lunes,";
        break;
    case 2:
        echo "Martes,";
        break;
    case 3:
        echo "Miercoles,";
        break;
    case 4:
        echo "Jueves,";
        break;
    case 5:
        echo "Viernes,";
        break;
    case 6:
        echo "Sabado,";
        break;
    case 7:
        echo "Domigo,";
        break;
        default: echo "fecha no valida";
}
switch($month){
    case 1:
    echo "$day de Enero de $year";
    break;
    case 2:
    echo "$day de Febrero de $year";
    break;
    case 3:
    echo "$day de Marzo de $year";
    break;
    case 4:
    echo "$day de Abril de $year";
    break;
    case 5:
    echo "$day de Mayo de $year";
    break;
    case 6:
    echo "$day de Junio de $year";
    break;
    case 7:
    echo "$day de Julio de $year";
    break;
    case 8:
    echo "$day de agosto de $year";
    break;
    case 9:
    echo "$day de Septiembre de $year";
    break;
    case 10:
    echo "$day de Octubrede $year";
    break;
    case 11:
    echo "$day de Noviembre de $year";
    break;
    case 12:
    echo "$day de Diciembre de $year";
    break;
}

?>
</body>
</html>