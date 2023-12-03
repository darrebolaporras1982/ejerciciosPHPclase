<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumnos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <h1 class="h1 text-center">Alumnos del Centro</h1>
    <div class="container">
        <ul class="list-group list-group-flush">
        @foreach($alumnos as $alumno)
            <li class="list-group-item"><a href="{{ route('muestraDatos',['id'=>$alumno->id]) }}">{{ $alumno->nom_ape }}</a></li>
            <!--en la siguiente ruta, primero ponemos el nombre que le hemos dado a la ruta "muetra datos"
            y despues tenmos un array asociativo que le decimos que el id es el "id" del alumno que le hemos pasado-->
        @endforeach
        </ul>
    </div>
</body>
</html>
